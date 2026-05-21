<?php require __DIR__ . '/../shared/Header.php'; ?>

<main class="main">

    <!-- Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Nouveau projet</h1>
            <p class="page-desc">Remplissez les informations de votre projet.</p>
        </div>
        <a href="<?= BASE_URL ?>/project" class="btn btn-secondary">
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

    <form method="POST" action="<?= BASE_URL ?>/projects/store">

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
                    placeholder="Ex : Système de gestion de bibliothèque"
                    value="<?= htmlspecialchars($_POST['titre'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label class="form-label" for="description">Description</label>
                <textarea
                    class="form-input form-textarea"
                    name="description"
                    id="description"
                    rows="5"
                    placeholder="Décrivez le projet, les technologies utilisées, les objectifs..."><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
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
                            <?= in_array($s['id'], $_POST['coequipiers'] ?? []) ? 'checked' : '' ?>>
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
                    <label class="form-label" for="link_github">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" style="vertical-align:-1px;margin-right:3px" aria-hidden="true"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.2 11.37.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.37-1.33-1.74-1.33-1.74-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.14-.3-.54-1.52.11-3.18 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 013.01-.4c1.02.005 2.05.14 3.01.4 2.28-1.55 3.29-1.23 3.29-1.23.65 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.21.7.82.58C20.56 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg>
                        GitHub
                    </label>
                    <input class="form-input" type="url" name="link_github" id="link_github"
                           placeholder="https://github.com/..."
                           value="<?= htmlspecialchars($_POST['link_github'] ?? '') ?>">
                </div>
                <div class="form-group" style="margin-bottom:0">
                    <label class="form-label" for="link_youtube">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" style="vertical-align:-1px;margin-right:3px;color:#f85149" aria-hidden="true"><path d="M23.5 6.19a3.02 3.02 0 00-2.12-2.14C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.38.55A3.02 3.02 0 00.5 6.19C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 002.12 2.14C4.5 20.5 12 20.5 12 20.5s7.5 0 9.38-.55a3.02 3.02 0 002.12-2.14C24 15.93 24 12 24 12s0-3.93-.5-5.81zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
                        YouTube
                    </label>
                    <input class="form-input" type="url" name="link_youtube" id="link_youtube"
                           placeholder="https://youtube.com/..."
                           value="<?= htmlspecialchars($_POST['link_youtube'] ?? '') ?>">
                </div>
            </div>
        </div>

        <!-- Footer actions -->
        <div class="form-footer">
            <a href="<?= BASE_URL ?>/projects" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                Créer le projet
            </button>
        </div>

    </form>

</main>

<?php require __DIR__ . '/../shared/Footer.php'; ?>