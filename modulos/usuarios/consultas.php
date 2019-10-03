<?php
require_once $_SERVER["DOCUMENT_ROOT"].'includes/database.php';

if ($_POST) {
    switch ($_POST["accion"]) {
        case 'insertUsuario':
            insertUsuario();
            break;

        case 'updateUsuario':
        updateUsuario($_POST["usuario"]);
        break;

        case 'getUsuario':
        getUsuario($_POST["usuario"]);
        break;

        case 'deleteUsuario':
        deleteUsuario($_POST["usuario"]);
        break;         
        
        default:
            break;
    }

    function insertUsuario(){
        global $db;
        $usuarios = $db->insert('usuarios',[
            "matricula_usr" => $matricula,
            "nombre_usr" => $nombre,
            "telefono_usr" => $telefono,
            "email_usr" => $email,
            "nivel_usr" => $nivel,
            "status_usr" => $status,
            "password_usr" => $password,
            ]);  
    }

    function updateUsuario($id){
        $usuarios = $db->update("usuarios", [
            "matricula_usr" => $matricula,
            "nombre_usr" => $nombre,
            "telefono_usr" => $telefono,
            "email_usr" => $email,
            "nivel_usr" => $nivel,
            "status_usr" => $status,
            "password_usr" => $password,
            [
                "id_usr" => $id
            ]
        ]);
    }

    function getUsuario($id){
        $usuarios = $db->get("usuarios",[
                "matricula_usr", 
                "nombre_usr", 
                "telefono_usr", 
                "correo_usr",
                "nivel_usr", 
                "status_usr",
                "password_usr",
                [
                    "id_usr" => $id
                ]
            ]   
        );
    }
     
    function deleteUsuario($id){
        $usuarios = $db -> delete("usuarios", [
            "id_usr"=> $id
            ]);
    }

}

?>