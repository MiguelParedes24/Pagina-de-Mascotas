<?php

require_once('controlador/funciones.php');


if ($_POST) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $errores = [];
    //Debo hacer una validación
    $errores = validarUsuarioLogin($_POST);
    //dd($errores);
    if (count($errores) === 0) {
        //Conectar a la Base de Datos
        $bd = conexion('localhost', 'mascotas', 'root', '');
        //Debemos buscar al usuario por el email
        $usuario = buscar($bd, 'usuarios', $email);

        if ($usuario === false) {
            $errores['email'] = 'El usuario o contraseña son inválidos';
        } else {
            if (password_verify($password, $usuario['password']) === false) {
                $errores['password'] = 'El usuario o contraseña son inválidos';
            } else {

                //Guardar los datos del usuario en variables de sesion
                seteoUsuario($usuario, $_POST);
                //Envio al usuario a donde yo desee
                header("location: index.php");
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
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
            <h1 style="text-align: center;padding: 3px;">Iniciar sesión</h1>
        </section>

        <section class="formulario">
            <?php if (isset($errores)) : ?>
                <ul style="text-align:center; color:red; background-color:lightblue;">

                    <?php foreach ($errores as $error) : ?>
                        <li><?= $error; ?></li>

                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form class="form-login" action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label class="label-form" for="email">Correo electrónico</label><br>
                    <input class="input-form" type="email" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ""; ?>" />
                </div>
                <div>
                    <label class="label-form" for="password" class="form-label">Clave</label><br>
                    <input class="input-form" type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <input type="checkbox" value="" id="flexCheckDefault" name="recordarme">
                    <label class="label-form" for="recordarme">
                        Recordarme
                    </label>
                </div>
                <button type="submit" class="boton boton--primario boton-formu">Iniciar sesión</button>
                <div class="enlace-login">
                    <a href="registro.php">Aun no poseo una cuenta!</a>
                </div>
            </form>

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