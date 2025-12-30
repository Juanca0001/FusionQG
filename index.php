<?php
session_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';
require_once 'views/layouts/sidebar.php';
//require_once 'views/layouts/hero.php';

// Función para mostrar errores centralizados
function show_error() {
    $error = new errorController();
    $error->index();
}

// Cargar valores desde la URL
if (isset($_GET['controller'])) {
    $nombre_controlador = ucfirst($_GET['controller']) . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    // Valores por defecto definidos en config.php
    $nombre_controlador = controller_default;
} else {
    show_error();
    exit();
}


// Verificar si la clase del controlador existe
if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();

    // Si la acción existe y está definida en el controlador
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();

    // Si no se definieron ni controlador ni acción en la URL
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        // Usar acción por defecto
        $action_default = action_default; // constante definida en config.php
        $controlador->$action_default();

    } else {
        show_error();
    }
} else {
    show_error();
}


require_once 'views/layouts/footer.php';
