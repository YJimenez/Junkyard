<?php
class permisos {
	public function redirige($url, $time, $no_session_par = null) {
		$url = urlencode($url);
		$url = str_replace('%3F', '?', $url);
		$url = str_replace('%3D', '=', $url);
		$url = str_replace('%26', '&', $url);
		echo '<meta http-equiv="refresh" content="'.$time.'; url='.$url.'">';
	}
	//funcion que sirve para comparar permisos de pagina con perfil
	public function vPermiso ($permisos, $perfil) {
	  $arr_permisos = explode(",",$permisos);
	  if ( !in_array($perfil,$arr_permisos) )
		return false;
	else
		return true;  
	}
}
?>