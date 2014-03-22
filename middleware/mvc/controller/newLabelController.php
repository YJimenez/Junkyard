<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");


	if($_POST) {
		$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");

		
		$titulo=$_POST['name'];
		$parameterslabel=array();
		$parameterslabel['name']=$titulo;


		//print_r($parameters);
		$results = $api->post("/v2/labels", $parameterslabel);

	}

	//echo "<pre>";
	//print_r($videos);

//Archivo de la login
require_once('view/upload/newLabel.php');
?>