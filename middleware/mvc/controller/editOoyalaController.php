<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");


	$embed_code=$_GET['embed_code'];

	
	//key api, secret api
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$asset = $api->get("/v2/assets/".$embed_code);	
	$passet=$asset->player_id;
	
	$lasset = $api->get("/v2/assets/".$embed_code."/labels");
	$players=$api->get("players");
	$labels=$api->get("/v2/labels");

	$uploader=new upload();

	if($_POST) {
		$success=$uploader->editVideoOoyala($_POST, $_FILES);
	}

	//echo "<pre>";
	//print_r($videos);

//Archivo de la login
require_once('view/upload/editOoyala.php');
?>