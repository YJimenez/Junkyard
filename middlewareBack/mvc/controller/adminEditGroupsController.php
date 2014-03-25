<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");
$middleware=new admin();
if($_POST){
	$errorName=0; //property name error
	
	$success=0; //user added
	extract ($_POST);
	
	if(strlen($group_name)<1)
		$errorName=1;
	
	//if not error
	
	if(!$errorName) 
		$success=$middleware->editGroup($_POST);
	
}

$id=isset($_POST['id'])?$_POST['id']:$_GET['id'];

$group=$middleware->getGroups($id);
/*echo "<pre>";
print_r($properties);
echo "</pre>";
*/
//Archivo de la login
require_once('view/admin/editGroups.php');
?>