<?php
if(isset($_GET['idCove'])&&isset($_GET['date'])) {
	header('Content-type: text/xml; charset="iso-8859-1"', true);
	$obj_token=new token();
	$token=$obj_token->getToken($_GET['idCove']);
	$bcove=new bcove($token[0]['token']);
	$xml=$bcove->getXML($_GET['date']);
	echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/"
     xmlns:dcterms="http://purl.org/dc/terms/"
     xmlns:fh="http://purl.org/syndication/history/1.0"
     xmlns:ooyala="http://www.ooyala.com/mrss/">   ';
	echo $xml;
	echo '</rss>';
}
?>