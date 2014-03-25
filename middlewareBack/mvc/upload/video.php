<?php
session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");

	require_once('Connections/bd.php');
	mysql_select_db($database_bd, $bd);
	$idvideo=$_GET['idvideo'];
	
	$selectvideosSQL = "select * from videos where id=".$idvideo;
	$Resultsvideos = mysql_query($selectvideosSQL) or die(mysql_error());

	while ($row= @ mysql_fetch_array($Resultsvideos)){									
		$idvideo=$row['id'];
		$title=$row['title'];
		$description=$row['description'];
		$producer=$row['producer'];
		$datelocal=	$row['datelocal']; 
		$datevendor=$row['datevendor'];
		$embed_code=$row['embed_code'];
	} 
	
?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <title><?php echo $title ?> video</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
 
    <body>
 
        <table width="500px;" >
        	<tr>
        	<td><h2><?php echo $title ?> video</h2></td>
        	<td><a href="videos/<?php echo $idvideo;?>.mp4" target="_blank"><input type="button" value="Preview"></a></td>
        	</tr>
        </table>
 
		
 
        <section>
        	        
	            <table style="margin-bottom:20px;" class="table" cellpadding="8px">
	            	<tr>
	            		<td><strong>Prev Img</strong></td>
	            		<td><i>this data will be get after upload</i></td>
	            	</tr>
	            	<tr>	
	            		<td><strong>Title</strong></td>
	            		<td><?php echo $title ?></strong></td>
	            	</tr>
	            	<tr>	
	            		<td><strong>Description</strong></td>
	            		<td><?php echo $description ?></td>
	            	</tr>
	            	<tr>	
	            		<td><strong>Video Length</strong></td>
	            		<td><i>this data will be get after upload</i></td>
	            	</tr>
	            	<tr>	
	            		<td><strong>Player Select</strong></td>
	            		<td><?php 
		            			$selectSQL = "select * from videosinfo where idvideo=".$idvideo;
								$Results = mysql_query($selectSQL) or die(mysql_error());
								while ($rowinfo= @ mysql_fetch_array($Results)){	
									echo $rowinfo['player'];
									echo '<br/>'; 
								}
							 ?>
						</td>
	            	</tr>
	            	<tr>	
	            		<td><strong>Site Owner</strong></td>
	            		<td><?php echo $siteowner ?></strong></td>
	            	</tr>
	            	<tr>	
	            		<td><strong>Video producer name</strong></td>
	            		<td><?php echo $producer ?></td>
	            	</tr>
	            	<tr>	
	            		<td><strong>Date uploaded local</strong></td>
	            		<td><?php echo $datelocal ?></td>
	            	</tr>
	            	<tr>	
	            		<td><strong>Date uploaded vendor</strong></td>
	            		<td><?php if($datevendor!=null){echo $datevendor;}else{ echo '<i>this data will be get after upload</i>';} ?></td>
	            	</tr>
	            	<tr>	
	            		<td><strong>Id</strong></td>
	            		<td><?php echo $idvideo ?></td>
	            	</tr>
	            	<tr>	
	            		<td><strong>Reference Id</strong></td>
	            		<td><?php if($embed_code!=null){echo $embed_code;}else{ echo '<i>this data will be get after upload</i>';} ?></td>
	            	</tr>
	            </table> 
	    <input type="button" value="Index" onclick="window.location='index.php'">
	    <input type="button" onclick="window.location='videoplayers.php?idvideo=<?php echo $idvideo;?>'" value="View player and labels">
		<a href="videos.php?idvideo=<?php echo $idvideo;?>"><input type="button" value="Edit"></a>
							             
        </section>
    </body> 
</html>
