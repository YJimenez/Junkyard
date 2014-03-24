<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");


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