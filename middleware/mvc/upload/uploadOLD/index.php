<?php
session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");

	require_once('Connections/bd.php');
	mysql_select_db($database_bd, $bd);		
	
	
	
	/*
	if($sorted=='local'){
			$selectSQL = "select * from videos where embed_code is null";
			$Results = mysql_query($selectSQL) or die(mysql_error());
			
		} else if($sorted=='ooyala'){
			$selectSQL = "select * from videos where embed_code is null";
			$Results = mysql_query($selectSQL) or die(mysql_error());
		
		} else if($sorted=='date'){
			$selectSQL = "select * from videos order by datelocal ASC";
			$Results = mysql_query($selectSQL) or die(mysql_error());
		
		} else if($sorted=='uploader'){
			$selectSQL = "select * from videos order by producer ASC";
			$Results = mysql_query($selectSQL) or die(mysql_error());
		
		} else if($sorted=='site'){
			$selectSQL = "select * from videos order by owner ASC";
			$Results = mysql_query($selectSQL) or die(mysql_error());
		
		} else if($sorted=='category'){
			$selectSQL = "select * from videos order by owner ASC";
			$Results = mysql_query($selectSQL) or die(mysql_error());
		
		}else {
			$selectSQL = "select * from videos";
			$Results = mysql_query($selectSQL) or die(mysql_error());
		}
	*/

	$selectSQL = "select * from videos";
	$Results = mysql_query($selectSQL) or die(mysql_error());
	
?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <title>Local Videos</title>
        <script>
        function find(valor){
					document.location.href='index.php?sorted='+valor;}
		</script>
    </head>
 
    <body>
 
        <table width="700px;">
        	<tr>
        	<td><h2>Local Videos</h2></td>
            <td><input type="button" value="Upload new video" onclick="window.location='upload.php'"></td>
            <td><input type="button" value="Create new label" onclick="window.location='newlabel.php'"></td>
            <td>Sorted by</td>
            <td>
	            <select id="sorted" onchange='find(this.value)'>
	            	<option value="all" <?php if($sorted=='all'){echo 'selected';}?>>All Videos</option>
	            	<option value="local" <?php if($sorted=='local'){echo 'selected';}?>>Only Local</option>
	            	<option value="ooyala" <?php if($sorted=='ooyala'){echo 'selected';}?>>Uploaded to Ooyala</option>
	            	<option value="date" <?php if($sorted=='date'){echo 'selected';}?>>By date</option>
	            	<option value="uploader" <?php if($sorted=='uploader'){echo 'selected';}?>>By Uploader</option>
	            	<option value="site" <?php if($sorted=='site'){echo 'selected';}?>>By Site</option>
	            	<option value="category" <?php if($sorted=='category'){echo 'selected';}?>>Category</option>
	            </select>
            </td>
        </table>
 
        <section>
        	        
	            <table border="1">
	            	<tr>
	            		<td>Prev Img</td>
	            		<td>Title</td>
	            		<td>Description</td>
	            		<td>Preview</td>
	            		<td>View Info</td>
	            		<td>Edit</td>
	            	</tr>
	            	<?php 
	            		while ($row= @ mysql_fetch_array($Results)){									
							$idvideo=$row['id'];
							$title=$row['title'];
							$description=$row['description'];
	            	 ?>
		            	<form method="get" action="video.php" enctype="multipart/form-data">		            	
			            	<tr>
			            		<td><img src="" width="100"></td>
			            		<td><?php echo $title ?></td>
			            		<td><?php echo $description ?></td>
							    <td><a href="videos/<?php echo $idvideo;?>.mp4" target="_blank">
							    <input type="button" value="Preview"></a></td>			     		
			            		<td><input type="hidden" name="idvideo" value="<?php echo $idvideo ?>">
			            			<input type="submit" value="View Info">
			            		</td>
			            		<td><a href="videos.php?idvideo=<?php echo $idvideo;?>">
							    <input type="button" value="Edit"></a></td>
			            	</tr>
		            	</form>
	            	<?php } ?>
	            </table>
          
        </section>
    </body> 
</html>
