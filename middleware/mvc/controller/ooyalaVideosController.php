<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");


	$uploader=new upload();
	$videos=$uploader->getVideosToOoyala();

	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");


	if(isset($_GET['success'])) {
		extract($_GET);
		$video=$uploader->getVideoToOoyala($_GET['success']);
	}

	//echo "<pre>";
	//print_r($videos);

//Archivo de la login
require_once('view/upload/ooyalaVideos.php');
?>