<?php
class playlist extends conexion {
	public function getVideos($id) {
		$query="select * from videos";
		$response=$this->queryResultados($query);
		return $response;
	}
}
?>