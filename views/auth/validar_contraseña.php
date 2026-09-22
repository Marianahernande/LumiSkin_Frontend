<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Contraseña</title>

    <link rel="stylesheet" href="../../assets/style/partes/headerPrincipal.css">
    <link rel="stylesheet" href="../../assets/style/partes/botones.css">
    <link rel="stylesheet" href="../../assets/style/sessionForms/forms.css">
    <link rel="stylesheet" href="../../assets/style/sessionForms/lateral.css">
    <link rel="stylesheet" href="../../assets/style/media.css">
</head>
<body>
    <?php include '../partes/headerPrincipal.php'; ?>
<main>

    <div id="main_container">

        <!-- Lado Izquierdo: Formulario -->
        <div id="contenedor_login">
            
            <div style="width: 100%; max-width: 440px; display: flex; flex-direction: column;">
                <h2 class="titulo_formulario">Nueva contraseña</h2>

                <div class="texto-instrucciones">
                    <p>Ingresa tu nueva contraseña para completar el proceso de recuperación.</p>
                </div>
            </div>
            
            <form action="../../backend/actualizar_contrasena_process.php" method="POST">
                
                <div>
                    <label for="contraseña_nueva">Contraseña Nueva</label>
                    <input type="password" id="contraseña_nueva" name="contraseña_nueva" required placeholder="••••••••••••">
                </div>

                <div>
                    <label for="repetir_contraseña">Repetir Contraseña Nueva</label>
                    <input type="password" id="repetir_contraseña" name="repetir_contraseña" required placeholder="••••••••••••">
                </div>

                
                <button type="submit">Actualizar contraseña</button>

                <div class="contenedor-enlace">
                    <a href="./login.php">Volver a iniciar sesión</a>
                </div>

            </form>

        </div>

        <!-- Lado Derecho: Panel Lateral Informativo -->
        <div id="contenedor_info">
            <div id="circulo">
                <img src="../../assets/img/icono/escudo.png" alt="Escudo">
            </div>
            <div id="texto_login">
                <p>Seguridad y Cuidado <span class="texto">Exclusivo</span></p>
                <p>Protege tu cuenta actualizando tus credenciales de acceso de forma segura para seguir disfrutando de nuestros servicios.</p>
            </div>
        </div>

    </div>

</main>
<script src="../../assets/js/script.js"></script>
</body>
</html>