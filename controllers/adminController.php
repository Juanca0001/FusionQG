<?php
class AdminController {
    public function dashboard() {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . BASE_URL);
            exit();
        }
        require_once 'views/admin/dashboard.php';
    }
}
