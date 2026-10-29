<?php
class AdminController {
    public function dashboard() {
        Utils::requireRole('admin');
        require_once 'views/admin/dashboard.php';
    }
}
