<?php
class ClienteController {

    // Vista principal después de login
    public function dashboard() {
        require_once 'views/cliente/dashboard.php';
    }

    // Perfil del usuario logueado
    public function perfil() {
        if (!isset($_SESSION['identity'])) {
            header("Location:" . BASE_URL . "usuario/login");
            exit();
        }
        $usuario = $_SESSION['identity'];
        require_once 'views/cliente/perfil.php';
    }

    // Noticias o comunicados de la academia
    public function noticias() {
        require_once 'views/cliente/noticias.php';
    }

    // Calendario de entrenamientos/torneos
    public function calendario() {
        require_once 'views/cliente/calendario.php';
    }
    
      // Donaciones 
    public function donaciones() {
        require_once 'views/donaciones/donaciones.php';
    }

}
