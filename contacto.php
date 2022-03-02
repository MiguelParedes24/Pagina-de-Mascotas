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
    <title>Contacto</title>
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

    <main class="contenedor">
        <h3 class="centrar-texto">Contacto</h3>
        <div class="contacto-bg"></div>
        <form action="Post" class="form-login">
            <div class="campo">
                <label class="label-form" for="nombre">Nombre</label>
                <input class="input-form" type="text" placeholder="Tu Nombre" id="nombre">
            </div>
            <div class="campo">
                <label class="label-form" for="email">E-mail</label>
                <input class="input-form" type="email" placeholder="Tu E-mail" id="email">
            </div>
            <div class="campo">
                <label class="label-form" for="mensaje">Mensaje</label>
                <textarea class="campo__field--textarea" id="mensaje"></textarea>
            </div>

            <div class="campo">
                <input type="submit" value="Enviar" class="boton boton--primario boton-formu">
            </div>
        </form>
    </main>


    <footer class="footer">
        <?php
        require_once("partials/footer.php");
        ?>
    </footer>

    <script src="js/modernizr.js"></script>
</body>

</html>