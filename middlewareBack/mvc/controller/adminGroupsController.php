<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");

$middleware=new admin();

if($_POST){
	$errorName=0; //property error
	$success=0; //property added
	extract ($_POST);
	if(strlen($group_name)<1)
		$errorName=1;

	//if not error
	
	if(!$errorName) 
		$success=$middleware->addGroup($_POST);
	
}


$groups=$middleware->getGroups(0,1);

//Archivo 
require_once('view/admin/groups.php');
?>