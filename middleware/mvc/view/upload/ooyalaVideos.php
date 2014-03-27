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
	 <link href="css/multiple-select.css" rel="stylesheet"/>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/upload/main.js" type="text/javascript"></script>
	<script src="js/jquery.colorbox-min.js" type="text/javascript"></script>

	 <script src="js/jquery.multiple.select.js"></script>
   									
    </head>
 
    <body>
    
    <table class="wrap">
     <tr><td align="center">
		 <?php include("view/upload/menu.php"); ?>
     </td></tr>
     <tr><td>
	 <br/>
	 
        <table width="100%;" style="margin-bottom:10px;">
        	<form action="" method="post">
	        	<tr>
		        	<td rowspan="2" width="76%;"><h2>Videos in Ooyala</h2></td>
		            <td><input type="submit" value="search"></td>
		            <td><input type="text" name="search" id="search" value="<?php  if(isset($_POST['search'])!=NULL){echo $_POST['search'];}?>"></td>
	        	</tr>
        	</form>
        	<!--<tr>
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
        	</tr>-->
        </table>
 
        <section>		
	            <table class="table" cellpadding="8" width="100%;">
	            	<tr>
	            		<th>Title</th>
	            		<th>Description</th>
	            		<th width="220px">Ooyala date uploaded</th>
	            		<th>Select Player</th>
	            		<th>Select Playlists</th>
	            		<th>Preview</th>
	            		<?php if($_SESSION['ooyalaUser']['admin']||$_SESSION['ooyalaUser']['profile']==1) { ?>
	            		<th>Edit</th>
	            		<?php } ?>
	            		<th>Embed code</th>
	            		<?php if($_SESSION['ooyalaUser']['admin']||$_SESSION['ooyalaUser']['profile']==1) { ?>
	            		<th>Share</th>
	            		<?php } ?>
	            	</tr>
	            	<?php 
		            	if ($videos == NULL){
			        ?>	
			        <tr>
	            		<th class="errorS" colspan="8">Videos not found</th>
	            	</tr>		        
                   <?php
		            	}else{ 
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
								<td><select  multiple="multiple" id="playlists<?php echo $i; ?>">
										<?php foreach ($plists->items as $value) { 
											$pid=$value->id;
											$p=$value->name;
										?>				
										<option value="<?php echo $pid;?>"  <?php if($pid==$player){echo 'selected';}?> ><?php echo $p;?>
										</option>			
										<?php } ?>
									</select>
									<script>						
								        $('#playlists'+<?php echo $i; ?>).multipleSelect();
									</script>
									<input type="hidden" value="<?php echo $embed_code; ?>" name="embed_code" id="embed_code<?php echo $i; ?>">
								</td>	
								<td><input type="submit" value="Preview"></a></td>
</form>	    
			            		<?php if($_SESSION['ooyalaUser']['admin']||$_SESSION['ooyalaUser']['profile']==1) { ?>
			            		<td><a href="?section=editOoyala&embed_code=<?php echo $embed_code;?>">
							    <input type="button" value="Edit"></a></td>
							   
							    <?php } ?>
							    <td align="center"><input type="button" value="Get Embed Code" onclick="call_cbox(<?php echo $i; ?>);"></td>
							    <?php if($_SESSION['ooyalaUser']['admin']||$_SESSION['ooyalaUser']['profile']==1) { ?>
							     <td><a href="?section=shareVideo&idVideo=<?php echo $idvideo; ?>">
							    	<input type="button" value="Share"></a>
								</td>
								<?php } ?>
			            	</tr>
								
	            	<?php $i++;}} ?>
	            	
					</table>

					<?php if($sharedVideos) { ?>
					

					 <table width="100%;" style="margin-bottom:10px;">
        	<form action="" method="post">
	        	<tr>
		        	<td rowspan="2" width="76%;"><h2>Shared Videos</h2></td>
		           
	        	</tr>
        	</form>
        	<!--<tr>
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
        	</tr>-->
        </table>
 
        <section>		
	            <table class="table" cellpadding="8" width="100%;">
	            	<tr>
	            		<th>Title</th>
	            		<th>Description</th>
	            		<th width="220px">Ooyala date uploaded</th>
	            		<th>Select Player</th>
	            		<th>Select Playlists</th>
	            		<th>Preview</th>
	            		
	            		<th>Embed code</th>
	            		
	            	</tr>
	            	<?php 
		            	if ($sharedVideos == NULL){
			        ?>	
			        <tr>
	            		<th class="errorS" colspan="8">Videos not found</th>
	            	</tr>		        
                   <?php
		            	}else{ 
	            		
	            		foreach($sharedVideos as $video) {									
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
								<td><select  multiple="multiple" id="playlists<?php echo $i; ?>">
										<?php foreach ($plists->items as $value) { 
											$pid=$value->id;
											$p=$value->name;
										?>				
										<option value="<?php echo $pid;?>"  <?php if($pid==$player){echo 'selected';}?> ><?php echo $p;?>
										</option>			
										<?php } ?>
									</select>
									<script>						
								        $('#playlists'+<?php echo $i; ?>).multipleSelect();
									</script>
									<input type="hidden" value="<?php echo $embed_code; ?>" name="embed_code" id="embed_code<?php echo $i; ?>">
								</td>	
								<td><input type="submit" value="Preview"></a></td>
</form>	    
			            		
							    <td align="center"><input type="button" value="Get Embed Code" onclick="call_cbox(<?php echo $i; ?>);"></td>
							    
			            	</tr>
								
	            	<?php $i++;}} ?>
	            	
					</table>

					<?php } ?>
          
        </section>
        
    </body> 
    
</html>
