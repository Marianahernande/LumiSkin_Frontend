<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estética | Belleza que se siente</title>

    <!-- Fuente elegante -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/style/partes/headerPrincipal.css">
    <link rel="stylesheet" href="./assets/style/partes/botones.css">
    <link rel="stylesheet" href="./assets/style/partes/cardsServicios.css">
    <link rel="stylesheet" href="./assets/style/partes/hero.css">
    <link rel="stylesheet" href="./assets/style/partes/contacto.css">
    <link rel="stylesheet" href="./assets/style/partes/foother.css">
     <link rel="stylesheet" href="./assets/style/media.css">

    

</head>

<body>
    <?php include './views/partes/headerPrincipal.php'; ?>

    <!-- Barra de progreso de scroll -->
    <div class="scroll-progress"></div>
    <?php include './views/partes/hero.php'; ?>
   <?php include './views/partes/catalogo/seccionCatalogo.php'; ?>
   <?php include './views/partes/contacto.php'; ?>
   <?php include './views/partes/foother.php'; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
     <script src="./assets/js/script.js"></script>
    

</body>

</html>