<?php
abstract class conexion{

	private $server_db = 'localhost';
/*	private $user_db = 'junkymx_junkymx';
	private $password_db = 'Jy@rd';
	private $name_db = 'junkymx_ooyala';
*/

	
	private $user_db = 'root';
	private $password_db = '';
	private $name_db = 'ooyala';

	private $link_conexion_db;
	protected $msj;
	private $myConn;
	protected $data = array ();
	protected $rows;
	protected $query_data;


	
	private function Connection (){
		$this->myConn = new mysqli($this->server_db, $this->user_db, $this->password_db, $this->name_db);
		$this->myConn->query('SET NAME UTF-8');
	}


	private function CloseConnection (){
		unset($this->myConn);
	}
	
	protected function querySimple ($query){
		$this->Connection();
		if($this->myConn->query($query)){
			$this->msj = true;
			$this->CloseConnection();
			return $this->msj;
		}
		else{
			echo $this->myConn->error;
			$this->msj = false;
			$this->CloseConnection();
			return $this->msj;
		}
	}

	protected function queryResultados ($query){
		$this->Connection();
		$this->query_data = $this->myConn->query($query) or die ($this->myConn->error);
		$this->rows = $this->query_data->num_rows;
		if($this->rows == 0){
			$this->msj = false;
			$this->CloseConnection();
			return $this->msj;
		}
		else{
			$this->data=array();
			while($result = $this->query_data->fetch_assoc()){
				$this->data [] = $result;
			}
			$this->CloseConnection();
			return $this->data;
		}
	}

	public function redirect($url, $time, $no_session_par = null) {
		$url = urlencode($url);
		$url = str_replace('%3F', '?', $url);
		$url = str_replace('%3D', '=', $url);
		$url = str_replace('%26', '&', $url);
		echo '<meta http-equiv="refresh" content="'.$time.'; url='.$url.'">';
	}

}

?>