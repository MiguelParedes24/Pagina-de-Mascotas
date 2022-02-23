<?php
require_once('controlador/funciones.php');
$id = intval($_GET['id']);

$bd = conexion('localhost', 'mascotas', 'root', '');
$animalito = buscar($bd, 'animalitos', $id);


?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- <link rel="preload" href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" crossorigin="crossorigin" as="font"> -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <?php require('partials/navegacion.php') ?>
    </header>
    <div class="contenedor">

        <h3 style="text-align: center; text-decoration:underline">Detalle de la Mascota</h3>
        <section class="fila">
            <article>
                <div>
                    <img class="img-animalito" src="imagenes/<?= $animalito['imagen'] ?>">
                    <div>
                        <h5><?= $animalito['nombre'] ?></h5>
                        <p><?= $animalito['descripcion'] ?></p>
                        <p><?= $animalito['aporte'] ?></p>
                        <a href="index.php" class="boton boton--primario">Volver</a>
                    </div>
                </div>
            </article>
        </section>
    </div>
    <footer class="footer">
        <?php require('partials/footer.php') ?>
    </footer>
    <script src="js/master.js"></script>
</body>

</html>