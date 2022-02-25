<div class="contenedor">
    <div class="barra">
        <a class="logo" href="index.php">
            <h1 class="logo__nombre no-margin centrar-texto"><span class="logo__bold">La Cuchita</span></h1>
        </a>
        <nav class="navegacion">
            <a class="navegacion__enlace" href="index.php">La Cuchita</a>
            <?php if(isset($_SESSION['nombre'])) : ?>
                <?php if(intval($_SESSION['perfil'])===0) : ?>
                    <a class="navegacion__enlace" href="administrar.php">Administrar</a>


                    <?php endif; ?>
                <?php endif; ?>
            <a class="navegacion__enlace" href="nosotros.php">Nosotros</a>

            <a class="navegacion__enlace" href="mascotas.php">Mascotas</a>

            <a class="navegacion__enlace" href="ayuda.php">¿Necesita Ayuda?</a>

            <a class="navegacion__enlace" href="contacto.php">Contacto</a>

           
           

                <?php if(isset($_SESSION['nombre'])) : ?>


                    <a class="navegacion__enlace" href="cerrarSesion.php">Cerrar Sesion </a>
                <?php else : ?>
                    <a class="navegacion__enlace" href="login.php">Inicia Sesión</a>
                    <?php endif; ?>



        </nav>
    </div>
</div>
<div class="header__texto">
    <h2 class="no-margin">Espacio dedicado a los animalitos</h2>
    <p class="no-margin">Encuentrale un lugar para que sea feliz!</p>
</div>

