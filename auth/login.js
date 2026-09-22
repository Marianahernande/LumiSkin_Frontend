document.addEventListener('DOMContentLoaded', function () {
    dahliaInicializarAlmacenamiento();

    const formulario = document.querySelector('#contenedor_login form');
    if (!formulario) return;

    formulario.addEventListener('submit', function (evento) {
        evento.preventDefault();

        const correo = document.getElementById('correo').value.trim();
        const perfilActual = dahliaObtenerPerfil();
        const nombre = perfilActual && perfilActual.correo === correo
            ? perfilActual.nombre
            : nombreDesdeCorreo(correo);

        dahliaIniciarSesion({ nombre: nombre, correo: correo, rol: 'Cliente' });
        window.location.href = '/cliente/reservarCita.html';
    });
});

function nombreDesdeCorreo(correo) {
    const usuario = (correo.split('@')[0] || 'Cliente').replace(/[._-]+/g, ' ');
    return usuario.replace(/\b\w/g, function (letra) { return letra.toUpperCase(); }) || 'Cliente';
}
