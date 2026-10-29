<?php
class ProfesorController {
    public function dashboard() {
        Utils::requireRole('profesor');
        require_once 'views/profesor/dashborad.php';
    }
}
