<div class="main-content">
    <a href="<?= BASE_URL ?>usuario/gestion" class="btn btn-secondary btn_editar_cancelar">↩ Cancelar</a>
    <h2>➕ Crear Usuario</h2>
    <form action="<?= BASE_URL ?>usuario/crearNuevo" method="POST" class="formulario">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        
        <label for="rol">Selecione el Rol:</label>
        <select name="rol" required>
            <option value="admin">Administrador</option>
            <option value="profesor">Profesor</option>
            <option value="jugador">Jugador</option>
            <option value="responsable">Responsable</option>
            <option value="responsable">Otro</option>
        </select>

        <button type="submit" class="btn btn_crear_usuario">Guardar</button>
    </form>
</div>
