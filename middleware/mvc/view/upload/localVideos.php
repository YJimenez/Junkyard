<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <title>Local Videos</title>
       
	<link href="css/upload/style.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/upload/swfobject.js" type="text/javascript"></script>
	<script src="js/upload/jquery.clippy.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(document).ready(function()
		{
			/* Clippy location (hosted on Github) */
			var clippy_swf = "js/upload/clippy.swf";

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
    
    <table class="wrap">
     <tr><td align="center">
		 <?php include("view/upload/menu.php"); ?>
     </td></tr>
     <tr><td>
	 <br/>
	 				<?php if($success) { ?>
                    <br>
                        <div class="success">The <?php  echo $video[0]['title']; ?> video has been uploaded to ooyala</div>
                   <br>
                    <?php } ?>


        <table width="100%;" style="margin-bottom:30px;">
        	<form action="" method="post">
	        	<tr>
		        	<td rowspan="2" width="76%;"><h2>Local Videos</h2></td>
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
	            		<th>Local date uploaded</th>
	            		<th>Preview</th>
	            		<?php if($_SESSION['ooyalaUser']['admin']) { ?>
	            		<th>Edit</th>
	            		<?php } ?>
	            		<th>Copy</th>
	            		<th>Upload to vendor</th>
	            	</tr>
	            	<?php 
		            	if ($videos == NULL){
			        ?>	
			        <tr>
	            		<th class="errorS" colspan="7">Videos not found</th>
	            	</tr>		        
                   <?php
		            	}else{
		            		foreach($videos as $video) {								
							if($video['status']!=1){						
	            	 ?>
		            		            	
			            	<tr>
			            		<td><?php echo $video['title'] ?></td>
			            		<td><?php echo $video['description'] ?></td>
			            		<td><?php echo $video['datelocal'] ?></td>
							    <td><a href="videos/<?php echo $video['id'];?>.mp4" target="_blank">
							    <input type="button" value="Preview"></a></td>
			            		<?php if($_SESSION['ooyalaUser']['admin']) { ?>
			            		<td><a href="?section=editVideo&idvideo=<?php echo $video['id'];?>">
							    <input type="button" value="Edit"></a></td>
							    <?php } ?>
							    <td><span class="clippy" data-text="http://junkyard.mx/middleware/upload/videos/<?php echo $video['id']; ?>.mp4"></span></td>
							    
							    <td>
								 
								<a href="?section=auth&id=<?php echo $video['idInfo'];?>">
							    <input type="button" value="Upload">
							    </a>
							    
							    </td>
			            	</tr>
		            	
	            	<?php }}} ?>

	            	</form> 
          
        </section>
        </td></tr>
       </table>
    </body> 
</html>
