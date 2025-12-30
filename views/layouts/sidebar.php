
<?php if (isset($_SESSION['identity'])): ?>

    <aside class="sidebar">
        <div    class="block_side">
            <div class="sidebar-header">
                <h3>⚽ Academia Fútbol</h3>
                <br>
                <p>Bienvenido: <?= $_SESSION['identity']->rol ?></p>                
                <p><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellido ?></p>
            </div>

            <ul>

                <?php if ($_SESSION['identity']->rol == 'admin'): ?>
                    <li><a href="<?= BASE_URL ?>usuario/gestion">👥 Gestionar Usuarios</a></li>
                    <li><a href="<?= BASE_URL ?>categoria/gestion">📂 Gestionar Categorías</a></li>
                    <li><a href="<?= BASE_URL ?>noticia/gestion">📰 Gestionar Noticias</a></li>
                    <li><a href="<?= BASE_URL ?>torneos/gestion">🏆 Gestionar Torneos</a></li>
                <?php endif; ?>

                <li><a href="<?= BASE_URL ?>usuario/perfil">⚙️ Mi Perfil</a></li>
                <li><a href="<?= BASE_URL ?>usuario/CerrarSession">🚪 Cerrar sesión</a></li>
            </ul>

        </div>

    </aside>
<?php endif; ?>