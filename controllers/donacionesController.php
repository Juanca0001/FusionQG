<?php
require_once '../app/Models/Donacion.php';
require_once '../app/Middleware/AdminMiddleware.php';

class DonacionesController {

    public function index() {
        AdminMiddleware::handle();

        global $pdo;
        $donacionModel = new Donacion($pdo);

        $donaciones = $donacionModel->obtenerTodas();
        $total = $donacionModel->totalRecaudado();

        require '../app/Views/admin/donaciones/index.php';
    }
}
