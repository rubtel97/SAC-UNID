<?php
    require_once $_SERVER["DOCUMENT_ROOT"].'includes/database.php';
	if ($_POST) {
		switch ($_POST["accion"]) {
			case 'insertEntrada':
				insertEntrada();
				break;
			
			case 'getEntrada':
				getEntrada($_POST['entrada']);
				break;

			case 'updateEntrada':
				updateEntrada($_POST['entrada']);
				break;

			case 'deleteEntrada':
				deleteEntrada($_POST['entrada']);
				break;

			default:
				# code...
				break;
		}
	}

	function insertEntrada(){
		global $db;
		$respuesta = [];
		$nombre = $_POST['nombre'];
		$status = $_POST['status'];

		if (empty($nombre) && empty($status)) {
			$respuesta["status"] = 0;
		}else{
			$db->insert("entradas",[
				"nombre" => $nombre,
				"status" => $status
			]);
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}

	function getEntrada($id){
		global $db;
		$entrada = $db->get("entradas", "*", ["id" => $id]);
		$respuesta["nombre"] = $entrada["nombre"];
		$respuesta["st"] = $entrada["status"];
		echo json_encode($respuesta);
	}

	function updateEntrada($id){
		global $db;
		$nombre = $_POST['nombre'];
		$status = $_POST['status'];

		if (empty($nombre) && empty($status)) {
			$respuesta["respuesta"] = 0;
		}else{
			$db->update("entradas", [
				"nombre" => $nombre,
				"status" => $status
			], [
				"id" => $id
			]);
			$respuesta["respuesta"] = 1;
		}
		echo json_encode($respuesta);
	}

	function deleteEntrada($id){
		global $db;
		$db->delete("entradas", ["id" => $id]);
		$respuesta["status"] = 1;
		echo json_encode($respuesta);
	}
?>