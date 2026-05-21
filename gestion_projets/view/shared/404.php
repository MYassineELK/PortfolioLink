<?php require __DIR__ . '/Header.php'; ?>

<main class="main">
    <div style="max-width:480px;margin:4rem auto;text-align:center;">
        <div style="font-size:4rem;font-weight:800;color:var(--accent-blue);margin-bottom:.5rem;">404</div>
        <h2 style="margin-bottom:.75rem;">Page introuvable</h2>
        <p style="color:var(--text-muted);margin-bottom:2rem;">La ressource demandée n'existe pas ou a été supprimée.</p>
        <a href="<?php echo BASE_URL; ?>/view/project" class="btn btn-primary">Retour aux projets</a>
    </div>
</main>

<?php require __DIR__ . '/Footer.php'; ?>
