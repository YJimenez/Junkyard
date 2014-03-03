<?php
abstract class conexion{

	private $server_db = 'localhost';
	private $user_db = 'root';
	private $password_db = '';
	private $name_db = 'ooyala';
	private $link_conexion_db;
	protected $msj;
	protected $data = array ();
	protected $rows;
	protected $query_data;

	private function Connection (){
		$this->link_conexion_db = mysql_connect($this->server_db,$this->user_db,$this->password_db);
		@mysql_query('SET NAME UTF-8');
		mysql_select_db($this->name_db,$this->link_conexion_db);

		return $this->link_conexion_db;
	}

	private function CloseConnection (){
		mysql_close($this->link_conexion_db);
	}

	protected function SingleQuery ($query){
		$this->Connection();
		if(mysql_query($query)or die (mysql_error())){
			$this->msj = true;
			$this->CloseConnection();
			return $this->msj;
		}
		else{
			$this->msj = false;
			$this->CloseConnection();
			return $this->msj;
		}
	}

	protected function QueryResults ($query){
		$this->Connection();
		$this->query_data = mysql_query($query) or die (mysql_error());
		$this->rows = mysql_num_rows($this->query_data);
		if($this->rows == 0){
			$this->msj = false;
			$this->CloseConnection();
			return $this->msj;
		}
		else{
			$this->data=array();
			while($result = mysql_fetch_assoc($this->query_data)){
				$this->data [] = $result;
			}
			$this->CloseConnection();
			return $this->data;
		}
	}

}

?>