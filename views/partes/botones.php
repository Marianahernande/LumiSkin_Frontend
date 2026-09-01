<?php
// Función para los botones del Header login-registro
function renderBotonesHeader() {
?>
    <div class="grupo-botones">
        <a href="/LumiSkin/views/auth/login.php" class="header-btn1">Iniciar sesión</a>
        <a href="/LumiSkin/views/auth/registrarse.php" class="header-btn">Registrarse</a>
    </div>
<?php
}

// Función para el botón del Catálogo reservar
function renderBotonReservar($link = "/LumiSkin/views/auth/login.php", $texto = "Reservar") {
?>
    <a href="<?php echo htmlspecialchars($link); ?>" class="btn-reservar">
        <?php echo htmlspecialchars($texto); ?>
    </a>
<?php
}

// Función botones hero reservar cita y ver servicios
function renderBotonesHero() {
    ?>
    <div class="hero-buttons">
        <a href="#contacto" class="btn-hero btn-primary">
            <span>Reservar cita ahora</span>
            <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M5 12h14M12 5l7 7-7 7" />
            </svg>
        </a>
        <a href="/LumiSkin/views/servicios.php" class="btn-hero btn-secondary">
            Ver servicios →
        </a>
    </div>
    <?php
}
?>