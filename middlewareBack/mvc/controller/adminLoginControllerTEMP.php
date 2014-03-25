<?php

if($_SESSION['ooyalaAdmin'])
header("Location: admin.php?section=admin");

//declaramos clase usuarios (tabla, campo ID, campo usuario, campo password, campo activo -si existe-, admin -si es el caso- session)
$usr =  new usuarios("usuarios", "idlogin", "userL", "passL", "actL", 1, "ooyalaAdmin");
$error=0;

if($_POST) {
if(strlen($_POST['user'])>0&&strlen($_POST['password'])>0){
		$usr->usuario($_POST['user'], md5($_POST['password']));
		if($usr->allow()) {
			$user=new users();
			$dataUser=$user->getUser($_SESSION['ooyalaAdmin']);
			$_SESSION['ooyalaUser']=$dataUser[0];
			$_SESSION['ooyala']=$_SESSION['ooyalaAdmin'];
			header("Location: admin.php?section=admin");
			
		}
		else
			$error=1;
	}
else
	$error=2;
}


//Archivo de la login
require_once('view/admin/login.php');
?>