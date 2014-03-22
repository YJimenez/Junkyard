<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <title>Ooyala Videos</title>
        <script>
        function find(valor){
					document.location.href='index.php?sorted='+valor;}
		</script>

	<link href="css/upload/style.css" rel="stylesheet" type="text/css" />
	<link href="css/colorbox.css" rel="stylesheet" type="text/css" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/upload/main.js" type="text/javascript"></script>
	<script src="js/jquery.colorbox-min.js" type="text/javascript"></script>

	
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
	            		<th>Embed code</th>
	            	</tr>
	            	<?php 
	            		$i=1;
	            		foreach($videos as $video) {									
							$idvideo=$video['idvideo'];
							$title=$video['title'];
							$description=$video['description'];
							$dateooyala=$video['datevendor'];
							$embed_code=$video['embed_code'];
							$status=$video['status'];
							
							$player=$video['player'];				
	            	 ?>
		            		            	
			            	<tr>
			            		<td><?php echo $title ?></td>
			            		<td><?php echo $description ?></td>
			            		<td><?php echo $dateooyala ?></td>
<form method="get" action="preview.php" target="_blank">
			            		<td><select name="playerid" id="playerid<?php echo $i; ?>">
										<?php foreach ($players->items as $value) { 
											$pid=$value->id;
											$p=$value->name;
										?>				
										<option value="<?php echo $pid;?>"  <?php if($pid==$player){echo 'selected';}?> ><?php echo $p;?>
										</option>			
										<?php } ?>
									</select>
								</td>
								<input type="hidden" value="<?php echo $embed_code; ?>" name="embed_code" id="embed_code<?php echo $i; ?>">
							    <td><input type="submit" value="Preview"></a></td>
</form>	    
			            		<td><a href="?section=editOoyala&embed_code=<?php echo $embed_code;?>">
							    <input type="button" value="Edit"></a></td>
							    <td align="center"><input type="button" value="Get Embed Code" onclick="call_cbox(<?php echo $i; ?>);"></td>
			            	</tr>
		            	
	            	<?php
	            	$i++;
	            	 } ?>
	            	</form>
    </table>
          
        </section>
    </body> 
    
</html>
