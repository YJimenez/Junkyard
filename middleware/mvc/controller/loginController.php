<?php

if($_SESSION['ooyala'])
header("Location: index.php");

//declaramos clase usuarios (tabla, campo usuario, campo password, campo activo -si existe-, session)
$usr =  new LW_usuarios("usuarios", "usuario", "password", "activo", "ooyala");
$error=0;

if($_POST) {
if(strlen($_POST['usuario'])>0&&strlen($_POST['clave'])>0){
		$usr->usuario($_POST['usuario'], md5($_POST['clave']));
		if($usr->allow()) {
			header("Location: index.php?section=home");
			
		}
		else
			$error=1;
	}
else
	$error=2;
}


//Archivo de la login
require_once('view/login/login.php');
?>