<?php require __DIR__ . '/../shared/Header.php'; ?>

<?php
// Statut actif pour le filtre
$activeStatut = $_GET['statut'] ?? 'all';

// Couleurs avatars selon initiales
function avColor(string $name): string {
    $colors = ['av-blue','av-green','av-pink','av-amber'];
    return $colors[ord($name[0]) % 4];
}

// Label statut FR
function statutLabel(string $s): string {
    switch ($s) {
        case 'approved': return 'Accepté';
        case 'pending':  return 'En attente';
        case 'rejected': return 'Refusé';
        default:         return 'Brouillon';
    }
}
?>

<main class="main">

    <!-- Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Mes projets</h1>
            <p class="page-desc">Gérez vos projets, coéquipiers et liens.</p>
        </div>
<a href="<?= BASE_URL ?>project/create" class="btn btn-primary">
    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Nouveau projet
</a>
    </div>

    <!-- Message flash -->
    <?php if (isset($_GET['msg'])): ?>
        <?php if ($_GET['msg'] === 'created'): ?>
            <div class="alert alert-success">✓ Projet créé avec succès !</div>
        <?php elseif ($_GET['msg'] === 'updated'): ?>
            <div class="alert alert-info">✓ Projet mis à jour avec succès.</div>
        <?php elseif ($_GET['msg'] === 'deleted'): ?>
            <div class="alert alert-error">Projet supprimé.</div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Filtres -->
    <div class="filter-bar">
        <a href="<?= BASE_URL ?>project"                   class="filter-btn <?= $activeStatut === 'all'      ? 'active' : '' ?>">Tous</a>
        <a href="<?= BASE_URL ?>project?statut=draft"      class="filter-btn <?= $activeStatut === 'draft'    ? 'active' : '' ?>">Brouillon</a>
        <a href="<?= BASE_URL ?>project?statut=pending"    class="filter-btn <?= $activeStatut === 'pending'  ? 'active' : '' ?>">En attente</a>
        <a href="<?= BASE_URL ?>project?statut=approved"   class="filter-btn <?= $activeStatut === 'approved' ? 'active' : '' ?>">Accepté</a>
        <a href="<?= BASE_URL ?>project?statut=rejected"   class="filter-btn <?= $activeStatut === 'rejected' ? 'active' : '' ?>">Refusé</a>
    </div>

    <!-- Grille de projets -->
    <div class="projects-grid">

    <?php if (isset($projects) && is_array($projects) && count($projects) > 0): ?>

        <?php foreach ($projects as $p): ?>
        <div class="project-card">

            <div class="card-top">
                <h2 class="card-title"><?= htmlspecialchars($p['titre']) ?></h2>
                <span class="badge badge-<?= htmlspecialchars($p['statut']) ?>">
                    <?= statutLabel($p['statut']) ?>
                </span>
            </div>

            <p class="card-desc">
                <?= htmlspecialchars(substr($p['description'] ?? '', 0, 130)) ?>
                <?= strlen($p['description'] ?? '') > 130 ? '...' : '' ?>
            </p>

            <?php if (!empty($p['link_github']) || !empty($p['link_youtube'])): ?>
            <div class="card-tags">
                <?php if (!empty($p['link_github'])): ?>
                    <span class="tag">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="vertical-align:-1px;margin-right:3px"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.2 11.37.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.37-1.33-1.74-1.33-1.74-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.14-.3-.54-1.52.11-3.18 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 013.01-.4c1.02.005 2.05.14 3.01.4 2.28-1.55 3.29-1.23 3.29-1.23.65 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.21.7.82.58C20.56 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg>
                        GitHub
                    </span>
                <?php endif; ?>
                <?php if (!empty($p['link_youtube'])): ?>
                    <span class="tag">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="vertical-align:-1px;margin-right:3px"><path d="M23.5 6.19a3.02 3.02 0 00-2.12-2.14C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.38.55A3.02 3.02 0 00.5 6.19C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 002.12 2.14C4.5 20.5 12 20.5 12 20.5s7.5 0 9.38-.55a3.02 3.02 0 002.12-2.14C24 15.93 24 12 24 12s0-3.93-.5-5.81zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
                        YouTube
                    </span>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="card-footer">
                <!-- Nombre de coéquipiers -->
                <div class="avatars">
                    <?php $count = (int)($p['student_count'] ?? 0); ?>
                    <?php if ($count > 0): ?>
                        <span style="font-size:.78rem;color:var(--text-muted)">
                            <?= $count ?> coéquipier<?= $count > 1 ? 's' : '' ?>
                        </span>
                    <?php else: ?>
                        <span style="font-size:.78rem;color:var(--text-muted)">Solo</span>
                    <?php endif; ?>
                </div>

                <!-- Actions -->
                <div class="card-actions">
                    <a href="<?= BASE_URL ?>/project/show?id=<?= $p['id'] ?>" class="btn-icon" title="Voir">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        Voir
                    </a>
                    <a href="<?= BASE_URL ?>/project/edit?id=<?= $p['id'] ?>" class="btn-icon" title="Modifier">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Modifier
                    </a>
                    <a href="<?= BASE_URL ?>/project/delete?id=<?= $p['id'] ?>" class="btn-icon del" title="Supprimer">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    <?php else: ?>
        <div class="empty-state">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin:0 auto 1rem;display:block;color:var(--text-muted)" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>
            <h3>Aucun projet trouvé</h3>
            <p>Commencez par créer votre premier projet.</p>
            <a href="<?= BASE_URL ?>project/create" class="btn btn-primary">+ Créer un projet</a>
        </div>
    <?php endif; ?>

    </div>
</main>

<?php require __DIR__ . '/../shared/Footer.php'; ?>
