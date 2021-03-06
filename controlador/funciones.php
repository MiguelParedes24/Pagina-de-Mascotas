<?php
//Activar las variables de sesiones
session_start();

function validarUsuarioRegistro($datos, $imagen)
{
    $errores = [];
    if (trim($datos['nombre']) === '') {
        $errores['nombre']  = "El campo nombre no puede estar vacio";
    }
    if (empty(trim($datos['apellido']))) {
        $errores['apellido']  = "El campo apellido no puede estar vacio";
    }
    if (trim($datos['email']) === '') {
        $errores['email']  = "El campo email no puede estar vacio";
    }
    if (trim($datos['password']) === '') {
        $errores['password']  = "El campo clave no puede estar vacio";
    } else if (strlen(trim($datos['password'])) < 6) {
        $errores['password']  = "El campo clave no puede tener menos de 6 caracteres";
    }

    if (strlen(trim($datos['telefono'])) != 10) {
        $errores['telefono'] = "El campo de telefono debe tener exactamente 10 caracteres";
    }

    if (trim($datos['repassword']) === '') {
        $errores['repassword']  = "El campo de rectificación no puede estar vacio";
    } else if (strlen(trim($datos['repassword'])) < 6) {
        $errores['repassword'] = "El campo de rectificación no puede tener menos de 6 caracteres";
    }

    //comprobar si password y repassword son iguales
    if (trim($datos['password']) != trim($datos['repassword'])) {
        $errores['repassword']  = "El campo de rectificacion no es igual al campo clave";
    }
    //Validar la imagen - Avatar
    if (isset($imagen)) {
        
        $avatar = $imagen['avatar']['name'];
        
        $ext = pathinfo($avatar, PATHINFO_EXTENSION);
        
        if ($imagen['avatar']['error'] != 0) {
            $errores['avatar'] = "Debe subir su avatar";
        } elseif ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
            $errores['avatar'] = "Debe seleccionar un archivo de tipo JPG ó PNG ó JPEG";
        }
    }

    return $errores;
}

//Función que arma el registro del usuario
function armarUsuario($datos)
{
    $usuario = [
        "nombre" => $datos['nombre'],
        "apellido" => $datos['apellido'],
        "email" => $datos['email'],
        "password" => $datos['password'],
        "telefono" => $datos['telefono'],
        "perfil" => 1
    ];
    //dd($usuario);
    return $usuario;
}
//Armar imagen
function armarImagen($imagen)
{
    $avatar = $imagen['avatar']['name'];
    $ext = pathinfo($avatar, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['avatar']['tmp_name'];
    $archivoDestino = dirname(__DIR__) . '/imagenes/';
    $avatar = uniqid('avatar-') . '.' . $ext;
    
    $archivoDestino = $archivoDestino . $avatar;
    //Voy a guardar en el servidor la imagen o el archivo
    move_uploaded_file($archivoOrigen, $archivoDestino);
    
    return $avatar;
}

//Función para conectar con la Base de Datos
//Servidor(locahost) ,Base de Datos(mascotas), Usuario(root), password("")
function conexion($host, $dbname, $usuario, $password)
{
    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $bd = new PDO($dsn, $usuario, $password);
        return $bd;
    } catch (PDOException $error) {
        echo "<h2 style='color:white; text-align:center; background-color:tomato; padding:20px'> Upps ! Ocurrio un error " . $error->getMessage() . "</h2>";
        exit;
    }
}

//Crear función para guardar los datos en la Base de Datos
function guardarUsuarioBD($bd, $tabla, $datos, $imagen)
{
    //1.- Organizar los datos a guardar
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $email = $datos['email'];
    $password = password_hash($datos['password'], PASSWORD_DEFAULT);
    $telefono = $datos['telefono'];
    $perfil = 1;
    $avatar = $imagen;
    //2.- Armar la consulta
    //                            Nombres de los campos en la tabla
    $sql = "insert into $tabla (nombre,apellido,email,telefono,password,perfil,avatar) values (:nombre,:apellido,:email,:telefono,:password,:perfil,:avatar)";
    //3.- Preparar la consulta
    $query = $bd->prepare($sql);
    //4.- Continuo con la preparación de la consulta de manera blindada
    $query->bindValue(':nombre', $nombre);
    $query->bindValue(':apellido', $apellido);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $query->bindValue(':telefono', $telefono);
    $query->bindValue(':perfil', $perfil);
    $query->bindValue(':avatar', $avatar);
    //5.- Ejecutar la consulta
    $query->execute();
}

