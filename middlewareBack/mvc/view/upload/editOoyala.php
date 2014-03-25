<!DOCTYPE HTML>
<html>
<head>
	<link href="css/upload/style.css" rel="stylesheet" type="text/css" />
	<script>
		<?php if(isset($_GET['up'])==1){ ?>
			alert('The video has been changed, wait a few minutes while it is processed.');
		<?php } ?>
	</script>
</head>
	<body>
	<?php include("menu.php"); ?>
	<br/>
 <?php if($success==1) { ?>
                    <br>
                        <div class="success">The <?php  echo $asset->name; ?> video has been edited</div>
                   <br>
                    <?php } ?>
	

	
	<form  method="post" enctype="multipart/form-data"> 
		<table border="1" cellpadding="5" cellspacing="0">			
			<tr>
				<td colspan="3">Change Video with same embed code</td>
			<tr>
			<tr>
				<td>File</td>
	            <td>
	            	<input type="hidden" value="<?php echo $asset->embed_code ?>" name="embed_code">
	            	<input type="hidden" value="video" name="type">
	            	<input type="file" name="archive" id="archive">
	            </td>
	            <td><input type="submit" value="Change video"></td>
			<tr>
			
			<tr>
				<td><strong>Name<strong></td>
				<td><?php echo $asset->name ?></td>
				<td></td>
			</tr>
			<tr>
				<td><strong>Preview_image<strong></td>
	            <td><img src="<?php echo $asset->preview_image_url?>" width="100"></td>
	            <td></td>
			</tr>
		</table>
	</form>
	<br/>
	</body>
</html>
