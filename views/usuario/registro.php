<div id="overlay" class="overlay">
    <div class="modal">
        <span id="cerrarModal" class="cerrar">&times;</span>
        <h2>Formulario de Registro</h2>
        <br>
        <form  action="<?= BASE_URL ?>usuario/save" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required><br>
            <input type="text" name="apellido" placeholder="Apellido" required><br>
            <input type="email" name="email" placeholder="Correo" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <label for="rol">Selecione el Rol:</label>
            <select name="rol" required>
                <option value="profesor">Profesor</option>
                <option value="jugador">Jugador</option>
                <option value="responsable">Responsable</option>
                <option value="otro">Otro</option>
            </select>
            <input type="image" name="imagen" placeholder="Foto" ><br>
            <button type="submit">Registrar</button>
        </form>
        <br>
        <p>¿Ya tienes cuenta? <a href="<?= BASE_URL ?>usuario/ingreso">Inicia sesión</a></p>
    </div>
</div>
