<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");
	$uploader=new upload();
	if($uploader->uploadOoyala($_GET['id']))
		$uploader->redirect("?section=localVideos&success=".$_GET['id'],0);
?>