<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");

if($_POST) {
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	
	
	/*if($_POST['begin']==NULL or $_POST['expire']==NULL) {	
		$parameters = array("where" => "name INCLUDES '$search' or description INCLUDES '$search'");	
		$assets = $api->get("/v2/assets", $parameters);
		echo 'test';
			
	}else*/
	$page=isset($_GET['page'])?$_GET['page']:0;
	 if($_POST['nexttoken']){
		//saving the prev page in a session
		$_SESSION['prevPage'][$page]=$_POST['nexttoken'];
		$beginmonth = $_POST['begin'];
		$currentdate = $_POST['expire'];
		$nexttoken=$_POST['nexttoken'];
		

		$parameters=array();
		$parameters['page_token']=$nexttoken;
		
		$assets=$api->get("/v2/analytics/reports/account/performance/videos/$beginmonth...$currentdate", $parameters);	

	
	}
	else if($_POST['prevPage']) {
		$beginmonth = $_POST['begin'];
		$currentdate = $_POST['expire'];
		$nexttoken=$_SESSION['prevPage'][$_POST['prevPage']];
		
		$parameters=array();
		$parameters['page_token']=$nexttoken;
		
		$assets=$api->get("/v2/analytics/reports/account/performance/videos/$beginmonth...$currentdate", $parameters);	
	
	}
	else{
		unset($_SESSION['prevPage']);
		$beginmonth = $_POST['begin'];
		$currentdate = $_POST['expire'];
		$search=$_POST['search'];
		$parameters = array("where" => "name INCLUDES 'denver'");	
		$assets=$api->get("/v2/analytics/reports/account/performance/videos/$beginmonth...$currentdate", $parameters);	
	}
	
	

	
}

//Archivo 
require_once('view/admin/reports.php');
?>