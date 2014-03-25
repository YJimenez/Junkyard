<?php 
session_start();
	if(!isset($_SESSION['ooyala']))
	header("Location: ../index.php?section=login");


require_once('Connections/bd.php');
	  mysql_select_db($database_bd, $bd);

	$id=$_GET['id'];
	$selectSQL = "select * from videosinfo where id=".$id;
	$result = mysql_query($selectSQL) or die(mysql_error());	
	
		
	//error_reporting(0);
	include("OoyalaApi.php");

	//key api, secret api
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	
	while ($row= @ mysql_fetch_array($result)){
		$idvideo=$row['idvideo'];
		
		$selectvideoSQL = "select * from videos where id=".$idvideo;
		$resultvideo = mysql_query($selectvideoSQL) or die(mysql_error());
			
			while ($rowvideo= @ mysql_fetch_array($resultvideo)){
			
				//$file= $_FILES['archive']['tmp_name'];
				
				$size=$rowvideo['file_size'];
				$name=$rowvideo['name'];
				$title=$rowvideo['title'];
				$description=$rowvideo['description'];
				$player=$row['player'];
				
		
				$parameters=array();
					$parameters['name']=$title;
					$parameters['file_name']=$name;
					$parameters['asset_type']='video';
					$parameters['file_size']=$size;
					//$parameters['post_processing_status']='paused';
					$parameters['description']=$description;
				$results = $api->post("/v2/assets", $parameters);
				//upload video
		
				$embed_code=$results->embed_code;
				$updated_at=$results->updated_at;
				//echo "este es el embed ".$embed_code;		
		
				$url=$api->get("/v2/assets/".$embed_code."/uploading_urls");
				//subiendo las url
						
				//$content = file_get_contents($file);
				$content = file_get_contents('videos/'.$rowvideo['id'].'.mp4');
		
				$direccion=$url[0];
				//echo $direccion;
		
				$ch = curl_init($direccion);
				       curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
				       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				       curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: multipart/mixed"));
				       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
				       curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
				function httpRequest($ch)	
				       {
		               curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		               $response = curl_exec($ch);
		               if(curl_error($ch))
		                   {
		                       curl_close($ch);
		                       return curl_error($ch);
		                   }
		               $head=curl_getinfo($ch);
		               $content = $head["content_type"];
		               $code = $head["http_code"];
		               curl_close($ch);
					   }
					   httpRequest($ch);
				//termina curl
				
			
				unset($parameters);
				$parameters=array();
					$parameters['status']='uploaded';
				$fResult=$api->put('/v2/assets/'.$embed_code.'/upload_status', $parameters); 
				//upload
				
				$resultsplayer = $api->put('/v2/assets/'.$embed_code.'/player/'.$player);		
				//Player
				
				/*$metadata1=$row['metadata1'];
				$metadata2=$row['metadata2'];
				$metadata3=$row['metadata3'];				
				$parametersmeta=array();
					$parametersmeta['metadata1']=$metadata1;
					$parametersmeta['metadata2']=$metadata2;
					$parametersmeta['metadata3']=$metadata3;						
				$resultsmeta = $api->put('/v2/assets/'.$embed_code.'/metadata', $parametersmeta);*/
				//metadata
		
		
			
				if($row['labelnew']!=NULL){	
					unset($parameterslabel);
					$parameterslabel=array();
						$parameterslabel['name']=$row['labelnew'];	
					$resultsnewlabel = $api->post("/v2/labels", $parameterslabel);
					$labelnew = $resultsnewlabel->id;
				}
				
				$label1=$row['label1'];
				$label2=$row['label2'];
				$label3=$row['label3'];				
				$parameterslabel=array();
					$parameterslabel['label1']=$label1;
					$parameterslabel['label2']=$label2;
					$parameterslabel['label3']=$label3;
					if($row['labelnew']!=NULL){$parameterslabel['labelnew']=$labelnew;}
				$resultslabels = $api->put('/v2/assets/'.$embed_code.'/labels/', $parameterslabel);
				//labels
				
		
				
				/*
				//Watermark Img
				$parameterswatermark=array();
					$parameterswatermark['name']=$_FILES['wat_img']['name'];
					$parameterswatermark['size']=$_FILES['wat_img']['size'];
					$parameterswatermark['type']=$_FILES['wat_img']['type'];
					$parameterswatermark['tmp_name']=$_FILES['wat_img']['tmp_name'];
					
					$resultswatimage=$api->put('/v2/assets/'.$embed_code.'/watermark', $parameterswatermark);		
				//Prev Image
					$parametersimage=array();
					$parametersimage['name']=$_FILES['prev_img']['tmp_name'];
					$parametersimage['size']=$_FILES['prev_img']['size'];
					$parametersimage['type']=$_FILES['prev_img']['type'];		
					
					$resultsprevimage=$api->post('/v2/assets/'.$embed_code.'/preview_image_files', $parametersimage);
				*/
		
		
				$updateSQL = "UPDATE videosinfo SET embed_code='".$embed_code."' WHERE id='".$id."'";
				$Results = mysql_query($updateSQL) or die(mysql_error());
				
				$updateSQL2 = "UPDATE videos SET embed_code='".$embed_code."', datevendor='".$updated_at."' WHERE id='".$idvideo."'";
				$Results2 = mysql_query($updateSQL2) or die(mysql_error());
		
		
				
				
				//print_r
				echo "Results:<br><pre>Results:<br>";
				print_r($results);
				echo "Uploading url";
				print_r($url);
				echo "Metadata";
				print_r($resultsmeta);
				echo "Labels";
				print_r($resultslabels);
				echo "New Labels";
				print_r($resultsnewlabel);	
				echo "Final status";
				print_r($fResult);	
				
				
				header('Location: videoplayers.php?idvideo='.$rowvideo['id']);
}}
?>






