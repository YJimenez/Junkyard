<?php
session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");

	include("OoyalaApi.php");
	//key api, secret api
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");
?>
<!DOCTYPE html>
<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" media="all" href="js/jsDatePick_ltr.css" />
	<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
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

	<?php include("menu.php"); ?>
	<br/>

	<form action="videoinsert.php" method="post" enctype="multipart/form-data"> 	
		<h3>Video: Choose file to upload</h3>
		Video File: <input type="file" name="archive">
		
		 
		<h3>Video Title</h3>
		
		Video Title: <input type="text" name="titlename">
		<p>Enter a title of the video. Viewers will be able to see this.</p>
		
		<h3>Video Description</h3>
		Video Description: <input type="text" name="description">
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
		Total hours video should be live for <input type="text" name="expire" id="expire">
		 
		<h3>Select A Primary Category</h3>
			<select name="label1">
				<option value="c4c27d081ff84fc8b7353677907c41bc">News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed">Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae">Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6">Entertainment</option>
			</select>
		
		<h3>Select Additional Categories</h3>
			<select name="label2">
				<option value="c4c27d081ff84fc8b7353677907c41bc">News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed">Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae">Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6">Entertainment</option>
			</select>
		
		<h3>Select Additional Categories</h3>
			<select name="label3">
				<option value="c4c27d081ff84fc8b7353677907c41bc">News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed">Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae">Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6">Entertainment</option>
			</select>
		
		<h3>Create Category</h3>
		Create new category: <input type="text" name="labelnew"><br />
		
		
		<h3>Upload Video To Local server</h3>
		<input type="hidden" name="type" value="newvideo" >	
		<input type="submit" value="Upload Video" onClick=																			                                            											"if(archive.value == ''){
                                            alert('File is required'); 
                                            archive.focus();
                                            return false;
                                            } else if(titlename.value == ''){
                                            alert('Title is required'); 
                                            titlename.focus();
                                            return false;                                                
                                            } else if(description.value == ''){
                                            alert('Description is required'); 
                                            description.focus();
                                            return false;
                                            }">		
	</form>


</body>
</html>
