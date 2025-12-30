<?php if (isset($_SESSION['identity'])): ?>
    <div class="main-content ">
        <button class="btn btn-secondary btn_editar_cancelar" onclick="window.history.back()">⬅ Atrás</button>
        <div class="centrar">

            <h2>👤 Mi Perfil</h2>

            <div class="perfil-card">
                <div class="perfil-info">
                    <p><strong>Nombre:</strong> <?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellido ?></p>
                    <p><strong>Email:</strong> <?= $_SESSION['identity']->email ?></p>
                </div>

                <div class="perfil-actions">
                    <a href="<?= BASE_URL ?>usuario/editar&id=<?= $_SESSION['identity']->id ?>" class="btn btn-primary">✏️ Editar Perfil</a>
                    <a href="<?= BASE_URL ?>usuario/cambiarPassword" class="btn btn-warning">Cambiar Contraseña</a>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <p>No tienes acceso a esta sección. <a href="<?= BASE_URL ?>usuario/login">Inicia sesión</a></p>
<?php endif; ?>
<?php if (isset($_SESSION['mensaje'])): ?>
    <script>
        Swal.fire({
            icon: '<?= $_SESSION['tipo'] ?>',
            title: '<?= $_SESSION['mensaje'] ?>',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    <?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['tipo']);
endif;
?>