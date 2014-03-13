<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");

$middleware=new admin();

if($_POST){
	$errorName=0; //property error
	$success=0; //property added
	extract ($_POST);
	if(strlen($property_name)<1)
		$errorName=1;

	//if not error
	
	if(!$errorName) 
		$success=$middleware->addProperty($_POST);
	
}
if(isset($_GET['propertyName'])) {
	$success=3;
	$propertyName=$_GET['propertyName'];
}

$properties=$middleware->getProperties();
$groups=$middleware->getGroups();

//Archivo 
require_once('view/admin/properties.php');
?>