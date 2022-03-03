<?php
require_once('controlador/funciones.php');
$bd = conexion('localhost', 'mascotas', 'root', '');
$usuarios = listar($bd, 'usuarios');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar</title>
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
    <div class="contenedor">
        <section>
            <h1 style="text-align: center;padding:3 ;">Listado de usuarios</h1>
        </section>
        <section>
            <table class="tablaAdministrar">
                <thead>
                    <tr class="trAdministrar">
                        <th class="thAdministrar" scope="col">id</th>
                        <th class="thAdministrar" scope="col">Nombre</th>
                        <th class="thAdministrar" scope="col">Apellido</th>
                        <th class="thAdministrar" scope="col">Ver</th>
                        <th class="thAdministrar" scope="col">Editar</th>
                        <th class="thAdministrar" scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($usuarios)) : ?>
                        <?php foreach ($usuarios as $usuario) : ?>
                            <tr class="trAdministrar">
                                <th class="thAdministrar" scope="row"><?= $usuario['id']; ?></th>
                                <td class="tdAdministrar"><?= $usuario['nombre']; ?></td>
                                <td class="tdAdministrar"><?= $usuario['apellido']; ?></td>
                                <td class="tdAdministrar"><a href="detalleUsuario.php?id=<?= $usuario['id'] ?>">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </a> </td>
                                <td class="tdAdministrar"><a href="editarUsuario.php?id=<?= $usuario['id'] ?>">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a> </td>
                                <td class="tdAdministrar"><a href="eliminarUsuario.php?id=<?= $usuario['id'] ?>">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a> </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </div>

    <footer class="footer">
        <?php
        require_once("partials/footer.php");
        ?>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/modernizr.js"></script>
</body>

</html>