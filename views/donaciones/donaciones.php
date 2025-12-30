<!--Formulario de donaciones -->

<h2>Apoya un Sueño</h2>
<form class="formulario" action="donacion_paypal.php" method="POST">
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

<form action="https://www.paypal.com/donate" method="post" target="_blank">
  <input type="hidden" name="business" value="TU_CORREO_PAYPAL@correo.com">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="item_name" value="Donación Academia Fusión Quebrada Grande">
  
  <button type="submit" style="
    background:#ffc439;
    color:#111;
    padding:12px 20px;
    border:none;
    border-radius:10px;
    font-size:16px;
    cursor:pointer;
    width:100%;">
    Donar con PayPal
  </button>
</form>

<div style="background:#f0fdf4;padding:20px;border-radius:12px;margin-top:20px;">
  <h3>Donar por SINPE Móvil</h3>
  <p><strong>Número:</strong> 72937566</p>
  <p><strong>Nombre:</strong> Academia Fusión Quebrada Grande</p>
  <p><strong>Banco:</strong> Banco Nacional</p>
  <p>Después de realizar el SINPE, envíanos el comprobante.</p>
</div>

<label>Comprobante SINPE (opcional)</label>
<input type="text" name="comprobante" placeholder="Número de referencia">
