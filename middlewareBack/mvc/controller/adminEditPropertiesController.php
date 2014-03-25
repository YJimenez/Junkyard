<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");
$middleware=new admin();
if($_POST){
	$errorName=0; //property name error
	
	$success=0; //user added
	extract ($_POST);
	
	if(strlen($property_name)<1)
		$errorName=1;
	
	//if not error
	
	if(!$errorName) 
		$success=$middleware->editProperty($_POST);
	
}

$id=isset($_POST['id'])?$_POST['id']:$_GET['id'];

$property=$middleware->getProperties($id);
$groups=$middleware->getGroups();
/*echo "<pre>";
print_r($properties);
echo "</pre>";
*/
//Archivo de la login
require_once('view/admin/editProperties.php');
?>