<?php
// view/shared/Header.php
if (!defined('BASE_URL')) {
    define('BASE_URL', '/Gestion_des_projets_FIXED/gestion_projets/');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortfolioLink</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">
    <!-- Add other CSS here if needed -->
</head>
<body>

<nav class="navbar">
    <a href="/" class="navbar-brand">
        <svg width="28" height="28" viewBox="0 0 32 32" fill="none" aria-hidden="true">
            <path d="M8 22 L16 10 L24 22" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="16" cy="10" r="2.5" fill="#3b82f6"/>
        </svg>
        PortfolioLink
    </a>

    <ul class="navbar-links">
        <li><a href="<?= BASE_URL ?>/explore">Explore</a></li>
        <li><a href="<?= BASE_URL ?>/network">Network</a></li>
        <li><a href="<?= BASE_URL ?>/projects" class="active">Projects</a></li>
        <li><a href="<?= BASE_URL ?>/jobs">Jobs</a></li>
    </ul>

    <div class="navbar-right">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?= BASE_URL ?>/project/create" class="btn btn-primary" style="font-size:.82rem; padding:.42rem .9rem;">
                + New Project
            </a>
            <div class="avatar-nav">
                <?= strtoupper(substr($_SESSION['prenom'] ?? 'U', 0, 1) . substr($_SESSION['nom'] ?? '', 0, 1)) ?>
            </div>
        <?php else: ?>
            <a href="<?= BASE_URL ?>/login" class="btn btn-primary" style="font-size:.82rem; padding:.42rem .9rem;">Sign In</a>
        <?php endif; ?>
    </div>
</nav>
