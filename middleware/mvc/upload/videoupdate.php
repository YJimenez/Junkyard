<?php 
session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");

//if(isset($_POST['title'])!=NULL){
	
	require_once('Connections/bd.php');
	mysql_select_db($database_bd, $bd);

						
		$idvideo=$_POST['idvideo'];
		$type=$_POST['type'];
		$title=$_POST['title'];
		$description=$_POST['description'];
		$playerid=$_POST['playerid'];
		$player=$_POST['player'];
		$expire=$_POST['expire'];
		$label1=$_POST['label1'];
		$label2=$_POST['label2'];
		$label3=$_POST['label3'];
		$labelnew=$_POST['labelnew'];

		
if($type=="videoinfoupdate"){


		$updateSQL = "UPDATE videos SET title='".$title."', description='".$description."' WHERE id='".$idvideo."'";
		$Results = mysql_query($updateSQL) or die(mysql_error());
		

		$id=$_POST['id'];
		$idvideo=$_POST['idvideo'];
				
		$updateSQL = "UPDATE videosinfo SET player='".$_POST['playerid']."', expire='".$_POST['expire']."', label1='".$_POST['label1']."', label2='".$_POST['label2']."', label3='".$_POST['label3']."', labelnew='".$_POST['labelnew']."' WHERE id='".$_POST['id']."'";
		$Results = mysql_query($updateSQL) or die(mysql_error());
	
		echo "<script language='javascript'>alert('The video has been modified');</script>";
		
		
		
	
}else if($type=="updatevideo"){	

	 $idvideo=$_POST['idvideo'];
	 $file=$_FILES['archivo']['tmp_name'];
	 $size=$_FILES['archivo']['size'];
	 $name=$_FILES['archivo']['name'];
	 
	 $updateSQL = "UPDATE videos SET file_size='".$size."', name='".$name."' WHERE id='".$idvideo."'";
	 $Results = mysql_query($updateSQL) or die(mysql_error());
	 
	 
	 $myFile = "videos/".$idvideo.".mp4";
	 if($myFile)
	 unlink($myFile);
	 
	 move_uploaded_file($file,"videos/". $idvideo.".mp4");
	 
	 echo "<script language='javascript'>alert('The video has been changed');</script>";

}
	header('Location: videos.php?idvideo='.$idvideo);

?>











