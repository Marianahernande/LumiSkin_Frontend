<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
   <link rel="stylesheet" href="../../assets/style/partes/headerPrincipal.css">
<link rel="stylesheet" href="../../assets/style/partes/botones.css">

<link rel="stylesheet" href="../../assets/style/sessionForms/lateral.css">
<link rel="stylesheet" href="../../assets/style/sessionForms/forms.css">
<link rel="stylesheet" href="../../assets/style/partes/botones.css">
<link rel="stylesheet" href="../../assets/style/media.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

</head>
<body>
    <?php include '../partes/headerPrincipal.php'; ?>
<main>

    <div id="main_container">

        <div id="contenedor_login">

            
            <form action="">
                <Div>
                    <p class="titulo_formulario">
                        Crear Cuenta
                    </p>
                    <p class="texto-instrucciones">Registrate para reseravar tus citas</p>
                </Div>

                <div>
                    <input type="text" id="nombre" required placeholder="Nombre completo">
                </div>

                <div>
                    <input type="email" id="correo" required placeholder="Correo electronico">
                </div>

                <div>
                    <input type="password" id="contraseña" required placeholder="Contraseña">
                </div>

                <button type="submit">Crear cuenta</button>
                <p style="align-self: center;">¿Ya tienes cuenta? <a href="./login.php">iniciar sesion</a></p>
            </form>

        </div>

        <div id="contenedor_info">

            <div id="circulo">
                <img src="../../assets/img/icono/log3.png" alt="">
            </div>
            

            <div id="texto_login">

                <p>Dahlia Beauté</p>
        
                <p class="texto">Crea tu cuenta y reserva tu primer tratamiento en minutos</p>
                
            </div>

        </div>


        

    </div>

</main>

<script src="../../assets/js/script.js"></script>
</body>
</html>