<?php
//require_once('helpers/dd.php');
require_once('controlador/funciones.php');
if (!isset($_SESSION['nombre'])) {
    header('location: login.php');
}
$id = intval($_GET['id']);
$bd = conexion('localhost', 'mascotas', 'root', '');
$usuario = buscar($bd, 'usuarios', $id);
?>
<!doctype html>
<html lang="es">
<!---------------------------------COMENTARIOS ABAJO DE LA PAGINA ----------------------------------------------------------->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"
        crossorigin="crossorigin" as="font">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="header">
        <?php
        require_once("partials/navegacion.php");
        ?>
    </header>
    <div class="contenedor">
        <section>
            <h2 style="text-align: center">Editar Usuario</h2>
        </section>

        <form class="form-login" action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="nombre" class="label-form">Nombre</label>
                <input type="text" class="input-form" id="nombre" name="nombre"
                    value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ""; ?>" />
                <!--<div><span class="text text-danger"><?= $errores['nombre']; ?></span></div>-->
                <div>
                    <label for="apellido" class="label-form">Apellido</label>
                    <input type="text" class="input-form" name="apellido" id="apellido"
                        value="<?= isset($_POST['apellido']) ? $_POST['apellido'] : ""; ?>" />
                </div>
                <div>
                    <label for="email" class="label-form">Correo electrónico</label>
                    <input type="email" class="input-form" name="email" id="email"
                        value="<?= isset($_POST['email']) ? $_POST['email'] : ""; ?>" />
                </div>
                <div>
                    <label for="password" class="label-form">Clave</label>
                    <input type="password" class="input-form" name="password" id="password">
                </div>
                <div>
                    <label for="repassword" class="label-form">Rectifique la clave</label>
                    <input type="password" class="input-form" name="repassword" id="repassword">
                </div>
                <div class="form-group">
                    <input class="input-archivo" type="file" name="avatar">
                </div>
                <button type="submit" class="boton boton--primario boton-formu">Guardar Cambios</button>
        </form>
    </div>
    <footer class="footer">
        <?php require('partials/footer.php') ?>
    </footer>
    <script src="js/master.js"></script>
</body>

</html>

<!---------------------------------------------------------------------------------------------------------->
<!--------------------Todavia no puedo hacer Funcionar correctamente esta pagina, tengo que----------------->
<!--------------------Poder cargar el Id desde el Perfil pero todavia no lo pude terminar------------------->
<!--------------------Hay que rellenar los campos con los del registro-------------------------------------->
<!--------------------Tambien hay que hacer un UPDATE a la hora de apretar el guardar cambios--------------->
<!---------------------------------------------------------------------------------------------------------->