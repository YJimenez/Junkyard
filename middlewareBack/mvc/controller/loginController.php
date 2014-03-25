<?php

if($_SESSION['ooyala'])
header("Location: ?section=home");

//declaramos clase usuarios (tabla, campo ID, campo usuario, campo password, campo activo -si existe-, session)
$usr =  new usuarios("usuarios", "idlogin", "userL", "passL", "actL", 0,"ooyala");
$error=0;

if($_POST) {
if(strlen($_POST['user'])>0&&strlen($_POST['password'])>0){
		$usr->usuario($_POST['user'], md5($_POST['password']));
		if($usr->allow()) {
			$user=new users();
			$dataUser=$user->getUser($_SESSION['ooyala']);
			$_SESSION['ooyalaUser']=$dataUser[0];
			if($dataUser[0]['admin']==1) {
				$_SESSION['ooyalaAdmin']=$_SESSION['ooyala'];
				$_SESSION['ooyalaUser']['property']=0;
				$_SESSION['ooyalaUser']['profile']=0;
			}
			header("Location: ?section=home");
			
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