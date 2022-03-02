<?php
//require_once('helpers/dd.php');
require('controlador/funciones.php');
//if(ingresarUsuario() === true){
if (!isset($_SESSION['nombre'])) {
    $nombre = "";
} else {
    $nombre = $_SESSION['nombre'] . ' ' . $_SESSION['apellido'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
    <link rel="stylesheet" href="css/normalize.css">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
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

    <main class="contenedor">
        <!-- <h3 class="centrar-texto">Sobre la esterilización</h3> -->

        <img style="padding-left: 200px;" src="imagenes/porqueEsterilizar.png" alt="Imagen del blog">


        <p>Nulla sit amet nulla sapien. Integer ut ligula mi. Vivamus auctor, orci nec dictum sodales, augue eros feugiat odio,
            eu porta eros mi sit amet turpis. Vestibulum sed risus interdum, vestibulum nisl eget, laoreet metus.
            Nunc efficitur nunc et est tempus, sit amet tincidunt erat congue. In hac habitasse platea dictumst.
            Sed at erat ac purus tempus viverra congue ut nulla. Vestibulum gravida dignissim sem, et dignissim enim ornare eget.
            Ut vestibulum ultrices libero, ut convallis ex auctor id. Etiam placerat pulvinar elit quis finibus.
            Etiam sollicitudin nisl ac dolor facilisis porttitor. Donec convallis convallis vehicula. Ut hendrerit at arcu quis euismod.
            Aenean vehicula laoreet magna, non laoreet magna consequat eu. Integer vitae odio ullamcorper, finibus tortor quis,
            rhoncus mauris. Aenean lectus urna, iaculis ac convallis quis, lobortis eget mauris.</p>

        <p>Quisque aliquet dui eu fermentum vehicula. Mauris mattis sem at urna gravida placerat.
            In tincidunt consectetur erat et viverra. Quisque eget purus facilisis, condimentum mi ac, euismod velit.
            Nunc metus ipsum, aliquam non maximus ut, faucibus eget sem. Aliquam posuere sit amet lacus ut imperdiet.
            Cras eu pharetra justo. Curabitur sagittis tristique est, ac feugiat lorem placerat in. Sed quis ipsum elit.
            Nunc ante lacus, auctor ac auctor et, molestie sed lacus. Suspendisse ipsum nulla, tempor et varius in, cursus ut dolor.</p>

        <p>Mauris viverra fermentum neque, eget pellentesque metus molestie ut. In hac habitasse platea dictumst.
            Fusce a sem gravida, consequat odio non, euismod libero. Morbi sodales nulla sit amet augue tempor ultricies.
            Sed eros nunc, luctus sed pulvinar et, eleifend non augue. Duis venenatis ante dui, at laoreet urna faucibus ac.
            Proin maximus porttitor cursus. Aenean elementum sodales massa a accumsan. Morbi nec tincidunt nunc. Nullam id lacinia ex.
            Sed finibus nulla vitae augue rutrum lacinia. Integer eget odio nisl.
            Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus et nunc eu dolor tincidunt efficitur.
            Quisque in venenatis sem. Vestibulum vitae nulla sit amet magna tempor suscipit.</p>

    </main>

    <footer class="footer">
        <?php
        require_once("partials/footer.php");
        ?>
    </footer>

    <script src="js/modernizr.js"></script>
</body>

</html>