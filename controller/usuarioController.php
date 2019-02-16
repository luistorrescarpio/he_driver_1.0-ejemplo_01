<?php 
require_once("../he_driver/start.php");

switch ($obj->action) {

	case 'cerrar_session':
		session_destroy();
		header("Location: {$base_url}/index.php");
		break;

	case 'validar_acceso':
		$r = query("SELECT * FROM usuario 
					WHERE us_login='$obj->us_login'
					AND us_password='$obj->us_password' ");

		if( count($r)>0 ){
			$_SESSION["user"] = $r[0];
			res([
				"success"=>true
				,"message"=>"Validación exitosa"
			]);
		}else{
			res([
				"success"=>false
				,"message"=>"Usuario o Contraseña Incorrecta"
			]);
		}
		break;

}