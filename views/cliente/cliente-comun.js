/* ===== Estado compartido del área de cliente (sin backend, usa localStorage) ===== */

const DAHLIA_KEYS = {
    PERFIL: 'dahlia_perfil_cliente',
    RESERVAS: 'dahlia_reservas',
    SESION: 'dahlia_sesion'
};

const DAHLIA_PERFIL_DEFECTO = {
    nombre: 'Valentina Ríos',
    correo: 'valentina.rios@correo.com',
    rol: 'Cliente'
};

const DAHLIA_SERVICIOS = [
    { id: 'facial-profunda', categoria: 'Faciales', nombre: 'Limpieza Facial Profunda', duracion: 60, precio: 45, icono: '✨' },
    { id: 'hidratacion-colageno', categoria: 'Faciales', nombre: 'Hidratación con Colágeno', duracion: 45, precio: 35, icono: '💧' },
    { id: 'masaje-corporal', categoria: 'Corporales', nombre: 'Masaje Relajante Corporal', duracion: 60, precio: 50, icono: '💆' },
    { id: 'exfoliacion-corporal', categoria: 'Corporales', nombre: 'Exfoliación Corporal', duracion: 45, precio: 40, icono: '🧖' }
];

function dahliaReservasPorDefecto() {
    return [
        {
            id: 'res-demo-1',
            servicioId: 'facial-profunda',
            servicioNombre: 'Limpieza Facial Profunda',
            duracion: 60,
            precio: 45,
            fecha: '2026-08-12',
            fechaTexto: '12 ago 2026',
            hora: '10:00',
            horaFin: '10:30',
            estado: 'Pendiente'
        },
        {
            id: 'res-demo-2',
            servicioId: 'facial-profunda',
            servicioNombre: 'Limpieza Facial Profunda',
            duracion: 60,
            precio: 45,
            fecha: '2026-08-12',
            fechaTexto: '12 ago 2026',
            hora: '10:00',
            horaFin: '11:00',
            estado: 'Pendiente'
        },
        {
            id: 'res-demo-3',
            servicioId: 'masaje-corporal',
            servicioNombre: 'Masaje Relajante Corporal',
            duracion: 60,
            precio: 50,
            fecha: '2026-07-28',
            fechaTexto: '28 jul 2026',
            hora: '16:00',
            horaFin: '17:00',
            estado: 'Confirmada'
        }
    ];
}

function dahliaInicializarAlmacenamiento() {
    try {
        if (!localStorage.getItem(DAHLIA_KEYS.PERFIL)) {
            localStorage.setItem(DAHLIA_KEYS.PERFIL, JSON.stringify(DAHLIA_PERFIL_DEFECTO));
        }
        if (!localStorage.getItem(DAHLIA_KEYS.RESERVAS)) {
            localStorage.setItem(DAHLIA_KEYS.RESERVAS, JSON.stringify(dahliaReservasPorDefecto()));
        }
    } catch (e) {
        console.warn('No se pudo inicializar el almacenamiento local', e);
    }
}

function dahliaObtenerPerfil() {
    try {
        return JSON.parse(localStorage.getItem(DAHLIA_KEYS.PERFIL)) || DAHLIA_PERFIL_DEFECTO;
    } catch (e) {
        return DAHLIA_PERFIL_DEFECTO;
    }
}

function dahliaGuardarPerfil(perfil) {
    localStorage.setItem(DAHLIA_KEYS.PERFIL, JSON.stringify(perfil));
}

function dahliaObtenerReservas() {
    try {
        return JSON.parse(localStorage.getItem(DAHLIA_KEYS.RESERVAS)) || [];
    } catch (e) {
        return [];
    }
}

function dahliaGuardarReservas(reservas) {
    localStorage.setItem(DAHLIA_KEYS.RESERVAS, JSON.stringify(reservas));
}

function dahliaIniciarSesion(perfilParcial) {
    const actual = dahliaObtenerPerfil();
    const nuevo = Object.assign({}, actual, perfilParcial);
    dahliaGuardarPerfil(nuevo);
    localStorage.setItem(DAHLIA_KEYS.SESION, '1');
}

function dahliaFormatearFechaLarga(fechaISO) {
    const meses = ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'];
    const [anio, mes, dia] = fechaISO.split('-').map(Number);
    return `${dia} ${meses[mes - 1]} ${anio}`;
}

/* Cabecera compartida: saludo + cerrar sesión + resaltado de navegación activa */
function dahliaRenderizarCabecera(paginaActiva) {
    const perfil = dahliaObtenerPerfil();
    const saludo = document.getElementById('saludo-cliente');
    if (saludo) {
        saludo.textContent = `Hola, ${perfil.nombre}`;
    }

    const botonSalir = document.getElementById('btn-cerrar-sesion');
    if (botonSalir) {
        botonSalir.addEventListener('click', function () {
            localStorage.removeItem(DAHLIA_KEYS.SESION);
            window.location.href = '/auth/login.html';
        });
    }

    document.querySelectorAll('[data-nav]').forEach(function (enlace) {
        if (enlace.getAttribute('data-nav') === paginaActiva) {
            enlace.classList.add('active');
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    dahliaInicializarAlmacenamiento();
});
