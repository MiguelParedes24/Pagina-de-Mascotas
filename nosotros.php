<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Nosotros</title>
</head>

<body>
    <header class="header">
        <?php
        require_once("partials/navegacion.php");
        ?>
    </header>

    <main class="contenedor">
        <h3 class="centrar-texto">Sobre Nosotros</h3>
        <div class="sobre-nosotros">
            <div class="sobre-nosotros__imagen">
                <img src="imagenes/nosotros_chica.jpg" alt="imagen nosotros">
            </div>
            <div class="sobre-nosotros__texto">
                <p>Vestibulum sit amet nunc ac odio laoreet tincidunt eget a felis. Aliquam erat volutpat. Phasellus in enim
                    placerat, facilisis quam sit amet, interdum orci. Ut arcu nisl, fringilla vitae eros eget, mattis
                    accumsan nibh. Nam auctor sem odio.
                </p>
            </div>
        </div>
    </main>


    <footer class="footer">
        <?php
        require_once("partials/footer.php");
        ?>
    </footer>

    <script src="js/modernizr.js"></script>
</body>

</html>