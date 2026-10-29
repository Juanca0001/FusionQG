 
<!-- HERO -->

<?php if(!isset($_SESSION['identity'])): ?>
    <div id="hero-content">
        <img src="<?= BASE_URL ?>assets/img/portadaFQG.jpg" class="fondo"/>
        <h1>Crescamos juntos dentro y fuera de la cancha</h1>
        <p>Fusion Quebrada Grande Donde se entrena con pasión y se juega con el corazón.</p>
        <a href="<?= BASE_URL ?>usuario/registro" id="abrirModal" class="btn">Regístrate Ahora</a>
    </div>
<?php else: ?>
    <div id="hero-content" class="ajustado">
        <img src="<?= BASE_URL ?>assets/img/portada.jpg" class="fondo"/>
        <h1>Preparando Futbolistas para el Éxito</h1>
        <p>Entrena con los mejores profesionales y alcanza tu máximo potencial.</p>
    </div>
<?php endif; ?>


<!-- Sobre nosotros -->
<section id="sobre-nosotros">
    <h2>Academia De Fútbol Fusión Quebrada Grande</h2>
    <p>
Acerca de Nosotros – Academia de Fútbol Fusión Quebrada Grande 

En la Academia de Fútbol Fusión Quebrada Grande creemos que el fútbol es mucho más que un deporte: es una herramienta de transformación social, disciplina y crecimiento personal. Nacimos con la visión de ofrecer a niños y jóvenes de nuestra comunidad un espacio seguro, formativo y motivador donde puedan desarrollar su talento, fortalecer sus valores y construir un futuro lleno de oportunidades.
<br>
<br>
Nuestro proyecto combina entrenamiento de calidad, formación humana y acompañamiento constante, buscando siempre el equilibrio entre la técnica, la táctica y el carácter. Formamos jugadores con pasión, respeto, compromiso y mentalidad ganadora, siempre priorizando la educación, la salud emocional y el bienestar de cada estudiante.

A través de un trabajo estructurado, entrenadores capacitados y una metodología moderna, impulsamos a nuestros jugadores a superar sus límites, a trabajar en equipo y a creer en sus sueños dentro y fuera de la cancha. Además, como academia buscamos generar impacto en la comunidad, abriendo puertas a oportunidades deportivas, sociales y educativas.
<br>
<br>
Fusión somos todos: jugadores, familias, entrenadores, colaboradores y quienes creen en este proyecto. Crecemos juntos y avanzamos juntos, construyendo un movimiento que inspira y transforma.

Nuestra misión es formar personas íntegras y deportistas preparados para enfrentar la vida y triunfar en ella.
    </p>
</section>

<!-- Valores -->
<section id="valores">
    <h2>Nuestros Valores</h2>
    <div class="cards">
        <div class="card">⚡ Disciplina
            <img class="cardsImg" src="<?= BASE_URL ?>assets/img/Disciplina.png" />
        </div>
        
        <div class="card">🤝 Trabajo en Equipo
            <img class="cardsImg" src="<?= BASE_URL ?>assets/img/grupo.png" />
        </div>
        <div class="card">🚀 Desarrollo Personal
        <img class="cardsImg" src="<?= BASE_URL ?>assets/img/progreso.png" />
        </div>
    </div>
</section>

<!-- Programas o Categorías -->
<section id="programas">
    <h2>Programas / Categorías</h2>
    <div class="cards">
        <div class="card">
            <h3>Novena</h3>
            <p>Entrenamientos básicos, introducción a la técnica y diversión.</p>
            <p><strong>Horario:</strong> Lunes y Miércoles 4:00 pm - 5:30 pm</p>
        </div>
        <div class="card">
            <h3>Octava</h3>
            <p>Desarrollo técnico-táctico, trabajo en equipo y disciplina.</p>
            <p><strong>Horario:</strong> Martes y Jueves 5:00 pm - 6:30 pm</p>
        </div>
        <div class="card">
            <h3>Séptima</h3>
            <p>Preparación avanzada, rendimiento físico y competencias.</p>
            <p><strong>Horario:</strong> Viernes 6:00 pm - 8:00 pm</p>
        </div>
    </div>
</section>

<!-- Entrenadores -->
<section id="entrenadores">
    <h2>Nuestros Entrenadores</h2>
    <div class="cards">
        <div class="card">
            <img src="entrenador1.jpg" alt="Entrenador 1">
            <h3>Entrenador: Johanny Rodriguez</h3>
            <p>Ex-jugador profesional con 10 años de experiencia formando jóvenes talentos.</p>
        </div>
        <div class="card">
            <img src="entrenador2.jpg" alt="Entrenador 2">
            <h3>Entrenador: Juan Carlos García</h3>
            <p>Especialista en preparación física y desarrollo técnico de categorías menores.</p>
        </div>
    </div>
</section>

<!-- Testimonios y logros -->
<section id="testimonios">
    <h2>Testimonios y Logros</h2>
    <div class="cards">
        <div class="card">
            <p>"Mi hijo ha mejorado mucho, no solo en el deporte, también en su disciplina y confianza." – Padre de jugador Sub-15</p>
        </div>
        <div class="card">
            <p>"Gracias a la academia logré ser parte de la selección juvenil de mi provincia." – Jugador Sub-20</p>
        </div>
        <div class="card">
            <img src="torneo.jpg" alt="Torneo ganado">
            <p><strong>🏆 Campeones del Torneo Regional Sub-15 – 2023</strong></p>
        </div>
    </div>
</section>
<!-- Donaciones -->
<section id="testimonios">
    <h2>Apoya un Sueño, Cambia una Vida</h2>
    <div class="">
        <div class="card">
            <p>En la Academia de Fútbol Fusión Quebrada Grande creemos firmemente que el talento no debe tener límites económicos. En nuestra comunidad existen niños y jóvenes con grandes sueños y habilidades, pero que muchas veces no cuentan con los recursos necesarios para cubrir los costos de entrenamiento, uniformes, transporte o participación en competencias.
                <br>
                <br>
Por esta razón, hemos creado un programa de apoyo y becas deportivas, destinado a brindar oportunidades reales a chicos de bajos recursos que desean formarse en el fútbol y crecer como personas. Cada donación, patrocinio o colaboración se transforma directamente en entrenamientos, equipamiento, acompañamiento y esperanza para quienes más lo necesitan.
<br>
                <br>
Tu aporte no solo impulsa el desarrollo deportivo, sino que también fortalece valores como la disciplina, el respeto, el trabajo en equipo y la superación personal. Al apoyar este proyecto, te conviertes en parte activa de una iniciativa que impacta positivamente a familias, comunidades y futuros líderes.
<br>
                <br>
¿Cómo puedes ayudar?
<br>
                <br>
Donaciones económicas
<br>
                <br>
Patrocinios empresariales
<br>
                <br>
Aporte de implementos deportivos
<br>
                <br>
Apoyo a programas de becas
<br>
                <br>
Juntos podemos abrir puertas, crear oportunidades y cambiar historias.
<br>
                <br>
Gracias por creer en el poder del deporte como motor de transformación social.</p>
            <br>
              <br>
            <a href="<?= BASE_URL ?>cliente/donaciones" id="abrirModal" class="btn">Quiero Apoyar</a>
        </div>
    </div>
</section>



