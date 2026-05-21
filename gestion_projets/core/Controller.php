<?php

/**
 * Classe de base pour tous les Controllers.
 * Chaque controller (ProjectController, AuthController, etc.)
 * doit étendre cette classe.
 */
class Controller {

    /**
     * Charge une vue en injectant des variables.
     *
     * @param string $view   Chemin de la vue (ex: 'project/index')
     * @param array  $data   Variables à rendre disponibles dans la vue
     */
    protected function render(string $view, array $data = []): void {
        // Rend les clés du tableau disponibles comme variables dans la vue
        extract($data);

        $viewPath = "view/{$view}.php";

        if (!file_exists($viewPath)) {
            http_response_code(500);
            die("Vue introuvable : {$viewPath}");
        }

        require $viewPath;
    }

    /**
     * Redirige vers une URL et arrête l'exécution.
     *
     * @param string $url  URL de destination
     */
    protected function redirect(string $url): void {
        header("Location: {$url}");
        exit;
    }

    /**
     * Vérifie que l'utilisateur est connecté.
     * Redirige vers /login sinon.
     */
    protected function requireAuth(): void {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/login');
        }
    }

    /**
     * Vérifie que la requête est bien en POST.
     * Redirige sinon.
     *
     * @param string $fallback  URL de redirection si ce n'est pas un POST
     */
    protected function requirePost(string $fallback = '/'): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect($fallback);
        }
    }

    /**
     * Retourne une valeur POST nettoyée.
     *
     * @param string $key      Clé du champ POST
     * @param string $default  Valeur par défaut si absent
     */
    protected function input(string $key, string $default = ''): string {
        return trim($_POST[$key] ?? $default);
    }

    /**
     * Retourne une valeur GET nettoyée.
     */
    protected function query(string $key, string $default = ''): string {
        return trim($_GET[$key] ?? $default);
    }

    /**
     * Retourne l'ID entier depuis GET ou POST, ou null si invalide.
     */
    protected function getId(string $source = 'GET'): ?int {
        $raw = $source === 'POST'
            ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT)
            : filter_input(INPUT_GET,  'id', FILTER_VALIDATE_INT);

        return $raw ?: null;
    }
}
