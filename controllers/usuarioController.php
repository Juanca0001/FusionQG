<?php

require_once 'Models/usuario.php';

class UsuarioController {

    public function index() {
        require_once 'views/home/home.php';
    }

    public function ingreso() {
        require_once 'views/home/home.php';
        require_once 'views/usuario/login.php';
    }

    public function registro() {
        require_once 'views/home/home.php';
        require_once 'views/usuario/registro.php';
    }

    public function perfil() {
        require_once 'views/usuario/perfil.php';
    }

    public function cambiarPassword() {
        require_once 'views/usuario/cambiarPassword.php';
    }
    

    public function gestion() {
        Utils::isAdmin();
        var_dump(Utils::isAdmin());
        die();
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        require_once 'views/usuario/gestion.php';
    }

    public function crear() {
        // Método para mostrar el formulario de creación de usuario
        Utils::isAdmin();
        require_once 'views/usuario/crear.php';
    }

    public function crearNuevo() {
        // Validar que el formulario fue enviado por POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombre = $_POST['nombre'] ?? false;
            $apellido = $_POST['apellido'] ?? false;
            $email = $_POST['email'] ?? false;
            $password = $_POST['password'] ?? false;

            // Validación básica
            if ($nombre && $apellido && $email && $password) {

                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword(password_hash($password, PASSWORD_DEFAULT)); // Encriptar

                $existe = $usuario->existe();

                //var_dump($existe);
                //die();

                if ($existe) {
                    $_SESSION['register'] = "Intente con un correo diferente";
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                      <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al registrarse',
                            text: 'El correo ya se encuentra registrado'
                        }).then(() => {
                            window.history.back();
                        });
                      </script>";
                    exit();
                } else {
                    $save = $usuario->save();
                    if ($save) {
                        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                      <script>
                        Swal.fire({
                            icon: 'success',
                            title: '¡Grandioso!',
                            text: 'Has añadido un nuevo usuario',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href='" . BASE_URL . "usuario/gestion';
                        });
                      </script>";
                        exit();
                    } else {
                        $_SESSION['register'] = "failed";
                    }
                }
            } else {
                // var_dump('falla');
                //die();
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }

        // Redirigir al formulario de registro
        header("Location: " . BASE_URL . "usuario/registro");
    }

    public function save() {
        Utils::isAdmin();
        // Validar que el formulario fue enviado por POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombre = $_POST['nombre'] ?? false;
            $apellido = $_POST['apellido'] ?? false;
            $email = $_POST['email'] ?? false;
            $password = $_POST['password'] ?? false;
            $rol = $_POST['rol'] ?? false;

            // Validación básica
            if ($nombre && $apellido && $email && $password && $rol) {

                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setPassword(password_hash($password, PASSWORD_DEFAULT)); // Encriptar
                $usuario->setRol($rol);

                //verificamos si el usuario existe 
                $existe = $usuario->existe();

                //var_dump($existe);
                //die();

                if ($existe) {
                    $_SESSION['register'] = "Intente con un correo diferente";
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                      <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al registrarse',
                            text: 'El correo ya se encuentra registrado'
                        }).then(() => {
                            window.history.back();
                        });
                      </script>";
                    exit();
                } else {
                    $save = $usuario->save();
                    if ($save) {
                        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                      <script>
                        Swal.fire({
                            icon: 'success',
                            title: '¡Grandioso!',
                            text: 'Usuario registrado correctamente',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href='" . BASE_URL . "usuario/index';
                        });
                      </script>";
                        exit();
                    } else {
                        $_SESSION['register'] = "failed";
                    }
                }
            } else {
                // var_dump('falla');
                //die();
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }

        // Redirigir al formulario de registro
        header("Location: " . BASE_URL . "usuario/registro");
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $usuario = new Usuario();
            $usuario->setId($id);
            $usuario = $usuario->getOne();

            if ($usuario) {
                require_once 'views/usuario/editar.php';
                //var_dump($usuario);
                //die();
                //header("Location: " . BASE_URL . "usuario/edit");
            } else {
                $_SESSION['mensaje'] = "❌ Usuario no encontrado";
                $_SESSION['icono'] = "error";
                header("Location:" . BASE_URL . "usuario/gestion");
            }
        }
    }

    public function actualizar() {
        if ($_POST) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $rol = $_POST['rol'];

            $usuario = new Usuario();
            $usuario->setId($id);
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setEmail($email);
            $usuario->setRol($rol);

            $update = $usuario->update();

            if ($update) {
                $_SESSION['mensaje'] = "✅ Usuario actualizado correctamente";
                $_SESSION['icono'] = "success";
            } else {
                $_SESSION['mensaje'] = "❌ No se pudo actualizar el usuario";
                $_SESSION['icono'] = "error";
            }
            header("Location:" . BASE_URL . "usuario/gestion");
        }
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $usuario = new Usuario();
            $usuario->setId($id);

            $delete = $usuario->delete();

            if ($delete) {
                $_SESSION['mensaje'] = "✅ Usuario eliminado correctamente";
                $_SESSION['icono'] = "success";
            } else {
                $_SESSION['mensaje'] = "❌ No se pudo eliminar el usuario";
                $_SESSION['icono'] = "error";
            }
        } else {
            $_SESSION['mensaje'] = "❌ No se recibió el ID del usuario";
            $_SESSION['icono'] = "warning";
        }

        header("Location:" . BASE_URL . "usuario/gestion");
        exit();
    }

    public function login() {
        if (isset($_POST)) {
            //IDENTIFICAR AL USUARIO
            //CONSULTA A LA BASE DE DATOS 
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);


            //HACEMOS LA CONSULTA 
            //Esto no devuelve falso o si verdadero el objeto object
            $identity = $usuario->login();
            // var_dump('debuelve : ? ',$identity);
            //die();

            try {
                //CREAR UNA SESION 
                if ($identity && is_object($identity)) {
                    //identidad del usuario identificado
                    $_SESSION['identity'] = $identity;

                    if ($identity->rol == 'admin' || $identity->rol == 'jugador' || $identity->rol == 'profesor' ||
                            $identity->rol == 'responsable') {
                        if ($identity->rol == 'responsable') {
                            $_SESSION['identity']->rol = 'Señor';
                        }elseif($identity->rol =='admin'){
                            $_SESSION['identity']->rol = 'admin';
                        }
                        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                      <script>
                        Swal.fire({
                            icon: 'success',
                            title: '¡Bienvenido!',
                            text: 'Has iniciado sesión correctamente',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href='" . BASE_URL . "usuario/index';
                        });
                      </script>";
                        exit();
                    }
                } else {
                    $_SESSION['error_login'] = 'Identificación Fallida';
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                      <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error de inicio de sesión',
                            text: 'Correo o contraseña incorrectos'
                        }).then(() => {
                            window.history.back();
                        });
                      </script>";
                    exit();
                }
            } catch (PDOException $e) {
                echo "❌ Error de base de datos: " . $e->getMessage();
            }
        }
    }

    public function updatePassword() {
        if (isset($_POST['id']) && isset($_POST['actual']) && isset($_POST['nueva']) && isset($_POST['confirmar'])) {
            $id = $_POST['id'];
            $actual = $_POST['actual'];
            $nueva = $_POST['nueva'];
            $confirmar = $_POST['confirmar'];

            $usuario = new Usuario();
            $usuario->setId($id);
            $userData = $usuario->getById();

            if ($userData && password_verify($actual, $userData->password)) {
                if ($nueva === $confirmar) {
                    $usuario->setPassword(password_hash($nueva, PASSWORD_BCRYPT, ['cost' => 4]));
                    $update = $usuario->updatePassword();

                    if ($update) {
                        $_SESSION['mensaje'] = "Contraseña actualizada con éxito";
                        $_SESSION['tipo'] = "success"; // success, error, warning, info
                        header("Location:" . BASE_URL . "usuario/perfil");
                    } else {
                        $_SESSION['mensaje'] = "Error al actualizar la contraseña";
                        $_SESSION['tipo'] = "error";
                        header("Location:" . BASE_URL . "usuario/cambiarPassword");
                    }
                } else {
                    $_SESSION['msg'] = "Las contraseñas nuevas no coinciden ⚠️";
                    $_SESSION['mensaje'] = "La contraseña nuevas no coinciden";
                        $_SESSION['tipo'] = "error";
                        header("Location:" . BASE_URL . "usuario/cambiarPassword");
                }
            } else {
                $_SESSION['msg'] = "La contraseña actual no es correcta ❌";
                $_SESSION['mensaje'] = "La contraseña actual no es correcta";
                        $_SESSION['tipo'] = "error";
                        header("Location:" . BASE_URL . "usuario/cambiarPassword");
            }
        }

        
    }

    /*
      public function login() {
      if (isset($_POST)) {
      $usuario = new Usuario();
      $usuario->setEmail($_POST['email']);
      $usuario->setPassword($_POST['password']);
      $identity = $usuario->login();

      if ($identity && is_object($identity)) {
      $_SESSION['identity'] = $identity;

      switch ($identity->rol) {
      case 'admin':
      $_SESSION['admin'] = true;
      header("Location:" . BASE_URL . "admin/dashboard");
      break;
      case 'responsable':
      $_SESSION['responsable'] = true;
      header("Location:" . BASE_URL . "responsable/dashboard");
      break;
      case 'profesor':
      $_SESSION['profesor'] = true;
      header("Location:" . BASE_URL . "profesor/dashboard");
      break;
      case 'jugador':
      $_SESSION['jugador'] = true;
      header("Location:" . BASE_URL . "jugador/dashboard");
      break;
      default:
      $_SESSION['error_login'] = 'Rol desconocido';
      header("Location:" . BASE_URL);
      break;
      }
      } else {
      $_SESSION['error_login'] = 'Correo o contraseña incorrectos';
      header("Location:" . BASE_URL . "usuario/login");
      }
      }
      } */

    public function CerrarSession() {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header("Location:" . BASE_URL);
    }

}

//Fin de la clase UsuarioController