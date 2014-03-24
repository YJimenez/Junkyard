<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");

if($_POST){
	$uploader=new upload();
	if($uploader->uploadVideoLocal($_POST, $_SESSION['ooyalaUser']['property']))
		$success=1;
}

	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");

//Archivo de la login
require_once('view/upload/home.php');
?>