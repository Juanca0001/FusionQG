<div class="main-content">
    <h2>👥 Gestión de Usuarios</h2>
    <div class="centrar">  
        <a href="<?= BASE_URL ?>usuario/crear" class="btn btn-primary">➕ Crear Usuario</a>

        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($usuarios) && !empty($usuarios)): ?>
                    <?php while ($user = $usuarios->fetch_object()): ?>
                        <tr>
                            <td><?= $user->id ?></td>
                            <td><?= $user->nombre ?></td>
                            <td><?= $user->apellido ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= ucfirst($user->rol) ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>usuario/editar&id=<?= $user->id ?>" >✏️ Editar</a>
                                <a href="<?= BASE_URL ?>usuario/eliminar&id=<?= $user->id ?>" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">🗑 Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay usuarios registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
            <?php if (isset($_SESSION['mensaje'])): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: '<?= $_SESSION['icono'] ?>',
                title: 'Gestión de Usuarios',
                text: '<?= $_SESSION['mensaje'] ?>',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
        <?php
        unset($_SESSION['mensaje']);
        unset($_SESSION['icono']);
        ?>
    <?php endif; ?>
    </div>
    <br>
</div>
