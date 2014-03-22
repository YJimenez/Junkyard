<?php
class bcove {
	private $token="";
	private $url="";
	private $page_size=20;
	public function __construct($tok) {
		$this->token=$tok;
		$this->url = "http://api.brightcove.com/services/library?command=find_all_videos&video_fields=id,name,FLVURL,thumbnailURL,shortDescription,startDate,endDate,publishedDate,tags,length,playsTotal,videoFullLength&media_delivery=http&sort_by=PUBLISH_DATE&sort_order=DESC&get_item_count=true&token=".$this->token."&page_size=".$this->page_size;


	}
	private function getAPI($url) {

		$ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        
        return ($response);

	}

	private function getClips($fecha) {

		//getting total clips
		$urlTotal= $this->url."&get_item_count=true";
		$response=$this->getAPI($urlTotal);
		$total_count=$response->total_count;

		//getting pages
		$pages=ceil($total_count/$this->page_size);
		
		
		$aux=1;
		$j=0; //array index
		$arreglo=array(); //array for the response
		for($i=0; $i<$pages; $i++) {
			$urlPage=$this->url."&page_number=".$i;
			$response=$this->getAPI($urlPage);
			foreach($response->items as $asset) {
				if($asset->publishedDate<$fecha) {
					$aux=0;
					break;
				}
				
				$name = preg_replace("/,/",".", $asset->name);
				$name = preg_replace("/\r/",".", $name);
				$name = preg_replace("/\n/",".", $name);
				$name = preg_replace("/&/","and", $name);
				

				$shortDescription = preg_replace("/,/",".", $asset->shortDescription);
				$shortDescription = preg_replace("/\r/",".", $shortDescription);
				$shortDescription = preg_replace("/\n/",".", $shortDescription);
				$shortDescription = preg_replace("/&/","and", $shortDescription);

				$arreglo[$j]['name']=$name;
				$arreglo[$j]['th']=$asset->thumbnailURL;
				$arreglo[$j]['flvrul']=$asset->FLVURL;
				$arreglo[$j]['description']=$shortDescription;
				$arreglo[$j]['labels']=$asset->tags;
				$arreglo[$j]['id']=$asset->id;
				$j++;

			}
			
			
			
			if(!$aux)
				break;

		}

		return ($arreglo);

		

	}

	public function getXML($fecha, $token) {
		//converting fecha on unix date
		$fecha=strtotime($fecha)*1000;
		//echo $fecha;

		//converting unix date on fecha
		//$fecha2=date('Y-m-d H:i:s', $fecha/1000);
		//echo $fecha2;
		$response=$this->getClips($fecha);
		//getting the labels
		
		$xml="<channel>";
		foreach($response as $asset) {
			//getting labels
			$labels="/".strtolower($token[0]['grupo']);
			if($asset['labels'])
				$labels.=", ";
			foreach ($asset['labels'] as $value) {
				if($value==end($asset['labels']))
					$labels.="/".$value;
				else
					$labels.="/".$value.", ";
			}
			$xml.='<item>     
            <media:content url="'.$asset['flvrul'].'" />
            <media:thumbnail url="'.$asset['th'].'" />
            <media:title>'.$asset['name'].'</media:title>
            <media:description>'.$asset['description'].'</media:description>
            <ooyala:labels>'.$labels.'</ooyala:labels>
            <link></link>
            <ooyala:metadata name="video_ID">'.$asset['id'].'</ooyala:metadata>
            <ooyala:metadata name="season_number">1</ooyala:metadata>
           </item>';
		}
		$xml.='</channel>';
		
		return ($xml);


	}
	
}
?>