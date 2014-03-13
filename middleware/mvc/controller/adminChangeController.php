<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");
$middleware=new admin();
extract($_GET);

$middleware->change($id, $status, $change);
$middleware->redirect("?section=adminUsers", 0);

?>