<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>

    <link rel="stylesheet" href="../../assets/style/partes/headerPrincipal.css">
    <link rel="stylesheet" href="../../assets/style/partes/botones.css">
    <link rel="stylesheet" href="../../assets/style/sessionForms/estilos_recuperar.css">

</head>
<body>
    <?php include '../partes/headerPrincipal.php'; ?>
<main>

    <div id="main_container">

        <div id="contenedor_login">
            <div id="circulo">
                <img src="../../assets/img/logo.png" alt="">
            </div>
            
            <h2 class="titulo-recuperar">Recuperar Contraseña</h2>

            <div class="texto-instrucciones">
                <p>Ingresa tu correo y te enviaremos instrucciones para <br>restablecerla</p>
            </div>
            
            <form action="../../backend/recuperar_process.php" method="POST">
                
                <div>
                    <input type="email" id="correo" name="correo" required placeholder="Correo electronico">
                </div>

                <button type="submit">Enviar enlace de recuperacion</button>

                <div class="contenedor-enlace">
                    <a href="./login.php">Volver a iniciar sesión</a>
                </div>

            </form>

        </div>

    </div>

</main>
</body>
</html>