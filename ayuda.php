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

    <div class="contenedor contenido-principal">
        <h3>¿Necesitas Ayuda? Completa el siguiente formulario</h3>
        <hr>
        <form action="Post" class="formulario">
            <fieldset>
                <label for="nombre">Nombre de la Mascota</label>

                <input type="text" name="nombre" id="nombre">

                <label for="descripcion">Descripcion</label>

                <textarea class="campo__field--textarea" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>

                <label for="contacto">Telefono para contactar</label>
                <input type="number" name="telefono" id="contacto">

                <input class="boton" type="button" value="Enviar">
            </fieldset>
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