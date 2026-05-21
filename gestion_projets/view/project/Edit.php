<?php require __DIR__ . '/../shared/Header.php'; ?>

<?php
if (!isset($project)) {
    $project = ['id' => '', 'titre' => '', 'description' => '', 'statut' => 'draft', 'students' => []];
}
if (!isset($available_students)) $available_students = [];

$current_ids = array_column($project['students'] ?? [], 'id');

$statuts = [
    'draft'    => 'Brouillon',
    'pending'  => 'En attente de validation',
    'approved' => 'Accepté',
    'rejected' => 'Refusé',
];
?>

<main class="main">

    <!-- Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Modifier le projet</h1>
            <p class="page-desc"><?= htmlspecialchars($project['titre']) ?></p>
        </div>
        <a href="<?= BASE_URL ?>/project/show?id=<?= $project['id'] ?>" class="btn btn-secondary">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
            Retour
        </a>
    </div>

    <!-- Erreur -->
    <?php if (isset($error)): ?>
        <div class="alert alert-error">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>/project/update">
        <input type="hidden" name="id" value="<?= $project['id'] ?>">

        <!-- Section 1 : Infos principales -->
        <div class="form-card">
            <div class="form-card-title">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>
                Informations du projet
            </div>

            <div class="form-group">
                <label class="form-label" for="titre">Titre <span class="req">*</span></label>
                <input
                    class="form-input"
                    type="text"
                    name="titre"
                    id="titre"
                    required
                    placeholder="Titre du projet"
                    value="<?= htmlspecialchars($project['titre']) ?>">
            </div>

            <div class="form-group">
                <label class="form-label" for="description">Description</label>
                <textarea
                    class="form-input form-textarea"
                    name="description"
                    id="description"
                    rows="5"
                    placeholder="Décrivez le projet..."><?= htmlspecialchars($project['description'] ?? '') ?></textarea>
            </div>

            <div class="form-group" style="margin-bottom:0">
                <label class="form-label" for="statut">Statut</label>
                <select class="form-input form-select" name="statut" id="statut">
                    <?php foreach ($statuts as $val => $label): ?>
                        <option value="<?= $val ?>" <?= ($project['statut'] === $val) ? 'selected' : '' ?>>
                            <?= $label ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Section 2 : Coéquipiers -->
        <div class="form-card">
            <div class="form-card-title">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" aria-hidden="true"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                Coéquipiers
            </div>

            <?php if (!empty($available_students)): ?>
                <div class="teammates-list">
                    <?php foreach ($available_students as $s): ?>
                    <label class="teammate-check">
                        <input
                            type="checkbox"
                            name="coequipiers[]"
                            value="<?= $s['id'] ?>"
                            <?= in_array($s['id'], $current_ids) ? 'checked' : '' ?>>
                        <div>
                            <div style="font-size:.88rem;font-weight:600;color:var(--text-primary);">
                                <?= htmlspecialchars($s['prenom'] . ' ' . $s['nom']) ?>
                            </div>
                        </div>
                    </label>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p style="font-size:.85rem;color:var(--text-muted);">Aucun étudiant disponible.</p>
            <?php endif; ?>
        </div>

        <!-- Section 3 : Liens -->
        <div class="form-card">
            <div class="form-card-title">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" aria-hidden="true"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg>
                Liens du projet
            </div>

            <div class="form-row">
                <div class="form-group" style="margin-bottom:0">
                    <label class="form-label" for="link_github">GitHub</label>
                    <input class="form-input" type="url" name="link_github" id="link_github"
                           placeholder="https://github.com/..."
                           value="<?= htmlspecialchars($project['link_github'] ?? '') ?>">
                </div>
                <div class="form-group" style="margin-bottom:0">
                    <label class="form-label" for="link_youtube">YouTube</label>
                    <input class="form-input" type="url" name="link_youtube" id="link_youtube"
                           placeholder="https://youtube.com/..."
                           value="<?= htmlspecialchars($project['link_youtube'] ?? '') ?>">
                </div>
            </div>
        </div>

        <!-- Footer actions -->
        <div class="form-footer">
            <a href="<?= BASE_URL ?>/project/show?id=<?= $project['id'] ?>" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                Enregistrer les modifications
            </button>
        </div>

    </form>

</main>

<?php require __DIR__ . '/../shared/Footer.php'; ?>
