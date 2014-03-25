<?php
session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");

	require_once('Connections/bd.php');
	mysql_select_db($database_bd, $bd);		


	$selectSQL = "select * from videos";
	$Results = mysql_query($selectSQL) or die(mysql_error());
	
	include("OoyalaApi.php");
	//key api, secret api
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");
	
?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <title>Ooyala Videos</title>
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
        </table>
 
        <section>		
	            <table class="table" cellpadding="8">
	            	<tr>
	            		<th>Title</th>
	            		<th>Description</th>
	            		<th>Ooyala date uploaded</th>
	            		<th>Select Player</th>
	            		<th>Preview</th>
	            		<th>Edit</th>
	            		<th>Copy code</th>
	            	</tr>
	            	<?php 
	            		while ($row= @ mysql_fetch_array($Results)){									
							$idvideo=$row['id'];
							$title=$row['title'];
							$description=$row['description'];
							$dateooyala=$row['datevendor'];
							$embed_code=$row['embed_code'];
							$status=$row['status'];
							
						$selectSQLinfo = "select * from videosinfo where idvideo=".$idvideo;
						$Resultsinfo = mysql_query($selectSQLinfo) or die(mysql_error());
						if($status==1){	
							$rowinfo= @ mysql_fetch_array($Resultsinfo);
							$player=$rowinfo['player'];				
	            	 ?>
		            		            	
			            	<tr>
			            		<td><?php echo $title ?></td>
			            		<td><?php echo $description ?></td>
			            		<td><?php echo $dateooyala ?></td>
<form method="get" action="preview.php" target="_blank">
			            		<td><select name="playerid" id="playerid">
										<?php foreach ($players->items as $value) { 
											$pid=$value->id;
											$p=$value->name;
										?>				
										<option value="<?php echo $pid;?>" <?php if($pid==$player){echo 'selected';}?>><?php echo $p;?>
										</option>			
										<?php } ?>
									</select>
								</td>
								<input type="hidden" value="<?php echo $embed_code; ?>" name="embed_code">
							    <td><input type="submit" value="Preview"></a></td>
</form>	    
			            		<td><a href="videoeditooyala.php?embed_code=<?php echo $embed_code;?>">
							    <input type="button" value="Edit"></a></td>
							    <td><span class="clippy" data-text="<?php echo $embed_code; ?>"></span></td>
			            	</tr>
		            	
	            	<?php } ?>
	            	</form>
       <?php } ?>  
          
        </section>
    </body> 
</html>
