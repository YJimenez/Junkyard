<!DOCTYPE html>
<html>
<head>
	<link href="css/upload/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/upload/jsDatePick_ltr.css" />
	<script type="text/javascript" src="js/upload/jsDatePick.min.1.3.js"></script>
	<script type="text/javascript" src="js/upload/main.js"></script>

	<script type="text/javascript">
		window.onload = function(){
			new JsDatePick({
				useMode:2,
				target:"expire",
				dateFormat:"%Y-%m-%d",
			});
		};
	</script>
</head>
<body>

	<table class="wrap">
     <tr><td align="center">
		 <?php include("view/upload/menu.php"); ?>
     </td></tr>
     </table>
	 <br/>
	
	 				<?php if($success==1) { ?>
                    <br>
                        <div class="success">The <?php echo $_POST['titlename']; ?> video has been added</div>
					<br>
                    <?php } ?>

	<form  method="post" enctype="multipart/form-data" id="videoForm"> 	
		<h3>Video: Choose file to upload</h3>
		Video File: <input type="file" name="archive" id="archive">
		
		 
		<h3>Video Title</h3>
		
		Video Title: <input type="text" name="titlename" id="titlename">
		<p>Enter a title of the video. Viewers will be able to see this.</p>
		
		<h3>Video Description</h3>
		Video Description: <input type="text" name="description" id="description">
		<p>Enter a description of the video. Viewers will be able to see this.<p>
		
		<h3>Select A Player</h3>
			<select name="playerid">
				<?php foreach ($players->items as $value) { 
					$pid=$value->id;
					$p=$value->name;
				?>				
				<option value="<?php echo $pid;?>"><?php echo $p;?>
				</option>			
				<?php } ?>
			</select>
		
		<h3>Expire this video</h3>
		Total hours video should be live for <input type="text" name="expire" id="expire" readonly="readonly">
		 
		<h3>Select A Primary Category</h3>
			<select name="label1">
				<?php foreach($labels->items as $label) { ?>	
				<option value="<?php echo $label->id; ?>"><?php echo $label->name; ?></option>
			<?php } ?>
			</select>
		
		<h3>Select Additional Categories</h3>
			<select name="label2">
				<?php foreach($labels->items as $label) { ?>	
				<option value="<?php echo $label->id; ?>"><?php echo $label->name; ?></option>
			<?php } ?>
			</select>
		
		<h3>Select Additional Categories</h3>
			<select name="label3">
				<?php foreach($labels->items as $label) { ?>	
				<option value="<?php echo $label->id; ?>"><?php echo $label->name; ?></option>
			<?php } ?>
			</select>
		
		<h3>Create Category</h3>
		Create new category: <input type="text" name="labelnew"><br />
		
		
		<h3>Upload Video To Local server</h3>
		<input type="hidden" name="type" value="newvideo" >	
		<input type="button" value="Upload Video" onClick="validateVideo();">		
	</form>

</body>
</html>
