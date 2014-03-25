<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_bd = "localhost";
$database_bd = "junkymx_ooyala";
$username_bd = "junkymx_junkymx";
$password_bd = "Jy@rd";
$bd = mysql_connect($hostname_bd, $username_bd, $password_bd) or trigger_error(mysql_error(),E_USER_ERROR); 
/* session_start();
if($_SESSION['session']==NULL){
	$_SESSION['session'] = date("Y-m-d H:i:s");
}*/
?>