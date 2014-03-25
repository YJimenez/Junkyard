<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");
$middleware=new admin();
extract($_GET);


if($change=="groups") {
	$middleware->changeGroupStatus($id, $status);
	$middleware->redirect("?section=adminGroups", 0);
}
else {
	$middleware->change($id, $status, $change);
	$middleware->redirect("?section=adminUsers", 0);
}
?>