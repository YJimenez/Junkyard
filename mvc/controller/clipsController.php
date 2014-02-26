<?php
if($_POST['content_owner']) {
	$content_owner=$_POST['content_owner']; //property's id
	$syndicaster=new syndicaster();
	$response=$syndicaster->getClips($content_owner, 1);

	//getting total total_entries
	$total_entries=$response->total_entries;
	$pages=ceil($total_entries/50); //50 clips per page

	$property='csv/'.$response->results[0]->content_owner->name;
	if(file_exists($property.'.csv'))
	 	unlink($property.'.csv');
	$myFile=fopen($property.'.csv','a');//abrir archivo, nombre archivo, modo apertura
	fwrite($myFile, "video, title, thumbnail, description, hotsted_at, flight_start_time, flight_end_time, labels, metadata:type_1, metadata:type_2,   metadata:type_3, embed_code, id, video_length, video_size, total_plays\n");		
	fclose($myFile); //cerrar archivo 

	//writing 1st page on csv file
	if($syndicaster->fileWrite($response, $property))
		echo "File: ".$property." <br> Page: 1<br>";

	//writing next pages
	for($i=2; $i<=$pages; $i++) {
		unset($response);
		$response=$syndicaster->getClips($content_owner, $i);
		if($syndicaster->fileWrite($response, $property))
			echo "Page: $i<br>";
	}
	echo "Total videos: $total_entries<br>Total pages: $pages";
}
//Archivo de la vista de clips
require_once('view/clips/clips.php');
?>