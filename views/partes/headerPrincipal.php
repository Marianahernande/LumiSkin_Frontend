<!-- Invocamos el archivo de botones de iniciar sesion y Registrase -->
<?php 
require_once __DIR__ . '/botones.php'; 
?>
    
    <header>
        <div style="display: flex;align-items: center;">
            <div class="circulo">
                <img src="/LumiSkin/assets/img/logo.png" alt="Logo D"> 
            </div>
             <p class="titulo">ahlia Beauté</p>
        </div>

        <!-- Botón menú hamburguesa -->
        <div class="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav>
            <ul>
                 <li><a href="/LumiSkin/index2.php">Inicio</a></li>
                 <li><a href="/LumiSkin/index2.php#catalogo">Servicios</a></li>
                 <li><a href="/LumiSkin/index2.php#contacto">Contacto</a></li>
            </ul>
        </nav>
        
    <!-- Llamada explícita al grupo de botones del header -->
    <?php renderBotonesHeader(); ?>
        
    </header>