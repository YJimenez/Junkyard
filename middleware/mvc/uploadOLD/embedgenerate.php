<?php 
	session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");

	require_once('Connections/bd.php');
	mysql_select_db($database_bd, $bd);
	
	$idvideo=$_GET['idvideo'];
	$title=$_GET['title'];
	$description=$_GET['description'];
	$selectSQL = "select * from videos where id=".$idvideo;
	$Results = mysql_query($selectSQL) or die(mysql_error());
	
	while ($row= @ mysql_fetch_array($Results)){
		$file=$row['file'];
		$size=$row['size'];
		$name=$row['file'];
		$title=$row['title'];
		$description=$row['description'];
	}
	
	include("OoyalaApi.php");
	//key api, secret api
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$players=$api->get("players");
	$labels=$api->get("/v2/labels");	
?>


<h1>Generate new data</h1>
	<a href="videos/<?php echo $idvideo;?>.mp4" target="_blank">
		<input type="button" value="Preview">
	</a><br/>

<table style="margin:20px 0px;">
	<tr>
		<td><strong>Title:</strong></td>
		<td><input type="hidden" name="title" value="<?php echo $title; ?>"><?php echo $title; ?></td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td><input type="hidden" name="description" value="<?php echo $description; ?>"><?php echo $description; ?></td>
	</tr>
</table>

<table style="margin:20px 0px;" border="1">
<form action="videoinsert.php" method="post">
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
			</select></td>
	</tr>	
	<tr>
		<td><strong>Expire:</td>
		<td><input type="text" name="expire"></strong></td>
	</tr>	
	<tr>
		<td><strong>Label 1:</td>
		<td><select name="label1">
				<option value="c4c27d081ff84fc8b7353677907c41bc">News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed">Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae">Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6">Entertainment</option>	
		</select>
		</td>
	</tr>	
	<tr>
		<td><strong>Label 2:</td>
		<td><select name="label2">
				<option value="c4c27d081ff84fc8b7353677907c41bc">News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed">Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae">Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6">Entertainment</option>	
			</select></td>
	</tr>	
	<tr>
		<td><strong>Label 3:</td>
		<td><select name="label3">
				<option value="c4c27d081ff84fc8b7353677907c41bc">News</option>
				<option value="7bedaacf886f46a9afe8515dc32321ed">Sports</option>
				<option value="476b257cc2cb4bfdb9ab73d00b309dae">Lifestyle</option>
				<option value="c74feb4817444ef785e38d1d4aa886d6">Entertainment</option>	
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
	<tr>
		<td>
		<input type="hidden" value="<?php echo $idvideo;?>" name="idvideo">	
		<input type="hidden" value="newdata" name="type">
		<input type="submit" value="Generate">
		<td>	
		</td>
	</tr>
</form>
</table>













