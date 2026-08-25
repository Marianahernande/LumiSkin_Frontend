<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="../../assets/style/partes/headerPrincipal.css">
    <link rel="stylesheet" href="../../assets/style/partes/botones.css">
    <link rel="stylesheet" href="../../assets/style/sessionForms/lateral.css">
    <link rel="stylesheet" href="../../assets/style/sessionForms/forms.css">
    <link rel="stylesheet" href="../../assets/style/partes/botones.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>
    <?php include '../partes/headerPrincipal.php'; ?>
<main>
    <div id="main_container">
        <div id="contenedor_info">

            <div id="circulo">
                <img src="../../assets/img/icono/login2.png" alt="">
            </div>
            

            <div id="texto_login">
                <p>
                    "Belleza que se cuida, <br> confianza que se nota"
                </p>

                <p>Inicia sesion para gestionar tus citas y <br> descubrir nuevos tratamientos</p>
                
            </div>

        </div>


        <div id="contenedor_login">

            
            <form action="">
                <Div>
                    <p style="font-size: 50px;font-weight: 700">
                        Iniciar sesion
                    </p>
                    <p>Ingresa tus datos para continuar</p>
                </Div>

                <div>
                    <input type="email" id="correo" required placeholder="Correo electronico">
                </div>

                <div>
                    <input type="password" id="contraseña" required placeholder="Contraseña">
                </div>

                <a href="/auth/recuperarContra.html">¿Olvidaste tu contraseña?</a>


                <button type="submit">Entrar</button>

                <p style="align-self: center;">¿No tienes cuenta? <a href="/views/auth/registrarse.php">Registrarse</a></p>

            </form>

        </div>

    </div>

</main>
<footer></footer>

</body>
</html>