<?php
//Archivo para incluir archivos de las clases
include('model/includes.php');

//require_once("model/conexion.php");

if(!empty($_GET['section'])){
	$section = $_GET['section'];
	if(!preg_match("/admin/i", $section)) {
		echo "You can't access this section, please try <a href='index.php?section=$section'>here</a>";
		exit();
	}
}
else{
	$section = "adminLogin";
}
	
if(is_file("controller/".$section."Controller.php")){
	require_once("controller/".$section."Controller.php");
}
else{
	require_once("controller/adminLoginController.php");
}

?>