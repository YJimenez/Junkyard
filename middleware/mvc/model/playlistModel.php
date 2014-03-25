<?php
class playlist extends conexion {
	public function getVideos() {
		$query="select * from videos where status=1";
		$response=$this->queryResultados($query);
		return $response;
	}
	public function getSearch($search) {
		$query="select * from videos where title LIKE '%$search%' or description LIKE '%$search%' ";
		$response=$this->queryResultados($query);
		return $response;
	}
	public function getSearchOoyala($search) {
		$selectSQL = "select a.*, b.*, a.id from videosinfo as a inner join videos as b on a.idvideo=b.id  where b.status='1' and (b.title LIKE '%$search%' or b.description LIKE '%$search%')";
		$response=$this->queryResultados($selectSQL);
		return $response;
	}
}
?>