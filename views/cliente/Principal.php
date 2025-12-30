<div class="dashboard">
  <aside class="sidebar">
    <h2>⚽ Academia</h2>
    <ul>
      <li><a href="<?=BASE_URL?>cliente/dashboard">🏠 Inicio</a></li>
      <li><a href="<?=BASE_URL?>cliente/perfil">👤 Mi Perfil</a></li>
      <li><a href="<?=BASE_URL?>categoria/listar">📅 Categorías</a></li>
      <li><a href="<?=BASE_URL?>cliente/noticias">📰 Noticias</a></li>
      <li><a href="<?=BASE_URL?>cliente/calendario">📆 Calendario</a></li>
      <li><a href="<?=BASE_URL?>usuario/logout">🚪 Cerrar sesión</a></li>
    </ul>
  </aside>

  <main class="main-content">
    <h1>Bienvenido, <?= $_SESSION['identity']->nombre ?> 👋</h1>
    <p>Tu categoría actual: Sub-15</p>

    <section class="cards">
      <div class="card">
        <h3>📅 Próximo Entrenamiento</h3>
        <p>Martes 6pm en la cancha #2</p>
      </div>
      <div class="card">
        <h3>🏆 Torneo cercano</h3>
        <p>Copa Guanacaste - 15/09</p>
      </div>
      <div class="card">
        <h3>📢 Avisos</h3>
        <p>No habrá entrenamiento el jueves por mantenimiento.</p>
      </div>
    </section>
  </main>
</div>