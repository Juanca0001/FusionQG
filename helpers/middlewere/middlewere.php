<?php
class AdminMiddleware {
    public static function handle() {
        session_start();

        if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
            header("Location: /login");
            exit;
        }
    }
}
