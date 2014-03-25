<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_bd = "localhost";
$database_bd = "papmx_web";
$username_bd = "root";
$password_bd = "root";
$bd = mysql_connect($hostname_bd, $username_bd, $password_bd) or trigger_error(mysql_error(),E_USER_ERROR); 
?>