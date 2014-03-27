<!DOCTYPE HTML>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <title>Share Video</title>
       
	<link href="css/upload/style.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	
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
                        <div class="success">The <?php  echo $video['title']; ?> video has been shared</div>
                   <br>
                    <?php } ?>


        <table width="100%;" style="margin-bottom:30px;">
        	
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
	            <form action="" method="post">
	            <table class="table" cellpadding="8" width="100%;">
	            	<tr>
	            		<td colspan="2">Share video: <?php echo $video['title']; ?></td>
	            	</tr>
	            	<tr>
	            		<th>Property</th>
	            		<th>Share</th>
	            		
	            	</tr>
	            	        
                   <?php
		            	
		            		foreach($properties as $property) {								
													
	            	 ?>
		            		            	
			            	<tr>
			            		<td><?php echo $property['property_name'] ?></td>
			            		<td><input type="checkbox" <?php if(@in_array($property['idProperty'], $sharedProperties)) echo 'checked="checked"'; ?> name="properties[]" value="<?php echo $property['idProperty'] ?>"></td>
			            		
			            	</tr>
		            	
	            	<?php } ?>
	            	<tr>
	            		<td colspan="2">
	            			<input type="hidden" name="idVideo" value="<?php echo $video['idvideo']; ?>">
	            			<input type="submit">
	            		</td>
	            	</tr>

	            </form> 
          
        </section>
        </td></tr>
       </table>
    </body> 
</html>
