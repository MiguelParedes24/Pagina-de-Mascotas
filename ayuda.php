<?php
require('controlador/funciones.php');
//if(ingresarUsuario() === true){
if (!isset($_SESSION['nombre'])) {
    $nombre = "";
} else {
    $nombre = $_SESSION['nombre'] . ' ' . $_SESSION['apellido'];
}

$bd = conexion('localhost', 'mascotas', 'root', '');
$animalitos = listar($bd, 'animalitos');
$noticias = listar($bd, 'animalitos');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>
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

    <div class="contenedor">
        <h3 style="text-align:center">¿Necesitás Ayuda? Completa el siguiente formulario</h3>

        <form action="Post" class="form-login">
            <label class="label-form" for="nombre">Nombre de la Mascota</label><br>

            <input class="input-form" type="text" name="nombre" id="nombre"><br>

            <label class="label-form" for="descripcion">Descripcion</label><br>

            <textarea class="campo__field--textarea" name="descripcion" id="descripcion" cols="50" rows="10"></textarea><br>

            <label for="contacto">Telefono de Contacto (Opcional)</label>
            <input class="input-form" type="text" name="telefono" id="contacto">

            <label class="label-form" for="imagen">Foto del Animal</label><br>
            <input type="file" name="imagen" id="imagen">

            <button type="submit" class="boton boton--primario boton-formu">Enviar</button>
        </form>

    </div>


    <footer class="footer">
        <?php
        require_once("partials/footer.php");
        ?>
    </footer>

    <script src="js/modernizr.js"></script>
</body>

</html>