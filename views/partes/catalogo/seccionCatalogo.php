<?php 
// Subimos un nivel en la carpeta para incluir cardServicios.php correctamente
require_once __DIR__ . '/../cardServicios.php'; 

$catalogo = [
    [
        "categoria" => "FACIALES",
        "servicios" => [
            ["imagen" => "./assets/img/servicios/Mujer - copia.png", "titulo" => "Limpieza Facial Profunda", "duracion" => "60 min", "precio" => "$ 80.000"],
            ["imagen" => "./assets/img/servicios/hidratacion con Colageno.jpg", "titulo" => "Hidratación con Colágeno", "duracion" => "45 min", "precio" => "$ 65.000"]
        ]
    ],
    [
        "categoria" => "CORPORALES",
        "servicios" => [
            ["imagen" => "./assets/img/servicios/masajerelajante.jpg", "titulo" => "Masaje Relajante Corporal", "duracion" => "60 min", "precio" => "$ 90.000"],
            ["imagen" => "./assets/img/servicios/esfoliacion.jpg", "titulo" => "Exfoliación Corporal", "duracion" => "45 min", "precio" => "$ 70.000"]
        ]
    ],
    [
        "categoria" => "MANICURA Y PEDICURA",
        "servicios" => [
            ["imagen" => "./assets/img/servicios/manicura-pedicura-spa-1.webp", "titulo" => "Manicura Spa", "duracion" => "40 min", "precio" => "$ 35.000"],
            ["imagen" => "./assets/img/servicios/pedicura.webp", "titulo" => "Pedicura Spa", "duracion" => "50 min", "precio" => "$ 45.000"]
        ]
    ]
];
?>

<section id="catalogo" class="seccion-catalogo">
    <div class="container-catalogo">
        
        <div class="header-catalogo">
            <h2>Catálogo de servicios</h2>
            <p>Descubre nuestros tratamientos. Inicia sesión para reservar.</p>
        </div>

        <?php foreach ($catalogo as $bloque): ?>
            <div class="bloque-categoria">
                <h3 class="titulo-categoria"><?php echo htmlspecialchars($bloque['categoria']); ?></h3>
                <div class="grid-servicios-catalogo">
                    <?php
                    foreach ($bloque['servicios'] as $servicio) {
                        // Pasamos los 5 parámetros requeridos por la función: imagen, titulo, duracion, precio y enlace
                        renderCardServicio(
                            $servicio['imagen'], 
                            $servicio['titulo'], 
                            $servicio['duracion'], 
                            $servicio['precio'], 
                            './views/auth/login.php'
                        );
                    }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>