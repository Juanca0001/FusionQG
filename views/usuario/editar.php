<div class="main-content">
    <a href="<?= BASE_URL ?>usuario/gestion" class="btn btn-secondary btn_editar_cancelar">↩ Cancelar</a>
    <br>
    <h2>✏️ Editar Usuario</h2>
    <form action="<?= BASE_URL ?>usuario/actualizar" method="POST" class="formulario form_editar">
        <input type="hidden" name="id" value="<?= $usuario->id ?>">
        
        <input type="text" name="nombre" value="<?= $usuario->nombre ?>" required>
        <input type="text" name="apellido" value="<?= $usuario->apellido ?>" required>
        <input type="email" name="email" value="<?= $usuario->email ?>" required>

        <label for="rol">Rol:</label>
        <select name="rol" required>
            <option value="admin" <?= $usuario->rol == 'admin' ? 'selected' : '' ?>>Administrador</option>
            <option value="profesor" <?= $usuario->rol == 'profesor' ? 'selected' : '' ?>>Profesor</option>
            <option value="jugador" <?= $usuario->rol == 'jugador' ? 'selected' : '' ?>>Jugador</option>
            <option value="responsable" <?= $usuario->rol == 'responsable' ? 'selected' : '' ?>>Responsable</option>
            <option value="responsable" <?= $usuario->rol == 'otro' ? 'selected' : '' ?>>Otro</option>
        </select>

        <button type="submit" class="btn btn-primary btn_editar">💾 Guardar Cambios</button>
        
    </form>
</div>
