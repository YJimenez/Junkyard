<html>
<head>
	<link href="css/upload/style.css" rel="stylesheet" type="text/css" />
</head>
	<body>
	
	<?php include("view/upload/menu.php"); ?>
	<br/>
 <?php if($results->id) { ?>
                    <br>
                        <div class="success">Playlist <?php echo $titulo; ?> has been created</div>
                   <br>
                    <?php } ?>
	
	<form action="" method="post" enctype="multipart/form-data"> 
		<table>		
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><strong>Create new Playlist:</strong></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td colspan="2"><strong>Add videos to playlist:</strong></td>
			</tr>
			<?php foreach ($assets->items as $value) { ?>	
			<tr>
				<td colspan="2"><input type="checkbox" name="option[]" value="<?php echo $value->embed_code; ?>"> <?php echo $value->name; ?></td>
			</tr>
			<?php } ?>
			<tr>
				<td><input type="submit" value="Create"></td>
				<td></td>
			</tr>
			
		</table>
	
	</form>
	</body>
	<?php 
		echo "<br><pre>Results:<br>";		
		echo "Playlist nuevo";
		print_r($results);
		
		
		echo "<br><pre>Results:<br>";		
		echo "Playlist";
		print_r($playlist);
	?>
</html>