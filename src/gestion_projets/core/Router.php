<?php

class Router {
private array $routes = [
    // Projets
    'project'          => ['ProjectController', 'index'],     // changed from projects
    'project/show'     => ['ProjectController', 'show'],
    'project/create'   => ['ProjectController', 'create'],
    'project/store'    => ['ProjectController', 'store'],
    'project/edit'     => ['ProjectController', 'edit'],
    'project/update'   => ['ProjectController', 'update'],
    'project/delete'   => ['ProjectController', 'delete'],
    'project/destroy'  => ['ProjectController', 'destroy'],
];

public function dispatch(): void {
    if (isset($_GET['url'])) {
        $url = trim($_GET['url'], '/');
    } else {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $base = '/Gestion_des_projets_FIXED/Gestion_des_projets_FIXED/gestion_projets';
        $url = trim(str_replace($base, '', $uri), '/');
    }

    if (isset($this->routes[$url])) {
        [$controllerClass, $method] = $this->routes[$url];
        $controller = new $controllerClass();
        $controller->$method();
    } else {
        http_response_code(404);
        require __DIR__ . '/../view/shared/404.php';
    }
    }
}
?>