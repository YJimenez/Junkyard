<?phpsession_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");
?>
<html>
	<body>
	<form action="" method="post" enctype="multipart/form-data"> 
		<table>		
			<tr>
				<td><strong>Create new label in Ooyala:</strong></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td><input type="button" value="Index" onclick="window.location='index.php'"></td>
				<td><input type="submit" value="Create"></td>
			</tr>
		</table>
	
	</form>
	</body>
</html>
<?php
	//error_reporting(0);
	include("OoyalaApi.php");
	
if(isset($_POST['name'])){	
		//key api, secret api
		$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");

		
		$titulo=$_POST['name'];
		$parameterslabel=array();
			$parameterslabel['name']=$titulo;


		//print_r($parameters);
		$results = $api->post("/v2/labels", $parameterslabel);
		
		echo "Results:<br><pre>Results:<br>";
		print_r($results);
}
?>
