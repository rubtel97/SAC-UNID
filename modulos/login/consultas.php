<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'includes/database.php';

	if ($_POST) {
		switch ($_POST["accion"]) {
			case 'login':
				login();
				break;
			
			default:
				break;
		}
	}

	function login(){
		global $db;
		$respuesta = [];

		if ($_POST['usuario'] !=  "") {

			$usuario = $db->get("usuarios", "*", ["email_usr" => $_POST['usuario']]);;

			if ($usuario) {
				
				if ($usuario = $db->get("usuarios", "*", ["AND" => ["email_usr" => $_POST['usuario'], "password_usr"=> $_POST['password']]])) {

					session_start();
					error_reporting(0);
					$_SESSION['id'] = $usuario["id_usr"];
					$_SESSION['nombre'] = $usuario["nombre_usr"];
					$_SESSION['email'] = $usuario["email_usr"];
					$_SESSION['status'] = $usuario["status_usr"];
					$_SESSION['nivel'] = $usuario["nivel_usr"];
					$respuesta["status"] = 3;

				}else{
					$respuesta["status"] = 2;
				}
			}else {
				$respuesta["status"] = 4;
			}
	}else{
		$respuesta["status"] = 5;
	}
	echo json_encode($respuesta);
}
?>