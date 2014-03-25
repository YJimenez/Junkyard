<?php
	//error_reporting(0);
	include("OoyalaApi.php");

	//key api, secret api
	$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
	$embed_code=$_POST['embed_code'];

if($_POST['type']=='video'){
	
	$file=$_FILES['archive']['tmp_name'];
	
	$parameters=array();
		$parameters['name']=$_FILES['archive']['name'];
		$parameters['file_size']=$_FILES['archive']['size'];
		$parameters['file']=$_FILES['archive']['tmp_name'];
		$parameters['error']=$_FILES['archive']['error'];
		
		echo "Results:<br><pre>Results:<br>";
		print_r($parameters);
				
		$results = $api->post("/v2/assets/".$embed_code."/replacement", $parameters);
		//sube nuevo video
		
		$url=$api->get("/v2/assets/".$embed_code."/replacement/uploading_urls");
		//subiendo las url
		
		$content = file_get_contents($file);
		//$content = file_get_contents('test.mp4');

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
	    //acaba curl
	   
		unset($parameters);
		$parameters=array();
		$parameters['status']='uploaded';
		$fResult=$api->put('/v2/assets/'.$embed_code.'/replacement/upload_status', $parameters);
	
		//print_r
		echo "Results:<br><pre>Results:<br>";
		print_r($results);
		echo "Uploading url";
		print_r($url);
		echo "Final status";
		print_r($fResult);
		
}else{

	unset($parameters);
	$parameters=array();
		$parameters['name']=$_POST['name'];
		$parameters['description']=$_POST['description'];
$embed_code=$_POST['embed_code'];
	$results = $api->patch("/v2/assets/".$embed_code, $parameters);

	
}
	header('Location: videoeditooyala.php?embed_code='.$embed_code.'&up=1');
?>






