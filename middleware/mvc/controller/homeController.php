<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");

//profiles
if($_SESSION['ooyalaUser']['profile']=='3'&&$_SESSION['ooyalaUser']['admin']==0)
	header("Location: index.php?section=ooyalaVideos");
else if($_SESSION['ooyalaUser']['profile']!='1'&&$_SESSION['ooyalaUser']['admin']==0)
	header("Location: index.php?section=localVideos");



if($_POST){
	$uploader=new upload();
	if($uploader->uploadVideoLocal($_POST, $_SESSION['ooyalaUser']['property'], $_SESSION['ooyalaUser']['idlogin']))
		$success=1;
}

	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");

//Archivo de la login
require_once('view/upload/home.php');
?>