<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Configuración básica del documento -->
        <meta charset="UTF-8">
        <!-- Hace que el diseño se adapte al ancho de cualquier dispositivo -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Título del sitio -->
        <title>Fusion Brasilia</title>
        
    <!-- Ícono (favicon) que aparece en la pestaña del navegador -->
        <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/logo200.png"/>
        <!-- Librerías externas -->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/responsive.css"/>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
        <!--INICIO DE LA CABECERA-->
        <header id="header">
            <div id="logo">
                <a href="<?= BASE_URL ?>"><img src="<?= BASE_URL ?>assets/img/logo200.png"/></a>   
            </div>
            <nav id="menu">
                <ul>

                    <li><a href="<?= BASE_URL ?>usuario/index">🏠 INICIO</a></li>
                    <li><a href="#programas">CATEGORÍAS</a></li>
                    <li><a href="#entrenadores">ENTRENADORES</a></li>
                    <li><a href="#redes">CONTACTO</a></li>

                    <?php if (!isset($_SESSION['identity'])): ?>
                        <li><a href="<?= BASE_URL ?>usuario/ingreso" id="abrirModal"></i>LOGIN</a></li>
                    <?php else: ?>
                        <li><a href="<?= BASE_URL ?>usuario/CerrarSession">LOGOUT</a></li>
                    <?php endif;     ?>

                </ul>
            </nav>
            <span id="menuToggle">☰</span>
        </header>
            <script>
        // Script para mostrar/ocultar el menú en móviles
        document.getElementById("menuToggle").addEventListener("click", function() {
            const menu = document.querySelector("nav#menu ul");
            menu.classList.toggle("active");
        });
    </script>
        
        <div id="content">
            

