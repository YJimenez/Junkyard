<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");
$middleware=new admin();
if(isset($_GET['id'])) {
	$id=$_GET['id'];
	switch ($_GET['type']) {
		case 'properties':
			$table="properties";
			$idCampo="idProperty";
			break;
	}
	$property=$middleware->getProperties($id);
	$middleware->delete($id, $idCampo, $table);
	$middleware->redirect('?section=adminProperties&propertyName='.$property[0]['property_name'],0);
}
?>