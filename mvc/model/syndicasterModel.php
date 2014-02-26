<?php
class syndicaster {
	private $cliente="5307bc3899b1d601af000001";
	private $secret="866a0bac095b12b79e450e017b94f11aa21d6f0ec6bf13bdeb9d9e9539857117";
	private $user="dstoecker";
	private $password="dstoecker";
	private $api="http://api.syndicaster.tv/";
	public function sendAPI($method, $data, $path, $json=0, $header=array()) {
		$data=$json?json_encode($data):$data;
		$ch = curl_init($this->api.$path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS,($data));

        if($header)
        	  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        return $response;
	}
	public function token () {
		$access_token_post_data = array('grant_type' => 'password',
									'client_id' => $this->cliente,
                                    'client_secret' =>$this->secret,
									'scope' => 'read',
                          			'username' => $this->user,
                                    'password'=> md5($this->password));

      	$response=$this->sendAPI("POST", $access_token_post_data, "oauth/access_token", 0);
      	return $response->access_token;
	}


	public function getClips($id, $page=1) {
		 $access_token_post_data = array(
            'content_owner_ids' => array ($id), 
            'distributable'=> true, 
            'per_page'=>50,
            'page'=>$page,
            'media_type_ids'=>array('4'));
		$token=$this->token();
		$curlheader[0] = "Content-Type: application/json";
        $curlheader[1] = "Authorization: OAuth ".$token;
      
		 $response=$this->sendAPI("POST", $access_token_post_data, "file_sets/search.json", 1, $curlheader);
      	return $response;
	}

	public function getPlays($id) {
		$path='reports/views';
		$token=$this->token();
		$curlheader[0] = "Content-Type: application/json";
        $curlheader[1] = "Authorization: OAuth ".$token;

        $access_token_post_data = array(
        	'dimensions' => 'video',
            'filters' => array ('video_id'=>'6767523', 'publisher_id'=>'3089','provider_id'=>'3089'), 
            'start_date'=> '2013-12-01', 
            'end_date'=>'2014-02-01');

		$response=$this->sendAPI("GET", $access_token_post_data, $path, 1,$curlheader);
		return $response;
	}

	public function fileWrite($response, $property) {
		foreach ($response->results as $array) {	
			$uri=$array->files[0]->uri;
		    $title=preg_replace("/,/",".",$array->metadata->title);	
		    $title=preg_replace("/\n/", " ", $title);
		    $title=preg_replace("/\r/", " ", $title);
		    $thumbnail=$array->thumbnail_file->uri;
		   	$description=preg_replace("/,/",".",$array->metadata->description);
		   	$description=preg_replace("/\n/", "", $description);
		    $description=preg_replace("/\r/", "", $description);
		    $hosted=$array->master_file->uri;
		    $flight_start_time=$array->completed_at;
		    $flight_end_time=$array->end_time;
		    $labels=preg_replace("/ /","", $array->metadata->keywords);
		    $labels=preg_replace("/,/","; /", $labels);
		    $metadata1=$array->categories[0]->name;
		    $metadata2=$array->categories[1]->name;
		    $metadata3=$array->categories[2]->name;
		    $embedcode=null;
		    $id=$array->id;
		    $video_length=date('Y-m-d H:i:s', $array->duration/1000);  
		    $file_size=$array->files[0]->file_size; 
		    $totalplays=null;  		
		       					
		    $myFile=fopen($property.'.csv','a');//abrir archivo, nombre archivo, modo apertura
			fwrite($myFile,  $uri.",".$title.",".$thumbnail.",".$description.",".$hosted.",".$flight_start_time.",".$flight_end_time.",/".$labels.",".$metadata1.",".$metadata2.",".$metadata3.",".$embedcode.",".$id.",".$video_length.",".$file_size.",".$totalplays."\n");		
			fclose($myFile); //cerrar archivo  
		}
		return true;	 
	}
}