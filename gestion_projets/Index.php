<?php
// index.php - Main entry point

session_start();

// ====================== BASE CONFIG ======================
define('BASE_URL', '/Gestion_des_projets_FIXED/gestion_projets/');   // ← Trailing slash important!

// Load .env
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $env = parse_ini_file($envFile, false, INI_SCANNER_RAW);
    if ($env) {
        foreach ($env as $key => $val) $_ENV[$key] = $val;
    }
}

// ====================== AUTOLOADER ======================
spl_autoload_register(function (string $class): void {
    $paths = [__DIR__ . '/core/', __DIR__ . '/models/', __DIR__ . '/controller/'];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// ====================== CORE ======================
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/Database.php';

$router = new Router();
$router->dispatch();