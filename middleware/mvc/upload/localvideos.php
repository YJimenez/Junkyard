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

	<link href="style.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/swfobject.js" type="text/javascript"></script>
	<script src="js/jquery.clippy.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(document).ready(function()
		{
			/* Clippy location (hosted on Github) */
			var clippy_swf = "js/clippy.swf";

			/* Get all of this boring stuff out of the way... */
			$('#pastebin').click(function(evt)
			{
				$('#pastebin').removeClass('empty');
				$('#pastebin')[0].select();
				return false;
			});
			
			/* Set up the clippies! */
			$('.clippy').clippy({ clippy_path: clippy_swf });
			
			$('#change_me').keyup(function()
			{
				$('#change_this').html('').clippy({'text': $(this).val(), clippy_path: clippy_swf });
			}).keyup();
		});
	</script>
    </head>
 
    <body>
    
    <?php include("menu.php"); ?>
	 
        <table width="600px;">
        	<tr>
        	<td><h2>Local Videos</h2></td>
            <!-- <td>Sorted by</td>
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
            </td>-->
        </table>
 
        <section>		
	            <table class="table" cellpadding="8">
	            	<tr>
	            		<th>Title</th>
	            		<th>Description</th>
	            		<th>Local date uploaded</th>
	            		<th>Preview</th>
	            		<th>Edit</th>
	            		<th>Copy</th>
	            		<th>Authorize</th>
	            	</tr>
	            	<?php 
	            		while ($row= @ mysql_fetch_array($Results)){									
							$idvideo=$row['id'];
							$title=$row['title'];
							$description=$row['description'];
							$datelocal=$row['datelocal'];
							$status=$row['status'];
							
	$selectSQLinfo = "select * from videosinfo where idvideo=".$idvideo;
	$Resultsinfo = mysql_query($selectSQLinfo) or die(mysql_error());
	if($status!=1){						
	            	 ?>
		            		            	
			            	<tr>
			            		<td><?php echo $title ?></td>
			            		<td><?php echo $description ?></td>
			            		<td><?php echo $datelocal ?></td>
							    <td><a href="videos/<?php echo $idvideo;?>.mp4" target="_blank">
							    <input type="button" value="Preview"></a></td>
			            		<td><a href="videos.php?idvideo=<?php echo $idvideo;?>">
							    <input type="button" value="Edit"></a></td>
							    <td><span class="clippy" data-text="http://junkyard.mx/middleware/upload/videos/<?php echo $idvideo; ?>.mp4"></span></td>
							    
							    <td>
								 <?php while ($rowinfo= @ mysql_fetch_array($Resultsinfo)){
									$idinfo=$rowinfo['id'];
								?>
								<a href="up.php?&id=<?php echo $idinfo;?>">
							    <input type="button" value="Authorize">
							    </a>
							    <?php } ?>
							    </td>
			            	</tr>
		            	
	            	<?php } ?>
	            	</form>
       <?php } ?>  
          
        </section>
    </body> 
</html>
