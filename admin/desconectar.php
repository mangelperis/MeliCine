<?php 
error_reporting(E_ALL ^ E_NOTICE);
 //Crear sesión
 session_start();
 //Vaciar sesión
 $_SESSION = array();
 //Destruir Sesión
 session_destroy();
 //Redireccionar a login.php
 header("location: index.php");
 exit;
?>