<?php
$jsArr = array();
function __autoload($class_name) {
    require_once ''.$class_name . 'Model.php';   
}
?>