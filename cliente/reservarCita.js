const NOMBRES_DIA = ['DOM', 'LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'];
const HORAS_BASE = ['09:00', '09:45', '10:30', '11:15', '12:00', '12:45', '13:30', '14:15'];

const estadoReserva = {
    servicio: null,
    fechaISO: null,
    fechaTexto: null,
    hora: null,
    horaFin: null,
    reprogramarId: null
};

document.addEventListener('DOMContentLoaded', function () {
    dahliaInicializarAlmacenamiento();
    dahliaRenderizarCabecera('reservar');

    renderizarServicios();
    renderizarTiraDias();

    document.getElementById('btn-a-fecha').addEventListener('click', function () {
        if (!estadoReserva.servicio) return;
        actualizarSubtituloFecha();
        irAPaso(2);
    });

    document.getElementById('btn-fecha-atras').addEventListener('click', function () {
        if (estadoReserva.reprogramarId) {
            window.location.href = '/cliente/misReservas.html';
        } else {
            irAPaso(1);
        }
    });

    document.getElementById('btn-a-confirmar').addEventListener('click', function () {
        if (!estadoReserva.fechaISO || !estadoReserva.hora) return;
        prepararResumen();
        irAPaso(3);
    });

    document.getElementById('btn-confirmar-atras').addEventListener('click', function () {
        irAPaso(2);
    });

    document.getElementById('btn-confirmar-reserva').addEventListener('click', confirmarReserva);

    document.getElementById('btn-reservar-otra').addEventListener('click', function () {
        reiniciarAsistente();
    });

    const idReprogramar = new URLSearchParams(window.location.search).get('reprogramar');
    if (idReprogramar) {
        iniciarReprogramacion(idReprogramar);
    }
});

function renderizarServicios() {
    const contenedor = document.getElementById('lista-servicios');
    const categorias = [...new Set(DAHLIA_SERVICIOS.map(function (s) { return s.categoria; }))];

    contenedor.innerHTML = categorias.map(function (categoria) {
        const tarjetas = DAHLIA_SERVICIOS.filter(function (s) { return s.categoria === categoria; })
            .map(function (s) {
                return `
                <div class="tarjeta-servicio-op" data-id="${s.id}">
                    <div class="info-servicio-op">
                        <h4>${s.nombre}</h4>
                        <p>${s.duracion} min &middot; S/ ${s.precio}</p>
                    </div>
                    <div class="radio-servicio"></div>
                </div>`;
            }).join('');

        return `
            <div class="categoria-servicios">
                <p class="titulo-categoria">${categoria}</p>
                <div class="grid-servicios-reserva">${tarjetas}</div>
            </div>`;
    }).join('');

    contenedor.querySelectorAll('.tarjeta-servicio-op').forEach(function (tarjeta) {
        tarjeta.addEventListener('click', function () {
            const id = tarjeta.getAttribute('data-id');
            seleccionarServicio(id);
        });
    });
}

function seleccionarServicio(id) {
    estadoReserva.servicio = DAHLIA_SERVICIOS.find(function (s) { return s.id === id; });

    document.querySelectorAll('.tarjeta-servicio-op').forEach(function (tarjeta) {
        tarjeta.classList.toggle('seleccionada', tarjeta.getAttribute('data-id') === id);
    });

    document.getElementById('btn-a-fecha').disabled = false;
}

function renderizarTiraDias() {
    const contenedor = document.getElementById('tira-dias');
    const hoy = new Date();
    contenedor.innerHTML = '';

    for (let i = 0; i < 7; i++) {
        const fecha = new Date(hoy);
        fecha.setDate(hoy.getDate() + i);
        const iso = fecha.toISOString().slice(0, 10);

        const boton = document.createElement('div');
        boton.className = 'dia-opcion';
        boton.setAttribute('data-fecha', iso);
        boton.innerHTML = `
            <span class="nombre-dia">${NOMBRES_DIA[fecha.getDay()]}</span>
            <span class="numero-dia">${fecha.getDate()}</span>`;

        boton.addEventListener('click', function () {
            seleccionarDia(iso);
        });

        contenedor.appendChild(boton);
    }
}

function seleccionarDia(iso) {
    estadoReserva.fechaISO = iso;
    estadoReserva.fechaTexto = dahliaFormatearFechaLarga(iso);
    estadoReserva.hora = null;
    estadoReserva.horaFin = null;

    document.querySelectorAll('.dia-opcion').forEach(function (dia) {
        dia.classList.toggle('seleccionado', dia.getAttribute('data-fecha') === iso);
    });

    renderizarHoras(iso);
    document.getElementById('btn-a-confirmar').disabled = true;
}

function estaBloqueada(fechaISO, hora) {
    const texto = fechaISO + hora;
    let hash = 0;
    for (let i = 0; i < texto.length; i++) {
        hash = (hash * 31 + texto.charCodeAt(i)) % 97;
    }
    return hash % 4 === 0;
}

function renderizarHoras(fechaISO) {
    const contenedor = document.getElementById('rejilla-horas');
    contenedor.innerHTML = '';

    HORAS_BASE.forEach(function (hora) {
        const bloqueada = estaBloqueada(fechaISO, hora);
        const boton = document.createElement('div');
        boton.className = 'hora-opcion' + (bloqueada ? ' bloqueada' : '');
        boton.textContent = hora;

        if (!bloqueada) {
            boton.addEventListener('click', function () {
                seleccionarHora(hora);
            });
        }

        contenedor.appendChild(boton);
    });
}

