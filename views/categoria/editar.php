<div class="main-content">
<h2>Editar Categoría</h2>
<form action="<?= BASE_URL ?>categoria/update" method="POST">
    <input type="hidden" name="id" value="<?= $categoria->id ?>">
    <input type="text" name="nombre" value="<?= $categoria->nombre ?>" required>
    <textarea name="descripcion"><?= $categoria->descripcion ?></textarea>
    <button type="submit">Actualizar</button>
</form>
</div>