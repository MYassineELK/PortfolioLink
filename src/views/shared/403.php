<?php require __DIR__ . '/Header.php'; ?>

<main class="main">
    <div style="max-width:480px;margin:4rem auto;text-align:center;">
        <div style="font-size:4rem;font-weight:800;color:var(--danger);margin-bottom:.5rem;">403</div>
        <h2 style="margin-bottom:.75rem;">Accès refusé</h2>
        <p style="color:var(--text-muted);margin-bottom:2rem;">Vous n'avez pas la permission d'accéder à cette page.</p>
        <a href="<?= BASE_URL ?>/project" class="btn btn-secondary">Retour aux projets</a>
    </div>
</main>

<?php require __DIR__ . '/Footer.php'; ?>
