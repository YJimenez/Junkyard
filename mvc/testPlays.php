<?php
//Archivo para incluir archivos de las clases
include('model/includes.php');

$syndicaster=new syndicaster();
echo "<pre>";
print_r($syndicaster->getPlays('6767523'));

?>