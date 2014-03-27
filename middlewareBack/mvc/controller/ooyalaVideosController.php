<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");

$permiso=new permisos();
if(!$permiso->vPermiso("1,3", $_SESSION['ooyalaUser']['profile'])&&!$_SESSION['ooyalaUser']['admin']) {
		echo "You don't have privileges to access this section";
		$permiso->redirige("?section=home",3);
		exit();
	}

	
	$uploader=new upload();
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");
	$plists=$api->get("/v2/playlists");

	if(isset($_GET['success'])) {
		extract($_GET);
		$video=$uploader->getVideoToOoyala($_GET['success']);
	}

	if(isset($_POST['search'])) {
		
		$videos=$uploader->getSearchOoyala($_POST['search'], $_SESSION['ooyalaUser']['property']);
	} else { 
		
		$videos=$uploader->getVideosToOoyala($_SESSION['ooyalaUser']['property']);
	}

	$sharedVideos=$uploader->getSharedVideos($_SESSION['ooyalaUser']['property']);

//Archivo de la login
require_once('view/upload/ooyalaVideos.php');
?>