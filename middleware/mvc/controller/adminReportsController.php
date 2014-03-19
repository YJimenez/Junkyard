<?php

if(!isset($_SESSION['ooyalaAdmin']))
header("Location: admin.php?section=adminLogin");

//Archivo 
require_once('view/admin/reports.php');
?>