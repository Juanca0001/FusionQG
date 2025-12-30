<?php
class ProfesorController {
    public function dashboard() {
        if (!isset($_SESSION['profesor'])) {
            header("Location:" . BASE_URL);
            exit();
        }
        require_once 'views/profesor/dashboard.php';
    }
}
