<?php

require_once 'models/Categoria.php';

class CategoriaController {

    public function gestion() {
        Utils::isAdmin(); // si tienes middleware de admin
        var_dump(isAdmin);
        die();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/gestion.php';
    }

    public function crear() {
        require_once 'views/categoria/crear.php';
    }

    public function save() {
        if (isset($_POST['nombre'])) {
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->setDescripcion($_POST['descripcion']);

            $save = $categoria->save();
            $_SESSION['mensaje'] = $save ? "Categoría creada correctamente" : "Error al crear categoría";
            $_SESSION['icono'] = $save ? "success" : "error";
        }
        header("Location:" . BASE_URL . "categoria/gestion");
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $categoria = $categoria->getOne();
            require_once 'views/categoria/editar.php';
        }
    }

    public function update() {
        if (isset($_POST['id'])) {
            $categoria = new Categoria();
            $categoria->setId($_POST['id']);
            $categoria->setNombre($_POST['nombre']);
            $categoria->setDescripcion($_POST['descripcion']);

            $update = $categoria->update();
            $_SESSION['mensaje'] = $update ? "Categoría actualizada correctamente" : "Error al actualizar categoría";
            $_SESSION['icono'] = $update ? "success" : "error";
        }
        header("Location:" . BASE_URL . "categoria/gestion");
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $delete = $categoria->delete();
            $_SESSION['mensaje'] = $delete ? "Categoría eliminada correctamente" : "Error al eliminar categoría";
            $_SESSION['icono'] = $delete ? "success" : "error";
        }
        header("Location:" . BASE_URL . "categoria/gestion");
    }

}
