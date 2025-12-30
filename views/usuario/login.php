
<div id="overlay" class="overlay">
    <div class="modal_login">
        <span id="cerrarModal" class="cerrar">&times;</span>
        <h2>Inciar Sesion </h2>
        <br>
        <form  action="<?= BASE_URL ?>usuario/login" method="POST">
            <input type="email" name="email" placeholder="Correo" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <button type="submit">Ingresar</button>
        </form>
        <br>
        <p>¿Aún no te registras? <a href="<?= BASE_URL ?>usuario/registro">Registrarse</a></p>
    </div>
</div>