<?php

class Project {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Récupère tous les projets avec le nom du professeur et le nombre d'étudiants.
     */
    public function findAll(?string $statut = null): array {
        $sql = "SELECT p.*,
                       u.nom AS prof_nom,
                       u.prenom AS prof_prenom,
                       COUNT(DISTINCT ps.student_id) AS student_count
                FROM Projects p
                LEFT JOIN Users u ON u.id = p.prof_id
                LEFT JOIN Project_Student ps ON ps.project_id = p.id";

        $params = [];
        if ($statut !== null) {
            $sql .= " WHERE p.statut = :statut";
            $params[':statut'] = $statut;
        }

        $sql .= " GROUP BY p.id, u.nom, u.prenom 
                  ORDER BY p.created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
/**
 * Récupère un projet par son ID avec ses étudiants.
 */
public function findById(int $id): ?array {
    // Projet principal + professeur
    $stmt = $this->db->prepare(
        "SELECT p.*,
                u.nom AS prof_nom,
                u.prenom AS prof_prenom
         FROM Projects p
         LEFT JOIN Users u ON u.id = p.prof_id
         WHERE p.id = :id"
    );
    $stmt->execute([':id' => $id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
        return null;
    }

    // Étudiants coéquipiers
    $stmt2 = $this->db->prepare(
        "SELECT u.id, u.nom, u.prenom,
                ps.statut,
                ps.feedback_prof,
                ps.validated_skills,
                ps.link_github,
                ps.link_youtube
         FROM Project_Student ps
         JOIN Users u ON u.id = ps.student_id
         WHERE ps.project_id = :pid
         ORDER BY u.nom, u.prenom"
    );
    $stmt2->execute([':pid' => $id]);
    $project['students'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    return $project;
}

    /**
     * Crée un nouveau projet et associe les étudiants.
     */
    public function create(array $data, array $studentIds = []): int {
        $this->db->beginTransaction();

        try {
            $stmt = $this->db->prepare(
                "INSERT INTO Projects 
                 (titre, description, statut, prof_id, link_github, link_youtube, created_at, updated_at)
                 VALUES (:titre, :description, :statut, :prof_id, :github, :youtube, NOW(), NOW())
                 RETURNING id"
            );

            $stmt->execute([
                ':titre'       => $data['titre'],
                ':description' => $data['description'] ?? '',
                ':statut'      => $data['statut'] ?? 'draft',
                ':prof_id'     => $data['prof_id'] ?? null,
                ':github'      => $data['link_github'] ?? null,
                ':youtube'     => $data['link_youtube'] ?? null,
            ]);

            $projectId = (int) $stmt->fetchColumn();

            // Ajout des étudiants
            $this->addStudents($projectId, $studentIds, 
                $data['link_github'] ?? null, 
                $data['link_youtube'] ?? null);

            $this->db->commit();
            return $projectId;

        } catch (PDOException $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /**
     * Met à jour un projet existant.
     */
    public function update(int $id, array $data, array $studentIds = []): bool {
        $this->db->beginTransaction();

        try {
            $stmt = $this->db->prepare(
                "UPDATE Projects 
                 SET titre       = :titre,
                     description = :description,
                     statut      = :statut,
                     prof_id     = :prof_id,
                     link_github = :github,
                     link_youtube = :youtube,
                     updated_at  = NOW()
                 WHERE id = :id"
            );

            $stmt->execute([
                ':titre'       => $data['titre'],
                ':description' => $data['description'] ?? '',
                ':statut'      => $data['statut'] ?? 'draft',
                ':prof_id'     => $data['prof_id'] ?? null,
                ':github'      => $data['link_github'] ?? null,
                ':youtube'     => $data['link_youtube'] ?? null,
                ':id'          => $id,
            ]);

            // Suppression des anciens étudiants
            $this->db->prepare("DELETE FROM Project_Student WHERE project_id = :pid")
                     ->execute([':pid' => $id]);

            // Ajout des nouveaux étudiants
            $this->addStudents($id, $studentIds, 
                $data['link_github'] ?? null, 
                $data['link_youtube'] ?? null);

            $this->db->commit();
            return true;

        } catch (PDOException $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /**
     * Supprime un projet (ON DELETE CASCADE gère les tables liées).
     */
    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM Projects WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Ajoute les étudiants dans la table de liaison Project_Student.
     * Méthode privée.
     */
    private function addStudents(
        int $projectId, 
        array $studentIds, 
        ?string $github = null, 
        ?string $youtube = null
    ): void {
        if (empty($studentIds)) {
            return;
        }

        // Nettoyage et suppression des doublons
        $studentIds = array_unique(array_filter(array_map('intval', $studentIds)));

        $stmt = $this->db->prepare(
            "INSERT INTO Project_Student 
             (project_id, student_id, statut, link_github, link_youtube)
             VALUES (:pid, :sid, 'pending', :github, :youtube)"
        );

        foreach ($studentIds as $sid) {
            $stmt->execute([
                ':pid'     => $projectId,
                ':sid'     => $sid,
                ':github'  => $github,
                ':youtube' => $youtube,
            ]);
        }
    }

    /**
     * Récupère la liste des étudiants disponibles pour un projet.
     */
    public function getAvailableStudents(?int $excludeUserId = null): array {
        $sql = "SELECT id, nom, prenom 
                FROM Users 
                WHERE role = 'etudiant'";

        $params = [];
        if ($excludeUserId !== null) {
            $sql .= " AND id != :exclude";
            $params[':exclude'] = $excludeUserId;
        }

        $sql .= " ORDER BY nom, prenom";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}