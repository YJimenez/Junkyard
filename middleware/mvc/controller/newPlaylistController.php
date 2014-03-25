<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");


	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$playlist=$api->get("/v2/playlists");
	$assets=$api->get("/v2/assets");
	
	$videosplaylist=new playlist();
	$videos=$videosplaylist->getVideos();
	
	if($_POST) {

		$titulo=$_POST['name'];
		$option = $_POST['option'];
		
		$parameters=array();
		$parameters['type']="movie";
		$parameters['name']=$titulo;
		$parameters['items']=$option;	


		//print_r($parameters);
		$results = $api->post("/v2/playlists", $parameters);
		
	}


//Archivo de la login
require_once('view/upload/newPlaylist.php');
?>