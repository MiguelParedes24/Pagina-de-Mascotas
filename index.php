<?php
//require_once('helpers/dd.php');
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
    <title>Inicio</title>
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

    <div class="contenedor contenido-principal">
        <main class="blog">
            <section>
                <article class="entrada">
                    <br>
                    <div class="entrada__imagen">
                        <img src="imagenes/esterilizar.jpg" alt="imagenPerros">
                    </div>
                    <div class="entrada__contenido">
                        <h2>¿Como funciona la esterilización?</h2>
                        <p>Aqui ingresa un contenido para la pagina</p>
                        <a href="entrada.php" class="boton boton--primario">Leer Entrada</a>
                    </div>
                </article>
            </section>
            <br>
            <section>
                <article class="entrada">
                    <div class="entrada__imagen">
                        <img src="imagenes/grupo_de_perros.jpg" alt="imagenPerros">
                    </div>
                    <div class="entrada__contenido">
                        <h2>Nosotros estamos en la busqueda de hogar</h2>
                        <p>Las mascotas que estan sin rumbo vienen a este lugar, donde brindamos nuestros servicios para ayudar en ese labor.</p>
                        <a href="nosotros.php" class="boton boton--primario">Acerca de Nosotros</a>
                    </div>
                </article>
            </section>
        </main>

        <aside>
            <h3>Algunas Mascotas</h3>

            <div class="sidebar">
                <?php foreach ($animalitos as $key => $animalito) : ?>

                    <article class="animalitos">
                        <div class="widget-animalito">
                            <img src="imagenes/<?= $animalito['imagen'] ?>" class="card-img-top w-100 " alt="...">
                            <div>
                                <h5 class="no-margin"><?= $animalito['nombre'] ?></h5>
                                <p class="no-margin"><?= $animalito['descripcion'] ?></p>
                                <p class="no-margin"><?= $animalito['aporte'] ?></p>
                                <a href="detalleAnimalito.php?id=<?= $animalito['id'] ?>" class="boton boton--secundario">Ver detalle</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

    </div>

    <footer class="footer">
        <?php
        require_once("partials/footer.php");
        ?>
    </footer>

    <script src="js/modernizr.js"></script>
</body>

</html>