function seleccionarHora(hora) {
    estadoReserva.hora = hora;
    estadoReserva.horaFin = sumarMinutos(hora, estadoReserva.servicio.duracion);

    document.querySelectorAll('.hora-opcion:not(.bloqueada)').forEach(function (boton) {
        boton.classList.toggle('seleccionada', boton.textContent === hora);
    });

    document.getElementById('btn-a-confirmar').disabled = false;
}

function sumarMinutos(hora, minutos) {
    const [h, m] = hora.split(':').map(Number);
    const total = h * 60 + m + minutos;
    const hh = Math.floor(total / 60) % 24;
    const mm = total % 60;
    return String(hh).padStart(2, '0') + ':' + String(mm).padStart(2, '0');
}

function actualizarSubtituloFecha() {
    const s = estadoReserva.servicio;
    document.getElementById('resumen-servicio-fecha').textContent = `${s.nombre} · ${s.duracion} min`;
}

function prepararResumen() {
    const s = estadoReserva.servicio;
    document.getElementById('resumen-servicio').textContent = s.nombre;
    document.getElementById('resumen-fecha').textContent = estadoReserva.fechaTexto;
    document.getElementById('resumen-hora').textContent = `${estadoReserva.hora} - ${estadoReserva.horaFin}`;
    document.getElementById('resumen-duracion').textContent = `${s.duracion} min`;
    document.getElementById('resumen-total').textContent = `S/ ${s.precio}`;
}

function confirmarReserva() {
    const s = estadoReserva.servicio;
    const reservas = dahliaObtenerReservas();

    if (estadoReserva.reprogramarId) {
        const indice = reservas.findIndex(function (r) { return r.id === estadoReserva.reprogramarId; });
        if (indice !== -1) {
            reservas[indice] = Object.assign({}, reservas[indice], {
                fecha: estadoReserva.fechaISO,
                fechaTexto: estadoReserva.fechaTexto,
                hora: estadoReserva.hora,
                horaFin: estadoReserva.horaFin,
                estado: 'Pendiente'
            });
        }
    } else {
        reservas.push({
            id: 'res-' + Date.now(),
            servicioId: s.id,
            servicioNombre: s.nombre,
            duracion: s.duracion,
            precio: s.precio,
            fecha: estadoReserva.fechaISO,
            fechaTexto: estadoReserva.fechaTexto,
            hora: estadoReserva.hora,
            horaFin: estadoReserva.horaFin,
            estado: 'Pendiente'
        });
    }

    dahliaGuardarReservas(reservas);

    document.getElementById('texto-completado').textContent =
        `Te esperamos para tu ${s.nombre} el ${estadoReserva.fechaTexto} a las ${estadoReserva.hora}. Te enviaremos un correo con los detalles.`;

    irAPaso('completado');
}

function iniciarReprogramacion(id) {
    const reservas = dahliaObtenerReservas();
    const reserva = reservas.find(function (r) { return r.id === id; });
    if (!reserva) return;

    estadoReserva.reprogramarId = id;
    estadoReserva.servicio = DAHLIA_SERVICIOS.find(function (s) { return s.id === reserva.servicioId; }) || {
        id: reserva.servicioId,
        nombre: reserva.servicioNombre,
        duracion: reserva.duracion,
        precio: reserva.precio,
        categoria: ''
    };

    const aviso = document.getElementById('aviso-reprogramar');
    aviso.textContent = `Estás reprogramando: ${estadoReserva.servicio.nombre} (${estadoReserva.servicio.duracion} min)`;
    aviso.classList.remove('oculto');

    actualizarSubtituloFecha();
    irAPaso(2);
}

function reiniciarAsistente() {
    estadoReserva.servicio = null;
    estadoReserva.fechaISO = null;
    estadoReserva.fechaTexto = null;
    estadoReserva.hora = null;
    estadoReserva.horaFin = null;
    estadoReserva.reprogramarId = null;

    document.querySelectorAll('.tarjeta-servicio-op').forEach(function (t) { t.classList.remove('seleccionada'); });
    document.querySelectorAll('.dia-opcion').forEach(function (d) { d.classList.remove('seleccionado'); });
    document.getElementById('rejilla-horas').innerHTML = '';
    document.getElementById('aviso-reprogramar').classList.add('oculto');
    document.getElementById('btn-a-fecha').disabled = true;
    document.getElementById('btn-a-confirmar').disabled = true;

    history.replaceState(null, '', '/cliente/reservarCita.html');
    irAPaso(1);
}

function irAPaso(paso) {
    document.querySelectorAll('.paso-panel').forEach(function (panel) { panel.classList.add('oculto'); });

    const idsPorPaso = { 1: 'panel-servicio', 2: 'panel-fecha', 3: 'panel-confirmar', completado: 'panel-completado' };
    document.getElementById(idsPorPaso[paso]).classList.remove('oculto');

    const stepper = document.getElementById('stepper');
    if (paso === 'completado') {
        stepper.style.display = 'none';
        return;
    }
    stepper.style.display = 'flex';

    document.querySelectorAll('.paso-item').forEach(function (item) {
        const n = Number(item.getAttribute('data-paso'));
        item.classList.toggle('completado', n <= paso);
    });

    document.querySelectorAll('.paso-linea').forEach(function (linea) {
        const n = Number(linea.getAttribute('data-linea'));
        linea.classList.toggle('completado', n < paso);
    });

    window.scrollTo({ top: 0, behavior: 'smooth' });
}
