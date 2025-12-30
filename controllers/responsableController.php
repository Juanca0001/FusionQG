<?php
class ResponsableController {
    public function dashboard() {
        if (!isset($_SESSION['responsable'])) {
            header("Location:" . BASE_URL);
            exit();
        }
        require_once 'views/responsable/dashboard.php';
    }
}
