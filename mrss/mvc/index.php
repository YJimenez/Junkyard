<?php
//Archivo para incluir archivos de las clases
include('model/includes.php');

//require_once("model/conexion.php");

if(!empty($_GET['section'])){
	$section = $_GET['section'];
}
else{
	$section = "login";
}
	
if(is_file("controller/".$section."Controller.php")){
	require_once("controller/".$section."Controller.php");
}
else{
	require_once("controller/loginController.php");
}

?>