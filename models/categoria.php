<?php
class Categoria {
    private $id;
    private $nombre;
    private $descripcion;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getDescripcion() { return $this->descripcion; }

    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $this->db->real_escape_string($nombre); }
    public function setDescripcion($descripcion) { $this->descripcion = $this->db->real_escape_string($descripcion); }

    // Obtener todas
    public function getAll() {
        $sql = "SELECT * FROM categorias ORDER BY id DESC";
        return $this->db->query($sql);
    }

    // Obtener una
    public function getOne() {
        $sql = "SELECT * FROM categorias WHERE id={$this->getId()}";
        $categoria = $this->db->query($sql);
        return $categoria->fetch_object();
    }

    // Guardar
    public function save() {
        $sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}','{$this->getDescripcion()}')";
        return $this->db->query($sql);
    }

    // Editar
    public function update() {
        $sql = "UPDATE categorias SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}' WHERE id={$this->getId()}";
        return $this->db->query($sql);
    }

    // Eliminar
    public function delete() {
        $sql = "DELETE FROM categorias WHERE id={$this->getId()}";
        return $this->db->query($sql);
    }
}

