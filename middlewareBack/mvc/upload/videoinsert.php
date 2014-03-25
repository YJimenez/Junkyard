<?php 
session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");

//if(isset($_POST['title'])!=NULL){
	
	require_once('Connections/bd.php');
	mysql_select_db($database_bd, $bd);



		$type=$_POST['type'];
		$title=$_POST['titlename'];
		$description=$_POST['description'];
		$owner=$_POST['owner'];
		$producer=$_POST['producer'];
		$playerid=$_POST['playerid'];
		$player=$_POST['player'];
		$expire=$_POST['expire'];
		$label1=$_POST['label1'];
		$label2=$_POST['label2'];
		$label3=$_POST['label3'];
		$labelnew=$_POST['labelnew'];
		


if($type=='newvideo'){
		$file= $_FILES['archive']['tmp_name'];
		$size=$_FILES['archive']['size'];
		$name=$_FILES['archive']['name'];

		$insertvSQL = "INSERT INTO videos (file_size, name, tmp_name, title, description, owner, producer, datelocal) VALUES ('".$size."','".$name."','".$file."','".$title."','".$description."','".$owner."','".$producer."','".date('Y-m-d H:i:s')."')";
		$Resultv = mysql_query($insertvSQL) or die(mysql_error());
		$idvideo = mysql_insert_id();
		move_uploaded_file($file,"videos/". $idvideo.".mp4");


	

}else{
		$idvideo = $_POST['idvideo'];
}

		
		$insertSQL = "INSERT INTO videosinfo (idvideo, player, expire, label1, label2, label3, labelnew) VALUES ('".$idvideo."','".$playerid."','".$expire."','".$label1."','".$label2."','".$label3."','".$labelnew."')";
		$Result = mysql_query($insertSQL) or die(mysql_error());
		$id = mysql_insert_id();

	    	 

		header('Location: videos.php?idvideo='.$idvideo);

