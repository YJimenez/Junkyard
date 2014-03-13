<?php
  class admin extends conexion {

    //users methods
    public function getUsers($id=0){
      if($id>1)
        $aux=" where idlogin='$id'";
      else
        $aux=" where idlogin>'1'";

      $query="select * from usuarios as a inner join properties as b on a.property=b.idProperty
              inner join profile as c on a.profile=c.idProfile
              right join groups as d on b.fkgroup=d.idGroup".$aux." order by userL";


      $response=$this->queryResultados($query);
      return $response;
    } 
    public function getProperties($id=0) {
      $aux="";
      if($id)
        $aux=" and idProperty='$id'";
      $query="select * from properties as a inner join groups as b on a.fkgroup=b.idGroup where activeP='1'".$aux." order by group_name, property_name";
      $response=$this->queryResultados($query);
      return $response;
    }

     public function getProfiles($id=0) {
      $aux="";
      if($id)
        $aux=" where idProfile='$id'";
      $query="select * from profile ".$aux;
      $response=$this->queryResultados($query);
      return $response;
    }

    public function getGroups($id=0) {
      $aux="";
      if($id)
        $aux=" where idGroup='$id'";
      $query="select * from groups ".$aux;
      $response=$this->queryResultados($query);
      return $response;
    }

    public function addUser($array) {
      extract($array);
      $admin=$admin?$admin:0;
      //verifying if user exists 
      $query="select * from usuarios where userL='$username'";
      $response=$this->queryResultados($query);
      if($response)
        return 2;
      else {
        $password=md5($password);
        $query="insert into usuarios (userL, passL, actL, property, admin, profile) 
                values ('$username', '$password', '1', '$property', '$admin', '$profile')";
        $this->querySimple($query);
        return 1;
      }
    }

    public function addProperty($array) {
      extract($array);
      //verifying if property exists 
      $query="select * from properties where property_name='$property_name'";
      $response=$this->queryResultados($query);
      if($response)
        return 2;
      else {
        $query="insert into properties (property_name, fkgroup, activeP) 
                                values ('$property_name', '$group', '1')";
        $this->querySimple($query);
        return 1;
      }
    }

    public function change($id, $status, $change){
      $status=$status==1?0:1;
      $column=$change=="a"?"admin":"actL";
      $query="update usuarios set ".$column." = ".$status." where idlogin='$id'";
      $this->querySimple($query);
    }
    public function editUser($array) {
      extract($array);
      $aux="";
      if($password) {
        $password=md5($password);
        $aux=", passL='$password'";
      }
      $query="update usuarios set property='$property', admin='$admin', profile='$profile'".$aux." where idlogin='$id'";
      $this->querySimple($query);
      return 1;
    }

    public function editProperty($array) {
      extract($array);
      $query="update properties set property_name='$property_name', fkgroup='$group' where idProperty='$id'";
      $this->querySimple($query);
      return 1;
    }
    public function delete($id, $idCampo, $table) {
      $this->querySimple("delete from ".$table." where ".$idCampo." = '$id'");
      return 1;
    }
  } //end class
?>