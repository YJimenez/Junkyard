<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");

unset($_SESSION['ooyala']);


//Archivo de la login
require_once('view/home/home.php');
?>