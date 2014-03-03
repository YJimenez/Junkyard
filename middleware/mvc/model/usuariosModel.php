<?php
  class usuarios extends conexion
  {
      public function __construct($table = "", $userC = "", $passC = "", $activo = "", $session = "")
      {
          $this->myTable = array("table" => "$table", "userColum" => "$userC", "passColum" => "$passC", "actColum" => "$activo");
          $this->activo = $activo;
          $this->session = $session;
          $this->auth = false;
      }
      
      
      
      public function usuario($usuario, $password)
      {
          $myTable = $this->myTable;
          $myActivo = $this->activo;
          $mySession = $this->session;
          //conectando BD
          $this->Connection();

          //se busca que el usuario exista en la bd
       

          $query = "select * from " . $myTable["table"] . " where " . $myTable["userColum"] . "='$usuario' and " . $myTable["passColum"] . "='$password'";
          if ($myActivo)
              $query .= " and " . $myTable["actColum"] . " ='1'";
          $resultado = mysql_query($query) or die(mysql_error());
          $num = mysql_num_rows($resultado);
          
          //si usuario y contraseña coinciden
          
          if ($num == 1) {
              $datos = mysql_fetch_array($resultado);
              mysql_query($querya);
              $this->auth = true;
              $_SESSION['' . $mySession . ''] = $datos[0];
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