//Funcion para Actualizar (NO FUNCIONA)
function actualizarUsuarioBD($bd, $tabla, $datos, $imagen)
{
    //1.- Organizar los datos a guardar
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $email = $datos['email'];
    $password = password_hash($datos['password'], PASSWORD_DEFAULT);
    $telefono = $datos['telefono'];
    $perfil = 1;
    $avatar = $imagen;
    //2.- Armar la consulta
    //Nombres de los campos en la tabla"
    $sql = "UPDATE $tabla SET nombre=".$nombre .", apellido=".$apellido.", email=".$email.",telefono=".$telefono.", password=".$password.",perfil=".$perfil.",avatar=".$avatar."'WHERE id =".$_REQUEST['id'];
    //$sql = "UPDATE $tabla SET(nombre,apellido,email,telefono,password,perfil,avatar) values (:nombre,:apellido,:email,:telefono,:password,:perfil,:avatar)";
    //3.- Preparar la consulta
    $query = $bd->prepare($sql);
    //4.- Continuo con la preparación de la consulta de manera blindada
    $query->bindValue(':nombre', $nombre);
    $query->bindValue(':apellido', $apellido);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $query->bindValue(':telefono', $telefono);
    $query->bindValue(':perfil', $perfil);
    $query->bindValue(':avatar', $avatar);
    //5.- Ejecutar la consulta
    $query->execute();
}

//Función para Listar los usuarios registrados en la tabla ( usuarios ) de la Base de datos

function listar($bd, $tabla)
{
    //1.- Armar la consulta
    $sql = "select * from  $tabla";
    //2.- Preparar la consulta
    $query = $bd->prepare($sql);
    //3.- Ejecutar la consulta
    $query->execute();
    //4.- Traer los datos de la consulta
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
    //dd($resultados);
    return $resultados;
}

// Filtro dependiendo si las mascotas estan perdidas o encontradas
function filtrarMascotas($arreglo, $situacion)
{
    $i = 0;
    if ($situacion == true) {

        foreach ($arreglo as $mascotas) {
            if ($mascotas['perdido'] == 1) {
                $resultado[$i] = $mascotas;
                $i++;
            }
        }
    } else {

        foreach ($arreglo as $mascotas) {
            if ($mascotas['perdido'] == 0) {
                $resultado[$i] = $mascotas;
                $i++;
            }
        }
    }

    return $resultado;
}

//------------------------------------------------------
//Aquí dispongo las funciones del Login
//------------------------------------------------------
function validarUsuarioLogin($datos)
{
    $errores = [];
    if (trim($datos['email']) === '') {
        $errores['email']  = "El campo email no puede estar vacio";
    }
    if (trim($datos['password']) === '') {
        $errores['password']  = "El campo clave no puede estar vacio";
    } else if (strlen(trim($datos['password'])) < 6) {
        $errores['password']  = "El campo clave no puede tener menos de 6 caracteres";
    }

    return $errores;
}

//Buscamos por email al usuario que se está logueando
function buscar($bd, $tabla, $dato)
{

    //1.- Armar la consulta
    if ($_POST) {
        $sql = "select * from $tabla where email = '$dato'";
    } else {
        $sql = "select * from $tabla where id = '$dato'";
    }
    //2.- Preparar la consulta
    $query = $bd->prepare($sql);
    //3.- Ejecutar la consulta
    $query->execute();
    //4.- Traer los datos de la consulta
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    //dd($usuario);
    return $resultado;
}

//Función para setear el usuario (Session - Cookies)
function seteoUsuario($usuario, $datos)
{
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['apellido'] = $usuario['apellido'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['telefono'] = $usuario['telefono'];
    $_SESSION['perfil'] = $usuario['perfil'];
    $_SESSION['avatar'] = $usuario['avatar'];
    if (isset($datos['recordarme'])) {
        //dd('El usuario pidio que lo redordaramos en su navegador');
        // Tiempo de la cookie a razon de 10 años 60*60*24*365*10
        setcookie('email', $datos['email'], time() + 3600);
        setcookie('password', $datos['password'], time() + 3600);
        setcookie('nombre', $usuario['nombre'], time() + 3600);
        setcookie('apellido', $usuario['apellido'], time() + 3600);
        setcookie('perfil', $usuario['perfil'], time() + 3600);
        setcookie('avatar', $usuario['avatar'], time() + 3600);
    }
    //dd('No hay cookies');
}

//Función encgada de determin el ingreso o no al usuario

function ingresarUsuario()
{
    if (isset($_SESSION['email'])) {
        return true;
    } else {
        if (isset($_COOKIE['email'])) {
            $_SESSION['email'] = $_COOKIE['email'];
            $_SESSION['password'] = $_COOKIE['password'];
            $_SESSION['nombre'] = $_COOKIE['nombre'];
            $_SESSION['apellido'] = $_COOKIE['apellido'];
            $_SESSION['perfil'] = $_COOKIE['perfil'];
            $_SESSION['avatar'] = $_COOKIE['avatar'];
            return true;
        }
        return false;
    }
}

//funcion para cerrar sesion
function cerrarSesion()
{
    session_destroy();
    //Cerrar o borrar las cookies 
    setcookie('email', '', time() - 1);
    setcookie('password', '', time() - 1);
    setcookie('nombre', '', time() + -1);
    setcookie('apellido', '', time() + -1);
    setcookie('perfil', '', time() + -1);
    setcookie('avatar', '', time() + -1);
    header("location:index.php");
    //HACE LO QUE TIENE QUE HACER PERO DE MANERA BRUSCA, NECESITO INVESTIGAR    
}