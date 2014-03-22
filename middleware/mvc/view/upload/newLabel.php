<html>
<head>
	<link href="css/upload/style.css" rel="stylesheet" type="text/css" />
</head>
	<body>
	
	<?php include("view/upload/menu.php"); ?>
	<br/>
 <?php if($results->id) { ?>
                    <br>
                        <div class="success">Label <?php echo $titulo; ?> has been edited</div>
                   <br>
                    <?php } ?>
	
	<form action="" method="post" enctype="multipart/form-data"> 
		<table>		
			<tr>
				<td><strong>Create new label in Ooyala:</strong></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
								<td><input type="submit" value="Create"></td>

				<td></td>
			</tr>
		</table>
	
	</form>
	</body>
</html>