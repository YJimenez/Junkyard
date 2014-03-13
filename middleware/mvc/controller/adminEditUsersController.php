<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");
$middleware=new admin();
if($_POST){
	$errorPass=0; //pass blank error
	$errorPassC=0; //pass match error
	$success=0; //user added
	extract ($_POST);
	
	if(strlen($password)>0&&strlen($password)<3)
		$errorPass=1;
	if($password!=$password2)
		$errorPassC=1;
	//if not error
	
	if(!$errorPass&&!$errorPassC) 
		$success=$middleware->editUser($_POST);
	
}

$id=isset($_POST['id'])?$_POST['id']:$_GET['id'];

$user=$middleware->getUsers($id);
$profiles=$middleware->getProfiles();
$properties=$middleware->getProperties();
/*echo "<pre>";
print_r($user);
echo "</pre>";
*/
//Archivo de la login
require_once('view/admin/editUsers.php');
?>