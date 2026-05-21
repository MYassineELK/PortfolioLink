<?php

class ProjectController {
    private Project $model;

    public function __construct() {
        $this->model = new Project();
    }

    public function index(): void {
        $statut = $_GET['statut'] ?? null;
        $projects = $this->model->findAll($statut);
        require __DIR__ . '/../view/project/Index.php';
    }

    public function show(): void {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: ' . BASE_URL . 'project');
            exit;
        }

        $project = $this->model->findById($id);

        if (!$project) {
            http_response_code(404);
            require __DIR__ . '/../view/shared/404.php';
            exit;
        }

        require __DIR__ . '/../view/project/Show.php';
    }

    public function create(): void {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }

        $db   = Database::getInstance();
        $stmt = $db->prepare("SELECT id, nom, prenom FROM Users 
                             WHERE role = 'etudiant' AND id != :me 
                             ORDER BY nom, prenom");
        $stmt->execute([':me' => $_SESSION['user_id']]);
        $available_students = $stmt->fetchAll();

        require __DIR__ . '/../view/project/Create.php';
    }

    public function store(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'project/create');
            exit;
        }

        $titre = trim($_POST['titre'] ?? '');
        if (empty($titre)) {
            $error = 'Le titre est obligatoire.';
            require __DIR__ . '/../view/project/Create.php';
            return;
        }

        $data = [
            'titre'        => $titre,
            'description'  => trim($_POST['description'] ?? ''),
            'statut'       => 'draft',
            'prof_id'      => null,
            'link_github'  => trim($_POST['link_github'] ?? ''),
            'link_youtube' => trim($_POST['link_youtube'] ?? ''),
        ];

        $studentIds = $_POST['coequipiers'] ?? [];
        $projectId  = $this->model->create($data, $studentIds);

        header('Location: ' . BASE_URL . 'project/show?id=' . $projectId . '&msg=created');
        exit;
    }

    public function edit(): void {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: ' . BASE_URL . 'project');
            exit;
        }

        $project = $this->model->findById($id);
        if (!$project) {
            http_response_code(404);
            require __DIR__ . '/../view/shared/404.php';
            exit;
        }

        $user_id   = $_SESSION['user_id'] ?? 0;
        $is_member = in_array($user_id, array_column($project['students'] ?? [], 'id'));

        if (!$is_member && ($_SESSION['role'] ?? '') !== 'admin') {
            http_response_code(403);
            require __DIR__ . '/../view/shared/403.php';
            exit;
        }

        $db   = Database::getInstance();
        $stmt = $db->prepare("SELECT id, nom, prenom FROM Users WHERE role = 'etudiant' ORDER BY nom, prenom");
        $stmt->execute();
        $available_students = $stmt->fetchAll();

        require __DIR__ . '/../view/project/Edit.php';
    }

    public function update(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'project');
            exit;
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: ' . BASE_URL . 'project');
            exit;
        }

        $titre = trim($_POST['titre'] ?? '');
        if (empty($titre)) {
            $error = 'Le titre est obligatoire.';
            $project = $this->model->findById($id);
            require __DIR__ . '/../view/project/Edit.php';
            return;
        }

        $data = [
            'titre'        => $titre,
            'description'  => trim($_POST['description'] ?? ''),
            'statut'       => $_POST['statut'] ?? 'draft',
            'prof_id'      => null,
            'link_github'  => trim($_POST['link_github'] ?? ''),
            'link_youtube' => trim($_POST['link_youtube'] ?? ''),
        ];

        $studentIds = $_POST['coequipiers'] ?? [];
        $this->model->update($id, $data, $studentIds);

        header('Location: ' . BASE_URL . 'project/show?id=' . $id . '&msg=updated');
        exit;
    }

    public function delete(): void {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: ' . BASE_URL . 'project');
            exit;
        }

        $project = $this->model->findById($id);
        if (!$project) {
            http_response_code(404);
            exit;
        }

        require __DIR__ . '/../view/project/Delete_confirm.php';
    }

    public function destroy(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'project');
            exit;
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: ' . BASE_URL . 'project');
            exit;
        }

        $this->model->delete($id);

        header('Location: ' . BASE_URL . 'project?msg=deleted');
        exit;
    }
}