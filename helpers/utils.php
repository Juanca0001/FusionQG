<?php

class Utils {

    public static function deleteSession($name) {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = NULL;
            unset($_SESSION[$name]);
        }

        return $name;
    }

   // Método estático que valida si el usuario actual es administrador
public static function isAdmin() {
    
    // Verifica si en la sesión NO existe la variable 'admin'
    // Esto significa que el usuario no tiene permisos de administrador
    if (!isset($_SESSION['admin'])) {
        var_dump('entra');
        die();
        // Si no es admin, se redirige al usuario a la página principal
        header("Location:" . BASE_URL);
    } else {
        // Si sí está definido 'admin', retorna true y permite continuar
        return true;
    }
}


    public static function isIdentity() {
        if (!isset($_SESSION['identity'])) {
            header("Location:" . BASE_URL);
        } else {
            return true;
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
