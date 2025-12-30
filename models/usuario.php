<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $img;
    private $db;

    //Conexión a la base de datos 
    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
        //return password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRol() {
        return $this->rol;
    }

    function getImg() {
        return $this->img;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellido($apellido) {
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = $this->db->real_escape_string($password);
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setImg($img) {
        $this->img = $img;
    }

    public function existe() {
        //Comprovamos si existe el correo 
        $email = $this->email;

        //Buscamos el usuario por el email
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $existe = $this->db->query($sql);
        //var_dump($existe);
        //die();
        $result = false;
        if ($existe && $existe->num_rows == 1) {
            $result = true;
        }
        return $result;
    }

    public function save() {
        try {

            $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPassword()}','{$this->getRol()}','NULL')";
            $save = $this->db->query($sql);

            $result = false;
            if ($save) {
                $result = true;
            }
            return $result;
        } catch (PDOException $e) {
            echo "❌ Error de base de datos: " . $e->getMessage();
            return false;
        }
    }

    public function login() {
        try {
            //COMPROBAR SI EXISTE EL USUARIO 
            $result = false;
            $email = $this->email;
            $password = $this->password;

            //Buscamos el usuario por el email
            $sql = "SELECT * FROM usuarios WHERE email = '$email'";
            $login = $this->db->query($sql);

            if ($login && $login->num_rows == 1) {

                $usuario = $login->fetch_object();

                //VERIFICAR LA CONTRASEÑA(si la que me llega por formulario es igual a la que tengo en la base de datos)
                $verify = password_verify($password, $usuario->password);

                if ($verify) {
                    $result = $usuario; //usuario correcto
                } else {
                    $result = "password_error"; //contraseña incorrecta
                }
            } else {
                $result = "No_registrado"; //no existe el usuario
            }

            return $result;
        } catch (PDOException $e) {
            echo "❌ Error de base de datos: " . $e->getMessage();
            return false;
        }
    }

    // Obtener todos los usuarios
    public function getAll() {
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
        $usuarios = $this->db->query($sql);
        var_dump($usuarios);
        die();
        if ($usuarios) {
            return $usuarios; // Devuelve un objeto mysqli_result (para fetch_object en la vista)
        } else {
            return false;
        }
    }

    public function getOne() {
        $sql = "SELECT * FROM usuarios WHERE id = {$this->id}";
        $usuario = $this->db->query($sql);
        return $usuario->fetch_object();
    }

    public function update() {
        $sql = "UPDATE usuarios SET 
                nombre = '{$this->getNombre()}',
                apellido = '{$this->getApellido()}',
                email = '{$this->getEmail()}',
                rol = '{$this->getRol()}'
            WHERE id = {$this->getId()}";
        $update = $this->db->query($sql);
        return $update ? true : false;
    }

    public function getById() {
        $sql = "SELECT * FROM usuarios WHERE id = {$this->id}";
        $result = $this->db->query($sql);
        return $result->fetch_object();
    }

    public function updatePassword() {
        $password = $this->password;
        $sql = "UPDATE usuarios SET password = '$password' WHERE id = {$this->id}";
        $save = $this->db->query($sql);

        return $save ? true : false;
    }

    //Metodo borrar usuario
    public function delete() {
        $sql = "DELETE FROM usuarios WHERE id = {$this->id}";
        $delete = $this->db->query($sql);
        return $delete;
    }

}
