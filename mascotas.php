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
$perdidos = true;
$mascotasPerdidas = filtrarMascotas($animalitos, $perdidos);
$perdidas = false;
$mascotasEncontradas = filtrarMascotas($animalitos, $perdidas);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
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
        <h1>Sección de Mascotas</h1><br>
        <section>
            <p>En esta sección tenemos las mascotas que fueron publicadas dentro del sitio. Si necesitas ayuda con
                alguna mascota <a class="enlaceAyuda" href="ayuda.php">hace click aqui.</a></p>
        </section><br>
        <section class="secMascotaE">
            <table>
                <h3 style="padding-left:20px">Mascotas Encontradas:</h3>
                <tr>
                    <?php foreach ($mascotasEncontradas as $key => $animalito) : ?>
                        <td>
                            <article class="widget-mascota">
                                <img src="imagenes/<?= $animalito['imagen'] ?>" alt="...">
                                <div>
                                    <h5 class="no-margin"><?= $animalito['nombre'] ?></h5>
                                    <p class="no-margin"><?= $animalito['descripcion'] ?></p>
                                    <p class="no-margin"><?= $animalito['aporte'] ?></p>
                                    <a href="detalleAnimalito.php?id=<?= $animalito['id'] ?>" class="boton boton--secundario">Ver
                                        detalle</a>
                                </div>
                            </article>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </section>
        <br>
        <hr>
        <br>

        <section class="secMascotaP">
            <table>
                <h3 style="padding-left:20px">Mascotas Perdidas:</h3>
                <tr>
                    <?php foreach ($mascotasPerdidas as $key => $animalito) : ?>
                        <td>
                            <article class="widget-mascota">
                                <img src="imagenes/<?= $animalito['imagen'] ?>" alt="...">
                                <div>
                                    <h5 class="no-margin"><?= $animalito['nombre'] ?></h5>
                                    <p class="no-margin"><?= $animalito['descripcion'] ?></p>
                                    <p class="no-margin"><?= $animalito['aporte'] ?></p>
                                    <a href="detalleAnimalito.php?id=<?= $animalito['id'] ?>" class="boton boton--secundario">Ver
                                        detalle</a>
                                </div>
                            </article>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
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