<?php require __DIR__ . '/../shared/Header.php'; ?>

<?php
function avColorShow(string $name): string {
    $colors = ['av-blue','av-green','av-pink','av-amber'];
    return $colors[ord($name[0]) % 4];
}

function statutLabelShow(string $s): string {
    switch ($s) {
        case 'approved': return 'Accepté';
        case 'pending':  return 'En attente';
        case 'rejected': return 'Refusé';
        default:         return 'Brouillon';
    }
}

if (!isset($project) || !is_array($project)) {
    $project = [];
}

$project += [
    'id' => 0,
    'titre' => '',
    'statut' => 'pending',
    'prof_prenom' => '',
    'prof_nom' => '',
    'created_at' => date('Y-m-d'),
    'description' => '',
    'link_github' => '',
    'link_youtube' => '',
    'students' => [],
];
?>

<main class="main">

    <!-- Breadcrumb -->
    <div style="font-size:.82rem;color:var(--text-muted);margin-bottom:1.5rem;display:flex;align-items:center;gap:.4rem;">
        <a href="<?= BASE_URL ?>/project" style="color:var(--text-muted);transition:color .2s" onmouseover="this.style.color='#3b82f6'" onmouseout="this.style.color='var(--text-muted)'">Projects</a>
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
        <span style="color:var(--text-primary)"><?= htmlspecialchars($project['titre']) ?></span>
    </div>

    <!-- Hero card -->
    <div class="detail-hero">
        <div class="detail-hero-top">
            <div>
                <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:.6rem;flex-wrap:wrap;">
                    <h1 class="detail-title"><?= htmlspecialchars($project['titre']) ?></h1>
                    <span class="badge badge-<?= htmlspecialchars($project['statut']) ?>">
                        <?= statutLabelShow($project['statut']) ?>
                    </span>
                    <?php if ($project['statut'] === 'approved'): ?>
                        <span class="badge badge-verified">✓ VERIFIED</span>
                    <?php endif; ?>
                </div>

                <div class="detail-meta">
                    <?php if (!empty($project['prof_nom'])): ?>
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        <span>Prof : <?= htmlspecialchars($project['prof_prenom'] . ' ' . $project['prof_nom']) ?></span>
                        <span class="meta-dot">·</span>
                    <?php endif; ?>
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <span><?= date('d/m/Y', strtotime($project['created_at'])) ?></span>
                    <span class="meta-dot">·</span>
                    <span><?= count($project['students']) ?> coéquipier<?= count($project['students']) > 1 ? 's' : '' ?></span>
                </div>
            </div>

            <!-- Actions -->
            <div class="detail-actions">
                <a href="<?= BASE_URL ?>/project/edit?id=<?= $project['id'] ?>" class="btn btn-secondary">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    Modifier
                </a>
                <a href="<?= BASE_URL ?>/project/delete?id=<?= $project['id'] ?>" class="btn btn-danger">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M9 6V4h6v2"/></svg>
                    Supprimer
                </a>
            </div>
        </div>

        <!-- Description -->
        <?php if (!empty($project['description'])): ?>
        <p class="detail-desc"><?= nl2br(htmlspecialchars($project['description'])) ?></p>
        <?php endif; ?>

        <!-- Liens GitHub / YouTube -->
        <?php if (!empty($project['link_github']) || !empty($project['link_youtube'])): ?>
        <div class="detail-links">
            <?php if (!empty($project['link_github'])): ?>
                <a href="<?= htmlspecialchars($project['link_github']) ?>" target="_blank" rel="noopener" class="link-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.2 11.37.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.37-1.33-1.74-1.33-1.74-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.14-.3-.54-1.52.11-3.18 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 013.01-.4c1.02.005 2.05.14 3.01.4 2.28-1.55 3.29-1.23 3.29-1.23.65 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.21.7.82.58C20.56 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg>
                    GitHub
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                </a>
            <?php endif; ?>
            <?php if (!empty($project['link_youtube'])): ?>
                <a href="<?= htmlspecialchars($project['link_youtube']) ?>" target="_blank" rel="noopener" class="link-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.5 6.19a3.02 3.02 0 00-2.12-2.14C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.38.55A3.02 3.02 0 00.5 6.19C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 002.12 2.14C4.5 20.5 12 20.5 12 20.5s7.5 0 9.38-.55a3.02 3.02 0 002.12-2.14C24 15.93 24 12 24 12s0-3.93-.5-5.81zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
                    YouTube
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>

    <!-- Coéquipiers -->
    <?php if (!empty($project['students'])): ?>
    <div class="detail-section">
        <div class="section-title">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
            Coéquipiers (<?= count($project['students']) ?>)
        </div>

        <?php foreach ($project['students'] as $s): ?>
        <div class="teammate-row">
            <?php $initials = strtoupper(substr($s['prenom'] ?? '?', 0, 1) . substr($s['nom'] ?? '', 0, 1)); ?>
            <div class="av <?= avColorShow($s['nom'] ?? 'a') ?>" style="width:36px;height:36px;font-size:.78rem;">
                <?= $initials ?>
            </div>
            <div style="flex:1">
                <div class="teammate-name"><?= htmlspecialchars($s['prenom'] . ' ' . $s['nom']) ?></div>
                <?php if (!empty($s['link_github']) || !empty($s['link_youtube'])): ?>
                <div class="teammate-sub" style="display:flex;gap:.5rem;margin-top:2px;">
                    <?php if (!empty($s['link_github'])): ?>
                        <a href="<?= htmlspecialchars($s['link_github']) ?>" target="_blank" style="color:var(--accent-blue);font-size:.75rem;">GitHub</a>
                    <?php endif; ?>
                    <?php if (!empty($s['link_youtube'])): ?>
                        <a href="<?= htmlspecialchars($s['link_youtube']) ?>" target="_blank" style="color:#f85149;font-size:.75rem;">YouTube</a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <span class="badge badge-<?= htmlspecialchars($s['statut'] ?? 'pending') ?>" style="font-size:.7rem;">
                <?= statutLabelShow($s['statut'] ?? 'pending') ?>
            </span>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Feedback professeur -->
    <?php
    $feedback = null;
    foreach (($project['students'] ?? []) as $s) {
        if (!empty($s['feedback_prof'])) { $feedback = $s['feedback_prof']; break; }
    }
    ?>
    <?php if ($feedback): ?>
    <div class="detail-section" style="border-color:rgba(59,130,246,.3);">
        <div class="section-title" style="color:var(--accent-blue);">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
            Feedback du professeur
        </div>
        <blockquote style="color:var(--text-muted);font-size:.88rem;line-height:1.65;font-style:italic;border-left:3px solid var(--accent-blue);padding-left:1rem;">
            "<?= htmlspecialchars($feedback) ?>"
        </blockquote>
        <?php if (!empty($project['prof_nom'])): ?>
        <div style="display:flex;align-items:center;gap:.5rem;margin-top:.85rem;">
            <div class="av av-blue" style="width:28px;height:28px;font-size:.65rem;">
                <?= strtoupper(substr($project['prof_prenom'] ?? '', 0, 1) . substr($project['prof_nom'] ?? '', 0, 1)) ?>
            </div>
            <div>
                <div style="font-size:.82rem;font-weight:700;">
                    <?= htmlspecialchars($project['prof_prenom'] . ' ' . $project['prof_nom']) ?>
                </div>
                <div style="font-size:.73rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:.05em;">Professeur</div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <!-- Retour -->
    <div style="margin-top:1.5rem;">
        <a href="<?= BASE_URL ?>/project" class="btn btn-secondary">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
            Retour à la liste
        </a>
    </div>

</main>

<?php require __DIR__ . '/../shared/Footer.php'; ?>