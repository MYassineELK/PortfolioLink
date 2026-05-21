<?php require __DIR__ . '/../shared/Header.php'; ?>

<main class="main">

    <div style="max-width:520px;margin:3rem auto;">

    <?php if (isset($project) && !empty($project['titre'])): ?>

        <div class="confirm-card">
            <div class="confirm-icon">
                <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin:0 auto;display:block" aria-hidden="true"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>

            <div class="confirm-title">Supprimer le projet</div>

            <p class="confirm-text">
                Êtes-vous sûr de vouloir supprimer le projet<br>
                <span class="confirm-project">"<?= htmlspecialchars($project['titre']) ?>"</span> ?
                <br><br>
                Cette action est <strong>irréversible</strong>.<br>
                Tous les coéquipiers, commentaires et données associées seront également supprimés <em>(ON DELETE CASCADE)</em>.
            </p>

            <form method="POST" action="<?= BASE_URL ?>/project/destroy">
                <input type="hidden" name="id" value="<?= $project['id'] ?>">
                <div class="confirm-actions">
                    <a href="<?= BASE_URL ?>/project" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-danger" style="background:rgba(248,113,113,.2);border:1px solid rgba(248,113,113,.4);color:var(--danger);font-weight:700;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M9 6V4h6v2"/></svg>
                        Confirmer la suppression
                    </button>
                </div>
            </form>
        </div>

    <?php else: ?>
        <div class="alert alert-error">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            Projet introuvable ou ID invalide.
        </div>
        <div style="text-align:center;margin-top:1rem;">
            <a href="<?= BASE_URL ?>/project" class="btn btn-secondary">Retour à la liste</a>
        </div>
    <?php endif; ?>

    </div>

</main>

<?php require __DIR__ . '/../shared/Footer.php'; ?>
