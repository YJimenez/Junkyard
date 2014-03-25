<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");

$permiso=new permisos();
if(!$permiso->vPermiso("1,2", $_SESSION['ooyalaUser']['profile'])&&!$_SESSION['ooyalaUser']['admin']) {
		echo "You don't have privileges to access this section";
		$permiso->redirige("?section=home",3);
		exit();
	}
	$uploader=new upload();
	$videos=$uploader->getVideosLocal();

	if(isset($_GET['success'])) {
		extract($_GET);
		$video=$uploader->getVideoToOoyala($_GET['success']);
	}

	//echo "<pre>";
	//print_r($videos);

//Archivo de la login
require_once('view/upload/localVideos.php');
?>