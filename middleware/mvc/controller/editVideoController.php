<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");
	$uploader=new upload();
	if($_POST) {
		$success=$uploader->uploadVideo($_POST, $_FILES);
	}
	
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");
	$labels=$api->get("/v2/labels");		
		
	
	$idvideo=isset($_GET['idvideo'])?$_GET['idvideo']:$_POST['idvideo'];
	$video=$uploader->getVideosLocal($idvideo);
	$video=$video[0];


//Archivo de la login
require_once('view/upload/editVideo.php');
?>