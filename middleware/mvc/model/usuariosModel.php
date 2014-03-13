<?php
  class usuarios extends conexion
  {
      public function __construct($table = "", $idC="id", $userC = "", $passC = "", $activo = "", $admin="", $session = "")
      {
          $this->myTable = array("table" => "$table", "userColum" => "$userC", "passColum" => "$passC", "actColum" => "$activo");
          $this->activo = $activo;
          $this->session = $session;
          $this->auth = false;
          $this->idUsuario=$idC;
          $this->admin=$admin;
      }
      
      
      
      public function usuario($usuario, $password)
      {
          $myTable = $this->myTable;
          $myActivo = $this->activo;
          $mySession = $this->session;
          

          //se busca que el usuario exista en la bd
       

          $query = "select * from " . $myTable["table"] . " where " . $myTable["userColum"] . "='$usuario' and " . $myTable["passColum"] . "='$password'";
          if ($myActivo)
              $query .= " and " . $myTable["actColum"] . " ='1'";
          if($this->admin) 
              $query.=" and admin ='1'";
      
          $resultado = $this->queryResultados($query);
          
          
          //si usuario y contraseña coinciden
          
          if ($resultado) {
              $this->auth = true;
              $_SESSION['' . $mySession . ''] = $resultado[0][$this->idUsuario];
          }
          
          // si contraseña es incorrecta
          else {
              $this->auth = false;
          }
      }
      
      //funcion que informa si hay  acceso
      public function allow()
      {
          if ($this->auth) {
              return true;
          } else {
              return false;
          }
      }
	  
	
  }
?>