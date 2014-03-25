<html>
<head>
	<link href="css/upload/style.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" media="all" href="css/upload/jsDatePick_ltr.css" />
	<script type="text/javascript" src="js/upload/jsDatePick.min.1.3.js"></script>
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

<table class="wrap">
     <tr><td align="center">
		 <?php include("view/upload/menu.php"); ?>
     </td></tr>
     <tr><td align="center">
	 <br/>
	 
 <?php if($success==1) { ?>
                    <br>
                        <div class="success">The <?php  echo $video['title']; ?> video has been edited</div>
                   <br>
                    <?php } ?>
<h1>Edit <span style="color:#971d1d"><?php echo $video['title'];?></span> Video</h1>
	<a href="videos/<?php echo $video['idvideo'];?>.mp4" target="_blank">
	<input type="button" value="Preview"></a>
	<span class="clippy" data-text="http://junkyard.mx/middleware/upload/videos/<?php echo $video['idvideo']; ?>.mp4"></span>

<table style="margin:20px 0px;">
	<form  method="post" enctype="multipart/form-data">
	<tr>
		<td colspan="2"><strong>Change Video</strong></td>
	</tr>
	<tr>
		<td><input type="file" name="archivo"></td>
		<td>
			<input type="hidden" name="type" value="updatevideo">
			<input type="hidden" name="idvideo" value="<?php echo $video['idvideo'];?>">
			<input type="submit" value="Change video">
		</td>
	</tr>
	</form>
</table>

<form  method="post" enctype="multipart/form-data">
<table class="table" style="margin:20px 0px;">
	<tr>
		<td><strong>Title:</strong></td>
		<td><input type="text" name="title" value="<?php echo $video['title']; ?>"></strong></td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td><textarea rows="4" name="description" cols="50"><?php echo $video['description']; ?></textarea>
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
				<option value="<?php echo $pid;?>" <?php if($pid==$video['player']){echo 'selected';}?>><?php echo $p;?>
				</option>			
				<?php } ?>
			</select>
		</td>
	</tr>	
	<tr>
		<td><strong>Expire:</td>
		<td><input type="text" name="expire" id="expire" value="<?php echo $video['expire']; ?>"></strong></td>
	</tr>	
	<tr>
		<td><strong>Label 1:</td>
		<td><select name="label1">
				<option value="c4c27d081ff84fc8b7353677907c41bc" <?php if($video['label1']=='c4c27d081ff84fc8b7353677907c41bc'){echo 'selected';}?>>News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed" <?php if($video['label1']=='7bedaacf886f46a9afe8515dc32321ed'){echo 'selected';}?>>Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae" <?php if($video['label1']=='476b257cc2cb4bfdb9ab73d00b309dae'){echo 'selected';}?>>Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6" <?php if($video['label1']=='c74feb4817444ef785e38d1d4aa886d6'){echo 'selected';}?>>Entertainment</option>	
		</select>
		</td>

	</tr>	
	<tr>
		<td><strong>Label 2:</td>
		<td><select name="label2">
				<option value="c4c27d081ff84fc8b7353677907c41bc" <?php if($video['label2']=='c4c27d081ff84fc8b7353677907c41bc'){echo 'selected';}?>>News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed" <?php if($video['label2']=='7bedaacf886f46a9afe8515dc32321ed'){echo 'selected';}?>>Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae" <?php if($video['label2']=='476b257cc2cb4bfdb9ab73d00b309dae'){echo 'selected';}?>>Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6" <?php if($video['label2']=='c74feb4817444ef785e38d1d4aa886d6'){echo 'selected';}?>>Entertainment</option>
			</select></td>
	</tr>	
	<tr>
		<td><strong>Label 3:</td>
		<td><select name="label3">
				<option value="c4c27d081ff84fc8b7353677907c41bc" <?php if($video['label3']=='c4c27d081ff84fc8b7353677907c41bc'){echo 'selected';}?>>News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed" <?php if($video['label3']=='7bedaacf886f46a9afe8515dc32321ed'){echo 'selected';}?>>Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae" <?php if($video['label3']=='476b257cc2cb4bfdb9ab73d00b309dae'){echo 'selected';}?>>Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6" <?php if($video['label3']=='c74feb4817444ef785e38d1d4aa886d6'){echo 'selected';}?>>Entertainment</option>
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

		<input type="hidden" name="type" value="videoinfoupdate">
		<input type="hidden" name="idvideo" value="<?php echo $video['idvideo'];?>">	<input type="hidden" name="id" value="<?php echo $video['id'];?>" >
		<input type="submit" value="Update">
</form>

</td></tr>
</table
</html>