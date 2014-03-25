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
    </head>
 
    <body>
 
        <table width="500px;" >
        	<tr>
        	<td><h2><?php echo $title ?> video</h2></td>
        	</tr>
        </table>
 
        <section>
        	        
	            <table border="1" style="margin-bottom:20px;">
	            	<tr>
	            		<td>Prev Img</td>
	            		<td><i>this data will be get after upload</i></td>
	            	</tr>
	            	<tr>	
	            		<td>Title</td>
	            		<td><?php echo $title ?></td>
	            	</tr>
	            	<tr>	
	            		<td>Description</td>
	            		<td><?php echo $description ?></td>
	            	</tr>
	            	<tr>	
	            		<td>Video Length</td>
	            		<td><i>this data will be get after upload</i></td>
	            	</tr>
	            	<tr>	
	            		<td>Player Select</td>
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
	            		<td>Site Owner</td>
	            		<td><?php echo $siteowner ?></td>
	            	</tr>
	            	<tr>	
	            		<td>Video producer name</td>
	            		<td><?php echo $producer ?></td>
	            	</tr>
	            	<tr>	
	            		<td>Date uploaded local</td>
	            		<td><?php echo $datelocal ?></td>
	            	</tr>
	            	<tr>	
	            		<td>Date uploaded vendor</td>
	            		<td><?php if($datevendor!=null){echo $datevendor;}else{ echo '<i>this data will be get after upload</i>';} ?></td>
	            	</tr>
	            	<tr>	
	            		<td>Id</td>
	            		<td><?php echo $idvideo ?></td>
	            	</tr>
	            	<tr>	
	            		<td>Reference Id</td>
	            		<td><?php if($embed_code!=null){echo $embed_code;}else{ echo '<i>this data will be get after upload</i>';} ?></td>
	            	</tr>
	            </table> 
	    <input type="button" value="Index" onclick="window.location='index.php'">
	    <a href="videos/<?php echo $idvideo;?>.mp4" target="_blank">
		<input type="button" value="Preview"></a></td>
	    <a href="videos.php?idvideo=<?php echo $idvideo;?>" target="_blank">
		<input type="button" value="Edit"></a>
							             
        </section>
    </body> 
</html>
