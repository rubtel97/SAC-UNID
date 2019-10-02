<?php 
require_once $_SERVER["DOCUMENT_ROOT"].'includes/database.php';
//Recibir variable post
switch ($_POST["accion"]) {

	case 'deleteCanon':
		eliminar_canon();
		break;
	
	default:
		# code...
		break;
}


function eliminar_canon(){
	global $db;
	$respuesta = [];
	$canon_e = $db->delete("canones",["id_can" => $_POST["canon"]]);
		
		if ($canon_e) {
			$respuesta["status"] = 1;
		}else{
			$respuesta["status"] = 0;
		}
		echo json_encode($respuesta);
}


 ?>