<?php
require_once __DIR__ . '/botones.php';

function renderCardServicio($imagen, $titulo, $duracion, $precio, $link = "./views/auth/login.php") {
?>
    <article class="card-servicio-catalogo">
        <div class="thumb-servicio">
            <img src="<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($titulo); ?>" loading="lazy">
        </div>
        <div class="info-servicio">
            <h4 class="titulo-servicio"><?php echo htmlspecialchars($titulo); ?></h4>
            <span class="duracion-servicio"><?php echo htmlspecialchars($duracion); ?></span>
        </div>
        <div class="accion-servicio">
            <span class="precio-servicio"><?php echo htmlspecialchars($precio); ?></span>
            <?php renderBotonReservar($link, 'Reservar'); ?>
        </div>
    </article>
<?php
}
?>