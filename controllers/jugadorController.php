<?php
class JugadorController {
    public function dashboard() {
        if (!isset($_SESSION['jugador'])) {
            header("Location:" . BASE_URL);
            exit();
        }
        require_once 'views/jugador/dashboard.php'; 
    }
}
