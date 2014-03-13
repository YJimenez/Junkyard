<?php 

//Function for connect to the api
//
function sendAPI($method, $data, $path, $json=0, $header=array()) {
		$data=$json?json_encode($data):$data;
		$ch = curl_init("http://api.syndicaster.tv/".$path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS,($data));

        if($header)
        	  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        return $response;
	}

//Getting the token
 $cliente="5307bc3899b1d601af000001";
 $secret="866a0bac095b12b79e450e017b94f11aa21d6f0ec6bf13bdeb9d9e9539857117";
 $user="dstoecker";
 $password="dstoecker";
$access_token_post_data = array('grant_type' => 'password',
									'client_id' => $cliente,
                                    'client_secret' =>$secret,
									'scope' => 'read',
                          			'username' => $user,
                                    'password'=> md5($password));

$response=$this->sendAPI("POST", $access_token_post_data, "oauth/access_token", 0);
$token=$response->access_token;


//Getting the total plays from the video id 15629096
$path='reports/views';

$curlheader[0] = "Content-Type: application/json";
$curlheader[1] = "Authorization: OAuth ".$token;
$data = array(
        	'dimensions' => array('video'),
            'filters' => array ('video_id'=>'15629096', 'publisher_id'=>'3089'), 
            'start_date'=> '2013-12-01', 
            'end_date'=>'2014-02-01',
            'limit'=>1);

$response=$this->sendAPI("GET", $access_token_post_data, $path, 1,$curlheader);


print_r($response); //printing the response

?>