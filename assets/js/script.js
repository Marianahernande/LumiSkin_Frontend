$(document).ready(function () {

    $('#hero').ripples({
        resolution: 512,
        dropRadius: 40,
        perturbance: 0.0050,  
        interactive: true
    });
});

//Menu Hamburguesa

document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger-menu');
    const header = document.querySelector('header');

    if (hamburger && header) {
        hamburger.addEventListener('click', (e) => {
            e.stopPropagation();
            header.classList.toggle('menu-abierto');
            console.log('Menú desplegado:', header.classList.contains('menu-abierto'));
        });
    } else {
        console.error('No se encontró el botón .hamburger-menu o la etiqueta <header>');
    }
});

//Cargando

document.addEventListener("submit", function(e) {
    const formulario = e.target;
    
    if (formulario && formulario.id === 'formulario') {
        const boton = formulario.querySelector('.btn-enviar');
        
        if (boton && !boton.classList.contains('is-loading')) {
            // 1. Detenemos el envío inmediato del formulario
            e.preventDefault();
            
            // 2. Activamos la clase de carga para mostrar el spinner
            boton.classList.add('is-loading');
            
            // 3. Esperamos 600 milisegundos (lo justo para que se vea el giro) y enviamos el formulario
            setTimeout(function() {
                formulario.submit();
            }, 600);
        }
    }
});