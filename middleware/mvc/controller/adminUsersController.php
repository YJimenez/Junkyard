<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");
$middleware=new admin();
if($_POST){
	$errorName=0; //username error
	$errorPass=0; //pass blank error
	$errorPassC=0; //pass match error
	$success=0; //user added
	extract ($_POST);
	if(strlen($username)<3)
		$errorName=1;
	if(strlen($password)<3)
		$errorPass=1;
	if($password!=$password2)
		$errorPassC=1;
	//if not error
	
	if(!$errorName&&!$errorPass&&!$errorPassC) 
		$success=$middleware->addUser($_POST);
	
}


$users=$middleware->getUsers();
$profiles=$middleware->getProfiles();
$properties=$middleware->getProperties();
/*echo "<pre>";
print_r($users);
echo "</pre>";
*/
//Archivo de la login
require_once('view/admin/users.php');
?>