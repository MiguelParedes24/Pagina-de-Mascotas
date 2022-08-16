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
    <script type="text/javascript" src="js/master.js"></script>
</head>

<body onload="armoFormulario();">
    <header class="header">
        <?php
        require_once("partials/navegacion.php");
        ?>
    </header>

    <div class="contenedor-form">

        <h3 style="text-align:center">¿Necesitás Ayuda? Completa el siguiente formulario</h3>
        <!-- aca va el formulario inyectado con javascript-->

    
        <?php
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        if (isset($_POST['Animal Encontrado']) && $_POST['animalitoEncontrado'] == 'Animal Encontrado') {
            require_once("partials/formularioEncontrado.php");
        } else if(isset($_POST['Animal Perdido']) && $_POST['animalitoPerdido'] == 'Animal Perdido') {
            require_once("partials/formularioPerdido.php");
        }
        ?>
    </div>


    <footer class="footer">
        <?php
        require_once("partials/footer.php");
        ?>
    </footer>

    <script src="js/modernizr.js"></script>
</body>

</html>