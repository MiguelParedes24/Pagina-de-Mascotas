<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" crossorigin="crossorigin" as="font">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">




</head>

<body>
    <header class="header">
        <?php
        require_once("partials/navegacion.php");
        ?>
    </header>

    <div class="contenedor contenido-principal">
        <section>
            <article>
                <br>
                <img src="imagenes/grupo_de_perros.jpg" alt="imagenPerros">
                <h2>Estamos en desarrollo</h2>
                <p>Aqui ingresa un contenido para la pagina</p>
            </article>
        </section>
        <br>
        <section>
            <article>
                <img src="imagenes/nosotros.jpg" alt="imagenPerros">
                <h2>Nosotros estamos en la busqueda de hogar</h2>
                <p>Las mascotas que estan sin rumbo vienen a este lugar, donde brindamos nuestros servicios para ayudar en ese labor.</p>
            </article>
        </section>
    </div>

    <footer class="footer">
        <?php
        require_once("partials/footer.php");
        ?>
    </footer>

    <script src="js/modernizr.js"></script>
</body>

</html>