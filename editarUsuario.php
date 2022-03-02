<?php
//require_once('helpers/dd.php');
require_once('controlador/funciones.php');
if (!isset($_SESSION['nombre'])) {
    header('location: login.php');
}
$id = intval($_GET['id']);
$bd = conexion('localhost', 'mascotas', 'root', '');
$usuario = buscar($bd, 'usuarios', $id);

if ($_POST) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $errores = [];
    //Debo hacer una validación
    $errores = validarUsuarioRegistro($_POST, $_FILES);
    if (count($errores) === 0) {
        $bd = conexion('localhost', 'mascotas', 'root', '');
        $avatar = armarImagen($_FILES);
        actualizarUsuarioBD($bd, 'usuarios', $_POST, $avatar);
        //Aquí es donde debemos crear una función - para enviar el email al usuario
        //enviarEmail($_POST);
        //Envio al usuario a donde yo desee
        header("location: index.php");
    }
}


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
            <h2 style="text-align: center">Editar Usuario</h2>
            <h5 style="text-align: center">(Todos los campos son obligatorios y deben ser completados)</h5>
        </section>

        <form class="form-login" action="" method="POST" enctype="multipart/form-data">

            <label for="nombre" class="label-form">Nombre</label>
            <input type="text" class="input-form" id="nombre" name="nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : $usuario['nombre'] ?>" required />

            <div>
                <label for="apellido" class="label-form">Apellido</label>
                <input type="text" class="input-form" name="apellido" id="apellido" value="<?= isset($_POST['apellido']) ? $_POST['apellido'] : $usuario['apellido'] ?>" required />
            </div>
            <div>
                <label for="email" class="label-form">Correo electrónico</label>
                <input type="email" class="input-form" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : $usuario['email'] ?>" required />
            </div>

            <div>
                <label for="telefono" class="label-form">Telefono</label>
                <input type="text" class="input-form" name="telefono" id="telefono" value="<?= isset($_POST['telefono']) ? $_POST['telefono'] : ""; ?>" required placeholder="Ej: el número no debe contener ni el 0 del 0297 ni el 15" />
            </div>

            <div>
                <label for="password" class="label-form">Clave</label>
                <input type="password" class="input-form" name="password" id="password" required placeholder="La contraseña debe tener 6 o más caracteres">
            </div>
            <div>
                <label for="repassword" class="label-form">Rectifique la clave</label>
                <input type="password" class="input-form" name="repassword" id="repassword" required placeholder="Ingresa de nuevo tu contraseña">
            </div>
            <div class="form-group">
                <input class="input-archivo" type="file" name="avatar">
            </div>
            <input type="submit" class="boton boton--primario boton-formu" value="Guardar Cambios">
        </form>
    </div>
    <footer class="footer">
        <?php
        require_once('partials/footer.php')
        ?>
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