<?php
class JugadorController {
    public function dashboard() {
        Utils::requireRole('jugador');
        require_once 'views/jugador/dashboard.php'; 
    }
}
