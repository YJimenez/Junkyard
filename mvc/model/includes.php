<?php
//Inicia una Sesión
session_start();

//Desactiva toda notificación de error
//error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
//Extrae el nombre de un Archivo con su extensión
$c_info = pathinfo(__FILE__);
$c_directorio = $c_info['dirname'];

//Llamado del archivo de las funciones
require_once($c_directorio . "/functions.php");



?>