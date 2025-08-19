let mostrarOcultarNav = document.getElementById('mostrarOcultarNav');
let nav = document.getElementById('nav');
let enlaces = nav.querySelectorAll('a');  // Selecciona todos los enlaces dentro de la barra de navegación

let vanNav = true;

// Función para mostrar/ocultar la barra de navegación
function toggleNav() {
    if (vanNav) {
        nav.classList.remove('ocultarSeccionNav');
        vanNav = false;
    } else {
        nav.classList.add('ocultarSeccionNav');
        vanNav = true;
    }
}

// Agregar evento de clic al icono del menú
mostrarOcultarNav.addEventListener('click', toggleNav);

// Agregar evento de clic a cada enlace de navegación
enlaces.forEach(function (enlace) {
    enlace.addEventListener('click', function () {
        if (!vanNav) {  // Si la navegación está desplegada
            nav.classList.add('ocultarSeccionNav');  // Oculta la barra de navegación
            vanNav = true;
        }
    });
});
