<?php

class Utils {

    public static function deleteSession($name) {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = NULL;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    // El rol proviene de la sesión creada después de verificar la contraseña.
    public static function hasRole($role) {
        return isset($_SESSION['identity']) && is_object($_SESSION['identity'])
            && isset($_SESSION['identity']->rol) && $_SESSION['identity']->rol === $role;
    }

    public static function canManageUser($id) {
        if (filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) === false) {
            return false;
        }
        return isset($_SESSION['identity']->id)
            && (self::hasRole('admin') || (int) $_SESSION['identity']->id === (int) $id);
    }

    public static function denyAccess() {
        http_response_code(403);
        exit('No tienes permiso para acceder a esta sección.');
    }

    public static function isAdmin() {
        return self::requireRole('admin');
    }

    public static function requireRole($role) {
        self::isIdentity();
        if (!self::hasRole($role)) {
            self::denyAccess();
        }
        return true;
    }

    public static function isIdentity() {
        if (!isset($_SESSION['identity']) || !is_object($_SESSION['identity'])) {
            header('Location: ' . BASE_URL . 'usuario/ingreso');
            exit();
        }
        return true;
    }

    // index.php ejecuta esta política antes de enviar HTML al navegador.
    public static function authorizeRoute($controller, $action) {
        $controller = strtolower($controller);
        $action = strtolower($action);
        $roles = ['admin' => 'admin', 'categoria' => 'admin', 'profesor' => 'profesor',
            'jugador' => 'jugador', 'responsable' => 'responsable'];
        if (isset($roles[$controller])) {
            self::requireRole($roles[$controller]);
        }
        if ($controller !== 'usuario') {
            return;
        }
        if (in_array($action, ['gestion', 'crear', 'crearnuevo', 'save', 'eliminar'], true)) {
            self::isAdmin();
        }
        if (in_array($action, ['perfil', 'cambiarpassword', 'editar', 'actualizar', 'updatepassword'], true)) {
            self::isIdentity();
        }
        if (in_array($action, ['editar', 'actualizar', 'updatepassword'], true)) {
            $id = $action === 'editar' ? ($_GET['id'] ?? null) : ($_POST['id'] ?? null);
            if (!self::canManageUser($id)) {
                self::denyAccess();
            }
            if ($action === 'actualizar' && !self::hasRole('admin')) {
                $_POST['rol'] = $_SESSION['identity']->rol;
            }
            if ($action === 'updatepassword' && (int) $id !== (int) $_SESSION['identity']->id) {
                self::denyAccess();
            }
        }
    }

    public static function showCategorias() {
        require_once 'Models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    public static function statsCarrito() {
        $stats = array('count' => 0, 'total' => 0);

        if (isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as $producto) {
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }
        return $stats;
    }

    public static function showStatus($status) {

        $value = 'pendiente';
        if ($status == 'confirm') {
            return $value;
        } elseif ($status == 'preparation') {
            $value = 'En preparación';
        } elseif ($status == 'ready') {
            $value = 'Preparado para enviar';
        } elseif ($status == 'sended') {
            $value = 'enviado';
        }
        return $value;
    }

}
