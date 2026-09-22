document.addEventListener('DOMContentLoaded', function () {
    dahliaInicializarAlmacenamiento();
    dahliaRenderizarCabecera('perfil');

    const perfil = dahliaObtenerPerfil();
    document.getElementById('campo-nombre').value = perfil.nombre;
    document.getElementById('campo-correo').value = perfil.correo;
    document.getElementById('campo-rol').value = perfil.rol;

    document.getElementById('form-perfil').addEventListener('submit', function (evento) {
        evento.preventDefault();

        const nuevoPerfil = {
            nombre: document.getElementById('campo-nombre').value.trim(),
            correo: document.getElementById('campo-correo').value.trim(),
            rol: perfil.rol
        };

        dahliaGuardarPerfil(nuevoPerfil);
        document.getElementById('saludo-cliente').textContent = `Hola, ${nuevoPerfil.nombre}`;

        const mensaje = document.getElementById('mensaje-guardado');
        mensaje.classList.remove('oculto');
        setTimeout(function () { mensaje.classList.add('oculto'); }, 2500);
    });
});
