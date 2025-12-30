<div class="main-content">
    
    <h2>Gestión de Categorías</h2>
    <div class="centrar"> 
    <a href="<?= BASE_URL ?>categoria/crear" class="btn btn-primary">➕ Nueva Categoría</a>

    <table class="tabla" border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php while ($cat = $categorias->fetch_object()): ?>
            <tr>
                <td><?= $cat->id ?></td>
                <td><?= $cat->nombre ?></td>
                <td><?= $cat->descripcion ?></td>
                <td>
                    <a href="<?= BASE_URL ?>categoria/editar&id=<?= $cat->id ?>">✏️ Editar</a>
                    <a href="<?= BASE_URL ?>categoria/eliminar&id=<?= $cat->id ?>" onclick="return confirm('¿Eliminar categoría?')">🗑 Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    
    </div> 

</div>