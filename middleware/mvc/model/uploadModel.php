<?php 
class upload extends conexion {
	public function uploadVideoLocal($arreglo) {
		extract($arreglo);
		if($type=='newvideo'){
			$file= $_FILES['archive']['tmp_name'];
			$size=$_FILES['archive']['size'];
			$name=$_FILES['archive']['name'];

			$insertvSQL = "INSERT INTO videos (file_size, name, tmp_name, title, description, owner, producer, datelocal) VALUES ('".$size."','".$name."','".$file."','".$title."','".$description."','".$owner."','".$producer."','".date('Y-m-d H:i:s')."')";
			$idvideo = $this->queryInsert($insertvSQL);
			move_uploaded_file($file,"videos/". $idvideo.".mp4");
		}

		$insertSQL = "INSERT INTO videosinfo (idvideo, player, expire, label1, label2, label3, labelnew) VALUES ('".$idvideo."','".$playerid."','".$expire."','".$label1."','".$label2."','".$label3."','".$labelnew."')";
		$id = $this->queryInsert($insertSQL);

		return true;
	}

	public function getVideosLocal($id=0) {
		if($id)
			$selectSQL="select a.*, a.id, b.id as idInfo, b.* from videos as a inner join videosinfo as b on a.id=b.idvideo where a.id='$id'";
		else
			$selectSQL = "select a.*, b.id as idInfo from videos as a inner join videosinfo as b on a.id=b.idvideo";
		$response = $this->queryResultados($selectSQL);
		return $response;
	}
	public function uploadVideo($arreglo, $videoFile){
		
		extract($arreglo);
		
		if($type=="videoinfoupdate"){


			$updateSQL = "UPDATE videos SET title='".$title."', description='".$description."' WHERE id='".$idvideo."'";
			$this->querySimple($updateSQL);
		
					
			$updateSQL = "UPDATE videosinfo SET player='".$_POST['playerid']."', expire='".$_POST['expire']."', label1='".$_POST['label1']."', label2='".$_POST['label2']."', label3='".$_POST['label3']."', labelnew='".$_POST['labelnew']."' WHERE id='".$id."'";
			$this->querySimple($updateSQL);
			return 1;
		}
		else if($type=="updatevideo"){	

			 $file=$videoFile['archivo']['tmp_name'];
			 $size=$videoFile['archivo']['size'];
			 $name=$videoFile['archivo']['name'];
			 $updateSQL = "UPDATE videos SET file_size='".$size."', name='".$name."' WHERE id='".$idvideo."'";
			 $this->querySimple($updateSQL);
			 
			 
			 $myFile = "videos/".$idvideo.".mp4";
			 if(file_exists($myFile))
			 	unlink($myFile);
			 
			 move_uploaded_file($file,"videos/". $idvideo.".mp4");
			 return 1;
		}

		
	}
	public function getVideoToOoyala($id) {
		$selectSQL = "select a.*, b.*, a.id from videosinfo as a inner join videos as b on a.idvideo=b.id  where a.id=".$id;
		$response=$this->queryResultados($selectSQL);
		return $response;

	}
	
	public function getVideosToOoyala() {
		$selectSQL = "select a.*, b.*, a.id from videosinfo as a inner join videos as b on a.idvideo=b.id  where b.status='1'";
		$response=$this->queryResultados($selectSQL);
		return $response;

	}

	public function uploadOoyala() {
		$video=$this->getVideoToOoyala($_GET['id']);
		$video=$video[0];

		//echo "<pre>";
		//print_r($video);
		//echo "</pre>";

		$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
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
		
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$response = curl_exec($ch);
		if(curl_error($ch)){
			curl_close($ch);
			echo curl_error($ch);
			exit();
		}
		$head=curl_getinfo($ch);
		$content = $head["content_type"];
		$code = $head["http_code"];
		curl_close($ch);

		unset($parameters);
		$parameters=array();
		$parameters['status']='uploaded';
		$fResult=$api->put('/v2/assets/'.$embed_code.'/upload_status', $parameters); 
		//upload
		$resultsplayer = $api->put('/v2/assets/'.$embed_code.'/player/'.$video['player']);		
		//Player
		if($video['labelnew']!=NULL){	
			unset($parameterslabel);
			$parameterslabel=array();
			$parameterslabel['name']=$video['labelnew'];	
			$resultsnewlabel = $api->post("/v2/labels", $parameterslabel);
			$labelnew = $resultsnewlabel->id;
		}

		$label1=$video['label1'];
		$label2=$video['label2'];
		$label3=$video['label3'];				
		$parameterslabel=array();
		$parameterslabel['label1']=$label1;
		$parameterslabel['label2']=$label2;
		$parameterslabel['label3']=$label3;
		if($video['labelnew']!=NULL){$parameterslabel['labelnew']=$labelnew;}
		$resultslabels = $api->put('/v2/assets/'.$embed_code.'/labels/', $parameterslabel);
		//labels
		//
		$updateSQL = "UPDATE videosinfo SET embed_code='".$embed_code."' WHERE id='".$video['id']."'";
		$this->querySimple($updateSQL);
		$updateSQL2 = "UPDATE videos SET embed_code='".$embed_code."', length='".$duration."', datevendor='".$updated_at."', imgprev='".$imgprev."', status='1' WHERE id='".$video['idvideo']."'";
		$this->querySimple($updateSQL2);

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

				return true;
	}

	public function editVideoOoyala($arreglo, $archivo) {
		extract($arreglo);
		$api = new OoyalaApi("V5dzkxOmUFf0dFju2v9bPHqRdgjC.0Ut0Y", "O7PUVcRVGXQx5HtqMlt7MoS8wrBr_FByN-J11-s_");
		if($type=='video'){
	
	$file=$archivo['archive']['tmp_name'];
	
	$parameters=array();
		$parameters['name']=$archivo['archive']['name'];
		$parameters['file_size']=$archivo['archive']['size'];
		$parameters['file']=$archivo['archive']['tmp_name'];
		$parameters['error']=$archivo['archive']['error'];
		
		
				
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
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
               $response = curl_exec($ch);
               if(curl_error($ch))
                   {
                       curl_close($ch);
                       echo curl_error($ch);
                   }
        $head=curl_getinfo($ch);
        $content = $head["content_type"];
        $code = $head["http_code"];
        curl_close($ch);
		
		unset($parameters);
		$parameters=array();
		$parameters['status']='uploaded';
		$fResult=$api->put('/v2/assets/'.$embed_code.'/replacement/upload_status', $parameters);
	
			
		
		}else{

		unset($parameters);
		$parameters=array();
		$parameters['name']=$_POST['name'];
		$parameters['description']=$_POST['description'];
		$embed_code=$_POST['embed_code'];
		$results = $api->patch("/v2/assets/".$embed_code, $parameters);

	
		}
		return true;
	}
}
?>