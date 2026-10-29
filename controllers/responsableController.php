<?php
class ResponsableController {
    public function dashboard() {
        Utils::requireRole('responsable');
        require_once 'views/responsable/dashboard.php';
    }
}
