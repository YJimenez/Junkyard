<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");


	$embed_code=$_GET['embed_code'];

	
	//key api, secret api
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$playlist=$api->get("/v2/playlists");
	$assets=$api->get("/v2/assets");

	//echo "<pre>";
	//print_r($videos);

//Archivo de la login
require_once('view/upload/newPlaylist.php');
?>