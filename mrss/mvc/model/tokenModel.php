<?php
class token extends conexion {
	public function getToken($id=0) {
		if($id)
			$query="select * from properties where id='$id'";
		else
			$query="select * from properties order by grupo, property";
		return $this->queryResultados($query);
	}
}
?>