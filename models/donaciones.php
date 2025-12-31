<?php
class Donacion {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function obtenerTodas() {
        $stmt = $this->db->query("
            SELECT id, nombre, email, monto, estado, referencia_pago, created_at
            FROM donaciones
            ORDER BY created_at DESC
        ");
        return $stmt->fetchAll();
    }

    public function totalRecaudado() {
        $stmt = $this->db->query("
            SELECT SUM(monto) AS total
            FROM donaciones
            WHERE estado = 'completada'
        ");
        return $stmt->fetch()['total'] ?? 0;
    }
}
