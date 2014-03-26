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
	if(isset($_GET['success'])) {
		extract($_GET);
		$video=$uploader->getVideoToOoyala($_GET['success']);
	}
	

	if(isset($_POST['search'])) {
		
		$videos=$uploader->getSearch($_POST['search'], $_SESSION['ooyalaUser']['property']);
	} else { 
		
		$videos=$uploader->getVideosLocal(0,$_SESSION['ooyalaUser']['property']);
	}
	//echo "<pre>";
	//print_r($videos);

//Archivo de la login
require_once('view/upload/localVideos.php');
?>