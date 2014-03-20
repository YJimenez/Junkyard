<?php
session_start();
foreach($_SESSION as $llave=>$valor) {
	if(is_array($_SESSION[$llave])) { 
  		echo $llave."-";
  		print_r($_SESSION[$llave]);
  		echo 	"<br>";
  	}
  	else
  		echo $llave."-".($_SESSION[$llave])."<br>";
	}
?>