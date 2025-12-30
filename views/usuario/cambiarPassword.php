<?php if (isset($_SESSION['identity'])): ?>
<div class="perfil-container">
    <h2>🔑 Cambiar Contraseña</h2>

    <form action="<?= BASE_URL ?>usuario/updatePassword" method="POST" class="form-password">
        <input type="hidden" name="id" value="<?= $_SESSION['identity']->id ?>">

        <label for="actual">Contraseña actual</label>
        <input type="password" name="actual" required>

        <label for="nueva">Nueva contraseña</label>
        <input type="password" name="nueva" required>

        <label for="confirmar">Confirmar nueva contraseña</label>
        <input type="password" name="confirmar" required>

        <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
    </form>
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
    

