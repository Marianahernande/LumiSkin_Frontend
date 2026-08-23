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