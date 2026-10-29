<?php
session_start();
// Aplazar la salida permite redirecciones y renovación de sesión.
ob_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

// Resolver la ruta y comprobar permisos antes de enviar HTML.
$controller = $_GET['controller'] ?? 'usuario';
$action = $_GET['action'] ?? 'index';
$validRoute = is_string($controller) && is_string($action)
    && preg_match('/^[a-zA-Z]+$/D', $controller)
    && preg_match('/^[a-zA-Z][a-zA-Z0-9]*$/D', $action);

if (!$validRoute) {
    http_response_code(404);
    exit('Página no encontrada.');
}

$controller = strtolower($controller);
$controllerFile = 'controllers/' . $controller . 'Controller.php';
$controllerClass = ucfirst($controller) . 'Controller';
if (is_file($controllerFile)) {
    require_once $controllerFile;
}

if (!class_exists($controllerClass, false) || !method_exists($controllerClass, $action)) {
    http_response_code(404);
    require 'views/layouts/header.php';
    echo '<main class="main-content"><h1>Sección no disponible</h1><p>Esta sección todavía no está disponible.</p><a href="' . BASE_URL . '">Volver al inicio</a></main>';
    require 'views/layouts/footer.php';
    exit();
}

Utils::authorizeRoute($controller, $action);
$instance = new $controllerClass();
if (!is_callable([$instance, $action])) {
    http_response_code(404);
    exit('Página no encontrada.');
}

require_once 'views/layouts/header.php';
require_once 'views/layouts/sidebar.php';
$instance->$action();
require_once 'views/layouts/footer.php';
