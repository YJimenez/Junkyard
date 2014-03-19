<?php
if(!$_SESSION['bcove'])
header("Location: ?section=login");




	$obj_token=new token();
	$tokens=$obj_token->getToken();

	if($_POST) {
		$theToken=$obj_token->getToken($_POST['property']);
		$fecha=($_POST['fecha'])?$_POST['fecha']:date("Y-m-d");
	}
	//Archivo de la vista de clips
	require_once('view/clips/clips.php');


?>