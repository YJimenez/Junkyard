<?php 
	session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");

	require_once('Connections/bd.php');
	mysql_select_db($database_bd, $bd);
	
	$idvideo=$_GET['idvideo'];
	
	$selectvideoSQL = "select * from videos where id=".$idvideo;
	$Resultsvideo = mysql_query($selectvideoSQL) or die(mysql_error());
	while ($rowvideo= @ mysql_fetch_array($Resultsvideo)){					
		$title=$rowvideo['title'];
		$description=$rowvideo['description'];
	}
	
	$selectSQL = "select * from videosinfo where idvideo=".$idvideo;
	$Results = mysql_query($selectSQL) or die(mysql_error());


	include("OoyalaApi.php");
	//key api, secret api
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");
	$labels=$api->get("/v2/labels");	
?>
<html>
<head>
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

						
<h1>Video data</h1>
	<a href="videos/<?php echo $idvideo;?>.mp4" target="_blank">
		<input type="button" value="Preview"></a><br/>

		http://junkyard.mx/ooyala/upload/videos/<?php echo $idvideo; ?>.mp4
		<span class="clippy" data-text="http://junkyard.mx/ooyala/upload/videos/<?php echo $idvideo; ?>.mp4"></span>
		

<table style="margin:20px 0px;">
	<tr>
		<td><strong>Title:</strong></td>
		<td><?php echo $title; ?></td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td><?php echo $description; ?></td>
	</tr>
</table>


<?php
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
<table style="margin:20px 0px;" class="table" border="1" cellpadding="8" cellspacing="1">

<form action="videoupdate.php" method="post">		
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
		<td></td>
	</tr>	
	<tr>
		<td><strong>Expire:</td>
		<td><input type="text" name="expire" value="<?php echo $expire; ?>"></strong></td>
		<td></td>
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
		<td>
		<?php
			if($embed_code==NULL){
			?>
			<input type="hidden" name="type" value="updateinfo">
			<input type="hidden" name="id" value="<?php echo $id;?>" >
			<input type="hidden" name="idvideo" value="<?php echo $idvideo;?>" >
			<input type="submit" value="Update">
		<?php
			}
		?>
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
		<td>
			<?php
				if($embed_code!=NULL){
			?>
			<input type="button" onclick="" value="Modify uploaded video">
			<?php
				}else{
			?>
			<input type="button" onclick="window.location='up.php?&id=<?php echo $id;?>'" value="Upload to Ooyala">
			<?php
				}
			?>
		</td>
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
		<td></td>
	</tr>
	<?php
		if($embed_code!=NULL){
	?>
	<tr>
		<td><strong>Embed_code:</td>
		<td><?php echo $embed_code; ?></td>
	</tr>	
	<tr>
		<td><strong>Preview in Ooyala:</td>
		<td><a href='http://www.junkyard.mx/ooyala/upload/preview.php?playerid=<?php echo $playerid;?>&embed_code=<?php echo $embed_code;?>' target='_blank'><input type="button" value="Preview"></a></td>
		<td rowspan="2"></td>
	</tr>	
	<?php
		}
	?>
</form>

</table>
<?php
	}
?>


<table>
	<tr>
		<td><input type="button" value="Index" onclick="window.location='index.php'"></td>
		<td><input type="button" onclick="window.location='embedgenerate.php?idvideo=<?php echo $idvideo;?>'" value="Generate new data">	</td>
	</tr>
</table>

</html>











