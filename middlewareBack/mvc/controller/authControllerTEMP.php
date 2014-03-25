<?php

if(!isset($_SESSION['ooyala']))
header("Location: index.php?section=login");
	$uploader=new upload();
	$video=$uploader->getVideoToOoyala($_GET['id']);
	$video=$video[0];

	echo "<pre>";
	print_r($video);
	echo "</pre>";

$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
//uploading video to ooyala

$parameters=array();
$parameters['name']=$video['title'];
$parameters['file_name']=$video['name'];
$parameters['asset_type']='video';
$parameters['file_size']=$video['file_size'];
$parameters['description']=$video['description'];
$results = $api->post("/v2/assets", $parameters);

//upload video
		
$embed_code=$results->embed_code;
$updated_at=$results->updated_at;
$duration=$results->duration;
$imgprev=$results->preview_image_url;
		
$url=$api->get("/v2/assets/".$embed_code."/uploading_urls");
						
$content = file_get_contents('videos/'.$video['idvideo'].'.mp4');
$direccion=$url[0];
		
$ch = curl_init($direccion);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: multipart/mixed"));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
function httpRequest($ch){
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$response = curl_exec($ch);
	if(curl_error($ch)){
		curl_close($ch);
		return curl_error($ch);
	}
	$head=curl_getinfo($ch);
	$content = $head["content_type"];
	$code = $head["http_code"];
	curl_close($ch);
}
httpRequest($ch);

unset($parameters);
$parameters=array();
$parameters['status']='uploaded';
$fResult=$api->put('/v2/assets/'.$embed_code.'/upload_status', $parameters); 
//upload
$resultsplayer = $api->put('/v2/assets/'.$embed_code.'/player/'.$player);		
//Player
		
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
				

$updateSQL = "UPDATE videosinfo SET embed_code='".$embed_code."' WHERE id='".$id."'";
$Results = mysql_query($updateSQL) or die(mysql_error());
$updateSQL2 = "UPDATE videos SET embed_code='".$embed_code."', length='".$duration."', datevendor='".$updated_at."', imgprev='".$imgprev."', status='1' WHERE id='".$idvideo."'";
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


//Archivo de la login
require_once('view/upload/auth.php');
?>