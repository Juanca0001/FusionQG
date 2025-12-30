// ----- MENU RESPONSIVE -----
const menuToggle = document.getElementById("menuToggle");
const menu = document.getElementById("menu");

if (menuToggle) {
  menuToggle.addEventListener("click", () => {
    menu.classList.toggle("show");
  });
}

// ----- MODAL -----
const abrir = document.getElementById('abrirModal');
const overlay = document.getElementById('overlay');
const cerrar = document.getElementById('cerrarModal');

if (abrir && overlay && cerrar) {
  abrir.addEventListener('click', (e) => {
    e.preventDefault();
    overlay.style.display = 'flex';
    menu.classList.remove("show"); // cerrar menú en móvil
  });

  cerrar.addEventListener('click', () => {
    overlay.style.display = 'none';
  });

  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) {
      overlay.style.display = 'none';
    }
  });
}