<?php

require_once('controlador/funciones.php');
if (!isset($_SESSION['nombre'])) {
    header('location: login.php');
}
$usuarioId = $_SESSION['id'];
$usuarioEmail = $_SESSION['email'];
$usuarioTelefono = $_SESSION['telefono'];

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
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
        <h3 style="text-align: center; text-decoration:underline">Perfil del usuario</h3>
        <section class="fila">
            <div style="text-align: center">
                <img style="border-radius: 50%; width:20%" src="imagenes/<?= $_SESSION['avatar']; ?>" alt="Avatar">
            </div>
            <div>
                <?php if (intval($_SESSION['perfil']) === 0) : ?>
                    <h3 style="color:red">Administrador</h3>
                <?php endif; ?>
                <h3>Nombre y Apellido: <?= $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h3>
            </div>
            <!--Aca tiene que direccionar a Editar Perfil(Usuario Actual) Todos los usuarios tienen permiso para editar su propio perfil -->
            <a href="editarUsuario.php?id=<?= $usuarioId ?>" class="boton boton--primario">Editar Perfil</a>
            <?php if (intval($_SESSION['perfil']) === 0) : ?>
                <a href="administrar.php" class="boton boton--primario">Administrar Perfiles</a>
            <?php endif; ?>
        </section>
    </div>
    <footer class="footer">
        <?php require('partials/footer.php') ?>
    </footer>
    <script src="js/master.js"></script>
</body>

</html>


<!---------------------------------------------------------------------------------------------------------->
<!--------------------Hasta cierto punto esta pagina funciona correctamente expepto cuando ----------------->
<!--------------------se tiene que apretar los botones de abajo, uno de ellos es el mas dificil------------->
<!---------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------->