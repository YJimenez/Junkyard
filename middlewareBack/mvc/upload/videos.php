<?php 
	session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");

	require_once('Connections/bd.php');
	mysql_select_db($database_bd, $bd);
	
	include("OoyalaApi.php");
	//key api, secret api
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");
	$labels=$api->get("/v2/labels");	
	
	
	$idvideo=$_GET['idvideo'];
	
	$selectSQL = "select * from videos where id=".$idvideo;
	$Results = mysql_query($selectSQL) or die(mysql_error());
	while ($row= @ mysql_fetch_array($Results)){					

		$title=$row['title'];
		$description=$row['description'];
	}
	
	$selectSQL = "select * from videosinfo where idvideo=".$idvideo;
	$Results = mysql_query($selectSQL) or die(mysql_error());

	while ($row= @ mysql_fetch_array($Results)){					
		$id=$row['id'];
		$idvideo=$row['idvideo'];
		$playerid=$row['player'];
		$expire=$row['expire'];
		$label1=$row['label1'];
		$label2=$row['label2'];
		$label3=$row['label3'];
		$labelnew=$row['labelnew'];
		$embed_code=$row['embed_code'];	

	
?>


<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" media="all" href="js/jsDatePick_ltr.css" />
	<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
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
		
		window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"expire",
			dateFormat:"%Y-%m-%d",
			/*selectedDate:{				
				day:5,						
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
	</script>
</head>

<?php include("menu.php"); ?>
<br/>

<h1>Edit Video</h1>
	<a href="videos/<?php echo $idvideo;?>.mp4" target="_blank">
	<input type="button" value="Preview"></a>
	<span class="clippy" data-text="http://junkyard.mx/middleware/upload/videos/<?php echo $idvideo; ?>.mp4"></span>

<table style="margin:20px 0px;">
	<form action="videoupdate.php" method="post" enctype="multipart/form-data">
	<tr>
		<td colspan="2"><strong>Change Video</strong></td>
	</tr>
	<tr>
		<td><input type="file" name="archivo"></td>
		<td>
			<input type="hidden" name="type" value="updatevideo">
			<input type="hidden" name="idvideo" value="<?php echo $idvideo;?>">
			<input type="submit" value="Change video">
		</td>
	</tr>
	</form>
</table>

<form action="videoupdate.php" method="post" enctype="multipart/form-data">
<table class="table" style="margin:20px 0px;">
	<tr>
		<td><strong>Title:</strong></td>
		<td><input type="text" name="title" value="<?php echo $title; ?>"></strong></td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td><textarea rows="4" name="description" cols="50"><?php echo $description; ?></textarea>
		</td>
</table>


<table style="margin:20px 0px;" class="table" border="1" cellpadding="8" cellspacing="1">
	
	<tr>
		<td><strong>Player:</td>
		<td><select name="playerid">
				<?php foreach ($players->items as $value) { 
					$pid=$value->id;
					$p=$value->name;
				?>				
				<option value="<?php echo $pid;?>" <?php if($pid==$playerid){echo 'selected';}?>><?php echo $p;?>
				</option>			
				<?php } ?>
			</select>
		</td>
	</tr>	
	<tr>
		<td><strong>Expire:</td>
		<td><input type="text" name="expire" id="expire" value="<?php echo $expire; ?>"></strong></td>
	</tr>	
	<tr>
		<td><strong>Label 1:</td>
		<td><select name="label1">
				<option value="c4c27d081ff84fc8b7353677907c41bc" <?php if($label1=='c4c27d081ff84fc8b7353677907c41bc'){echo 'selected';}?>>News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed" <?php if($label1=='7bedaacf886f46a9afe8515dc32321ed'){echo 'selected';}?>>Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae" <?php if($label1=='476b257cc2cb4bfdb9ab73d00b309dae'){echo 'selected';}?>>Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6" <?php if($label1=='c74feb4817444ef785e38d1d4aa886d6'){echo 'selected';}?>>Entertainment</option>	
		</select>
		</td>

	</tr>	
	<tr>
		<td><strong>Label 2:</td>
		<td><select name="label2">
				<option value="c4c27d081ff84fc8b7353677907c41bc" <?php if($label2=='c4c27d081ff84fc8b7353677907c41bc'){echo 'selected';}?>>News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed" <?php if($label2=='7bedaacf886f46a9afe8515dc32321ed'){echo 'selected';}?>>Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae" <?php if($label2=='476b257cc2cb4bfdb9ab73d00b309dae'){echo 'selected';}?>>Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6" <?php if($label2=='c74feb4817444ef785e38d1d4aa886d6'){echo 'selected';}?>>Entertainment</option>
			</select></td>
	</tr>	
	<tr>
		<td><strong>Label 3:</td>
		<td><select name="label3">
				<option value="c4c27d081ff84fc8b7353677907c41bc" <?php if($label3=='c4c27d081ff84fc8b7353677907c41bc'){echo 'selected';}?>>News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed" <?php if($label3=='7bedaacf886f46a9afe8515dc32321ed'){echo 'selected';}?>>Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae" <?php if($label3=='476b257cc2cb4bfdb9ab73d00b309dae'){echo 'selected';}?>>Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6" <?php if($label3=='c74feb4817444ef785e38d1d4aa886d6'){echo 'selected';}?>>Entertainment</option>
				<?php /*	
					foreach($labels->items as $temporal) {				
					$label=$api->get("/v2/labels/".$temporal->id);
					$labelname=$label->name;
					$labelid=$label->id;
				?>			
				<option value="<?php echo $labelid;?>" <?php if($labelid==$label3){echo 'selected';}?>><?php echo $labelname;?>
				</option>			
				<?php } */?>
			</select></td>
		</tr>



</table>
<?php
	}
?>
		<input type="hidden" name="type" value="videoinfoupdate">
		<input type="hidden" name="idvideo" value="<?php echo $idvideo;?>">	<input type="hidden" name="id" value="<?php echo $id;?>" >
		<input type="submit" value="Update">
</form>

</html>









