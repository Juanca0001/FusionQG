<!--Formulario de donaciones -->
<br>
<h2>Apoya un Sueño</h2>
<form class="formulario" action="<?= BASE_URL ?>donaciones/Index" method="POST">
<label>Nombre completo</label>
<input type="text" name="nombre" required>


<label>Correo electrónico</label>
<input type="email" name="correo" required>


<label>Tipo de apoyo</label>
<select name="tipo_apoyo" required>
<option value="Donación económica">Donación económica</option>
<option value="Patrocinio">Patrocinio</option>
<option value="Implementos deportivos">Implementos deportivos</option>
</select>


<label>Monto </label>
<input type="number" name="monto" step="0.01">


<label>Mensaje (opcional)</label>
<textarea name="mensaje" rows="4"></textarea>


<button type="submit">Continuar</button>
</form>
