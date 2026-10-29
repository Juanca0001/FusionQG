<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Academia de Fútbol FQG</title>
        <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>assets/img/logoQG.png">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/responsive.css"/>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
        <!--INICIO DE LA CABECERA-->
        <header id="header">
            <div id="logo">
                <a href="<?= BASE_URL ?>"><img src="<?= BASE_URL ?>assets/img/logoQG.png"/></a>   
            </div>
            <nav id="menu">
                <ul>

                    <li><a href="<?= BASE_URL ?>usuario/index">INICIO</a></li>
                    <li><a href="#programas">CATEGORÍAS</a></li>
                    <li><a href="#entrenadores">ENTRENADORES</a></li>
                    <li><a href="#redes">CONTACTO</a></li>

                    <?php if (!isset($_SESSION['identity'])): ?>
                        <li><a href="<?= BASE_URL ?>usuario/ingreso" id="abrirModal"></i>INGRESAR</a></li>
                    <?php else: ?>
                        <li><a href="<?= BASE_URL ?>usuario/CerrarSession">LOGOUT</a></li>
                    <?php endif;     ?>

                </ul>
            </nav>
            <span id="menuToggle">☰</span>
        </header>
        
        <div id="content">
            

