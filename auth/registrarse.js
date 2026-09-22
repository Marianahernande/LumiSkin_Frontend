document.addEventListener('DOMContentLoaded', function () {
    dahliaInicializarAlmacenamiento();

    const formulario = document.querySelector('#contenedor_login form');
    if (!formulario) return;

    formulario.addEventListener('submit', function (evento) {
        evento.preventDefault();

        const nombre = document.getElementById('nombre').value.trim() || 'Cliente';
        const correo = document.getElementById('correo').value.trim();

        dahliaIniciarSesion({ nombre: nombre, correo: correo, rol: 'Cliente' });
        window.location.href = '/cliente/reservarCita.html';
    });
});
