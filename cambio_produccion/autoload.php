
<?php
/**
 * Función autoload personalizada para cargar automáticamente los controladores
 * del proyecto MVC según el entorno en el que se ejecute (producción o local).
 * 
 * Esta función evita tener que incluir manualmente cada archivo controlador
 * mediante `require_once` o `include` en el proyecto.
 *
 * @param string $classname Nombre de la clase que se intenta instanciar.
 */
function controllers_autoload($classname) {
    
    // Obtiene la variable de entorno 'ENVIRONMENT' (puede ser 'produccion' o 'local')
    $env = getenv("ENVIRONMENT");

    // Verifica si el entorno actual es de producción
    if ($env == "produccion") {
        // Si el entorno es producción, se carga el archivo del controlador usando 'require_once'
        // ucfirst() convierte la primera letra del nombre de la clase en mayúscula
        // Ejemplo: si la clase es 'usuarioController', buscará 'controllers/UsuarioController.php'
        require_once 'controllers/' . ucfirst($classname) . '.php';
    } else {
        // Si el entorno es local (desarrollo), se carga el archivo del controlador con 'include'
        // En desarrollo, 'include' permite que el sistema siga ejecutándose incluso si el archivo no existe,
        // lo que facilita la depuración.
        include 'controllers/' . $classname . '.php';
    }
}

// Registra la función 'controllers_autoload' como el método de autoload
// Esto hace que PHP ejecute automáticamente esta función cada vez que se intenta
// instanciar una clase que aún no ha sido cargada.
spl_autoload_register('controllers_autoload');

