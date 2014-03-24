<?php
class users extends conexion {
	public function getUser($id) {
		$query="select * from usuarios where idlogin='$id'";
		$response=$this->queryResultados($query);
		return $response;
	}
}
?>