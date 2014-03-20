<?php 
class upload extends conexion {
	public function uploadVideoLocal($arreglo) {
		extract($arreglo);
		if($type=='newvideo'){
			$file= $_FILES['archive']['tmp_name'];
			$size=$_FILES['archive']['size'];
			$name=$_FILES['archive']['name'];

			$insertvSQL = "INSERT INTO videos (file_size, name, tmp_name, title, description, owner, producer, datelocal) VALUES ('".$size."','".$name."','".$file."','".$title."','".$description."','".$owner."','".$producer."','".date('Y-m-d H:i:s')."')";
			$idvideo = $this->queryInsert($insertvSQL);
			move_uploaded_file($file,"videos/". $idvideo.".mp4");
		}

		$insertSQL = "INSERT INTO videosinfo (idvideo, player, expire, label1, label2, label3, labelnew) VALUES ('".$idvideo."','".$playerid."','".$expire."','".$label1."','".$label2."','".$label3."','".$labelnew."')";
		$id = $this->queryInsert($insertSQL);

		return true;
	}
}
?>