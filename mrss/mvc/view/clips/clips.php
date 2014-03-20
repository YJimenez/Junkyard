<html>
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>


	<body>
		<form action="" method="post">
			<table>
				<tr>
					<td colspan="2" align="right"><a href="?section=exit">Exit</a></td></tr>
				<tr>
					<td>Property:</td>
					<td>
						<select id="property" name="property">
                                    <?php foreach($tokens as $token) { 
                                    		$selected="";
                                    		if($theToken[0]['id']==$token['id'])
                                    			$selected="selected='selected'";
                                    ?>
                                    <option value="<?php echo $token['id'];?>" <?php echo $selected; ?>><?php echo $token['property']; ?></option>
                                    <?php } ?>
                  		</select>
					</td>
				</tr>
				<tr>
					<td>Date:</td>
					<td>
						<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"fecha",
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
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
<input type="field" name="fecha" id="fecha" readonly="readonly" <?php if(isset($fecha)) echo 'value="'.$fecha.'"'; ?>></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="GO"></td>
				</tr>
				<tr>
					<td colspan="2">
						<?php if($theToken) { 
								$theURL="http://www.junkyard.mx/mrss/?section=feed&idCove=".$theToken[0]['id']."&date=".$fecha; 
								echo "The MRSS for ".$theToken[0]['property']." is <a href='".$theURL."' target='_blank'>".$theURL."</a>";
							}
						?>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>