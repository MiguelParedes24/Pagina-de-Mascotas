<?php

session_start();
session_destroy();

//Cerrar o borrar las cookies del navegador
//al pasar un tiempo negativo se borra 
setcookie('email','', time()-1);
setcookie('password','', time()-1);
setcookie('nombre','', time()-1);
setcookie('apellido','', time()-1);
setcookie('perfil','', time()-1);
setcookie('avatar','', time()-1);
setcookie('telefono','', time()-1);
header('location: index.php');

//exit();




?>