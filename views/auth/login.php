<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="../../assets/style/sessionForms/estilos_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Imperial+Script&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div style="display: flex;align-items: cent er;">
            <div class="circulo">
                <img src="../../assets/img/logo.png" alt="Belleza">
                
            </div>
             <p style="font-family: Imperial Script, cursive; font-size: 40px; font-weight: 600;">Dahlia Beauté</p>
        </div>
        <nav>
            <ul>
                <li><a href="/index.html">Inicio</a></li>

            </ul>
        </nav>
        <div>
            <a href="#" class="header-btn">Iniciar sesion</a>
            <a href="/auth/registrarse.html" class="header-btn1">Registrarse</a>
        </div>
        
    </header>
<main>


    <div id="main_container">

        <div id="contenedor_info">

            <div id="circulo">
                <img src="../../assets/img/logo.png" alt="">
            </div>
            

            <div id="texto_login">

                <p style="font-family: Imperial Script, cursive; font-size: 40px; font-weight: 600;">Dahlia Beauté</p>

                    

                <p style="color: #ED66B2; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-style: italic ; font-weight: 600; font-size: 30px;">
                    "Belleza que se cuida, <br> confianza que se nota"
                </p>

                <p style="margin-top: 40px; font-size: 20px;">Inicia sesion para gestionar tus citas y <br> descubrir nuevos tratamientos</p>
                
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

                <p style="align-self: center;">¿No tienes cuenta? <a href="/auth/registrarse.html">Registrarse</a></p>

            </form>

        </div>

    </div>

</main>


</body>
</html>