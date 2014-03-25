<?php
class playlist extends conexion {
	public function getVideos() {
		$query="select * from videos where status=1";
		$response=$this->queryResultados($query);
		return $response;
	}
}
?>