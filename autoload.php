
<?php
spl_autoload_register(function ($class) {
    $folders = ['controllers/', 'models/', 'libs/']; // Agrega las carpetas que uses

    foreach ($folders as $folder) {
        $file = $folder . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
    // Si no se encontró la clase, lanza error
    die("No se pudo cargar la clase: $class");
});
