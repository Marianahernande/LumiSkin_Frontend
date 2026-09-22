document.addEventListener('DOMContentLoaded', function () {
    dahliaInicializarAlmacenamiento();
    dahliaRenderizarCabecera('reservas');
    renderizarReservas();
});

function claseEstado(estado) {
    return {
        'Pendiente': 'pendiente',
        'Confirmada': 'confirmada',
        'Cancelada': 'cancelada'
    }[estado] || 'pendiente';
}

function renderizarReservas() {
    const contenedor = document.getElementById('lista-reservas');
    const vacio = document.getElementById('estado-vacio');
    const reservas = dahliaObtenerReservas();

    if (reservas.length === 0) {
        contenedor.innerHTML = '';
        vacio.classList.remove('oculto');
        return;
    }
    vacio.classList.add('oculto');

    const ordenadas = [...reservas].sort(function (a, b) {
        if (a.estado === 'Cancelada' && b.estado !== 'Cancelada') return 1;
        if (b.estado === 'Cancelada' && a.estado !== 'Cancelada') return -1;
        return (a.fecha + a.hora).localeCompare(b.fecha + b.hora);
    });

    contenedor.innerHTML = ordenadas.map(function (r) {
        const clase = claseEstado(r.estado);
        const permiteAcciones = r.estado !== 'Cancelada';

        return `
        <div class="tarjeta-reserva estado-${clase}" data-id="${r.id}">
            <div class="info-reserva">
                <h3>${r.servicioNombre}</h3>
                <p>${r.fechaTexto} · ${r.hora}-${r.horaFin}</p>
            </div>
            <div class="estado-acciones">
                <span class="badge-estado badge-${clase}">${r.estado}</span>
                ${permiteAcciones ? `
                <div class="botones-reserva">
                    <button class="btn-outline" data-accion="reprogramar" data-id="${r.id}">Reprogramar</button>
                    <button class="btn-peligro" data-accion="cancelar" data-id="${r.id}">Cancelar</button>
                </div>` : ''}
            </div>
        </div>`;
    }).join('');

    contenedor.querySelectorAll('[data-accion="reprogramar"]').forEach(function (boton) {
        boton.addEventListener('click', function () {
            window.location.href = `/cliente/reservarCita.html?reprogramar=${boton.getAttribute('data-id')}`;
        });
    });

    contenedor.querySelectorAll('[data-accion="cancelar"]').forEach(function (boton) {
        boton.addEventListener('click', function () {
            const id = boton.getAttribute('data-id');
            if (!window.confirm('¿Seguro que deseas cancelar esta reserva?')) return;

            const reservas = dahliaObtenerReservas();
            const indice = reservas.findIndex(function (r) { return r.id === id; });
            if (indice !== -1) {
                reservas[indice].estado = 'Cancelada';
                dahliaGuardarReservas(reservas);
                renderizarReservas();
            }
        });
    });
}
