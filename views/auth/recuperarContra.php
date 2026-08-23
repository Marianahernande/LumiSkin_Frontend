<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="../../assets/style/sessionForms/estilos_recuperar.css">
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
                <li><a href="../../index.php">Inicio</a></li>

            </ul>
        </nav>
        <div>
            <a href="#" class="header-btn">Iniciar sesion</a>
            <a href="./registrarse.html" class="header-btn1">Registrarse</a>
        </div>
        
    </header>
<main>


    <div id="main_container">

        <div id="contenedor_login">
            <div id="circulo">
                <img src="../../assets/img/logo.png " alt="">
            </div>
            <p style="font-size: 45px;font-weight: 700; margin-bottom: 30px;">
                Recuperar Contraseña
            </p>

            <Div>
                    
                    <p style="text-align: center; margin-bottom: 20px; font-size: 20px;">Ingresa tu correo y te enviaremos instrucciones para <br>restablecerla</p>
            </Div>

            
            <form action="">
                

                <div>
                    <input type="email" id="correo" required placeholder="Correo electronico">
                </div>

                <button type="submit">Enviar enlace de recuperacion</button>

                <p style="align-self: center;"><a href="/auth/login.html">vovler a iniciar sesion</a></p>

            </form>

        </div>

    </div>

</main>


</body>
</html>