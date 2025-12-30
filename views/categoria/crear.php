<div class="main-content">
<h2>Crear Categoría</h2>
<form action="<?= BASE_URL ?>categoria/save" method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <button type="submit">Guardar</button>
</form>

</div>