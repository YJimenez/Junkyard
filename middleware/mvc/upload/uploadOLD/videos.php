<?php 
	session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");

	require_once('Connections/bd.php');
	mysql_select_db($database_bd, $bd);
	
	$idvideo=$_GET['idvideo'];
	
	$selectSQL = "select * from videos where id=".$idvideo;
	$Results = mysql_query($selectSQL) or die(mysql_error());
	while ($row= @ mysql_fetch_array($Results)){					

		$title=$row['title'];
		$description=$row['description'];
	}

	include("OoyalaApi.php");
	//key api, secret api
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");
	$labels=$api->get("/v2/labels");	
?>


<h1>Edit Video</h1>
	<a href="videos/<?php echo $idvideo;?>.mp4" target="_blank">
		<input type="button" value="Preview">
	</a><br/>
<input type="text" value="http://junkyard.mx/ooyala/upload/videos/<?php echo $idvideo; ?>.mp4">

<table style="margin:20px 0px;">
	<form action="videoupdate.php" method="post" enctype="multipart/form-data">
	<tr>
		<td colspan="2"><strong>Change Video</strong></td>
	</tr>
	<tr>
		<td><input type="file" name="archivo"></td>
		<td>
			<input type="hidden" name="type" value="updatevideo">
			<input type="hidden" name="idvideo" value="<?php echo $idvideo;?>">
			<input type="submit" value="Change video">
		</td>
	</tr>
	</form>
</table>

<table>
<form action="videoupdate.php" method="post" enctype="multipart/form-data">
	<tr>
		<td><strong>Title:</strong></td>
		<td><input type="text" name="title" value="<?php echo $title; ?>"></strong></td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td><textarea rows="4" name="description" cols="50"><?php echo $description; ?></textarea>
		</td>
	<tr>
		<td><input type="button" value="Index" onclick="window.location='index.php'"></td>
		<td>
			<input type="hidden" name="type" value="videoinfoupdate">
			<input type="hidden" name="idvideo" value="<?php echo $idvideo;?>">	
			<input type="submit" value="Update">
			<input type="button" onclick="window.location='videoplayers.php?idvideo=<?php echo $idvideo;?>'" value="View player and labels">			
		</td>
	</tr>
</form>
</table>













