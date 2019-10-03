<?php
require_once $_SERVER["DOCUMENT_ROOT"].'includes/database.php';

if ($_POST) {
    switch ($_POST["accion"]) {
        case 'insertUsuario':
            insertUsuario();
            break;

        case 'updateUsuario':
        updateUsuario($_POST["usuario"], $_POST["matricula_original"])
        ;
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
}

    function insertUsuario(){
        global $db;
        $respuesta = [];
        $duplicate = false;
        if($_POST["matricula"]  != ""  && $_POST["nombre"]  != ""  && $_POST["telefono"]  != ""  && $_POST["email"]  != "" && 
        $_POST["contraseña"]  != "")
        {
            $matriculas = $db->select("usuarios","matricula_usr");
            foreach ($matriculas as $matricula) {
                if($matricula == $_POST["matricula"]){
                    $duplicate = true;
                }
            } if (!$duplicate)       
              {
                $usuarios = $db->insert('usuarios',[
                    "matricula_usr" => $_POST["matricula"],
                    "nombre_usr" => $_POST["nombre"],
                    "telefono_usr" => $_POST["telefono"],
                    "email_usr" => $_POST["email"],
                    "nivel_usr" => "1",
                    "status_usr" => "1",
                    "password_usr" => $_POST["contraseña"]
                    ]); 
                    if($usuarios){
                            $respuesta["status"] = 1;
                    } else{
                        $respuesta["status"] = 0;
                    }
                    echo json_encode($respuesta);
                } else{
                    $respuesta["status"]=2;
                    echo json_encode($respuesta);
                }  
    }else{
        $respuesta["status"]=0;
        echo json_encode($respuesta);
    }
}

function updateUsuario($id, $matricula){
    global $db;
    $respuesta = [];
    $duplicate = false;
    if($_POST["matricula"]  != ""  && $_POST["nombre"]  != ""  && $_POST["telefono"]  != ""  && $_POST["email"]  != "" && 
    $_POST["contraseña"]  != "")
    { 
        if($matricula == $_POST["matricula"]){
        $duplicate = false;
    } else{
        $matriculas = $db->select("usuarios","matricula_usr");
        foreach ($matriculas as $mat) {
            if($mat == $_POST["matricula"]){
                $duplicate = true;
            }
        }
    } if (!$duplicate)       
          {
            $usuarios = $db->update("usuarios", [
                "matricula_usr" => $_POST["matricula"],
                "nombre_usr" => $_POST["nombre"],
                "telefono_usr" => $_POST["telefono"],
                "email_usr" => $_POST["email"],
                "nivel_usr" => 1,
                "status_usr" => 1,
                "password_usr" => $_POST["contraseña"]
            ],
                [
                    "id_usr" => $id
                ]);
                if($usuarios){
                        $respuesta["status"] = 1;
                } else{
                    $respuesta["status"] = 0;
                }
                echo json_encode($respuesta);
            } else{
                $respuesta["status"]=2;
                echo json_encode($respuesta);
            }  
}else{
    $respuesta["status"]=0;
    echo json_encode($respuesta);
}
}


    function getUsuario($id){
        global $db;
        $respuesta = [];
        $usuario = $db->get("usuarios", "*", ["id_usr" => $id]) ;
        $respuesta["matricula"] = $usuario["matricula_usr"];
        $respuesta["nombre"] = $usuario["nombre_usr"];
        $respuesta["telefono"] = $usuario["telefono_usr"];
        $respuesta["email"] = $usuario["email_usr"];
        $respuesta["contraseña"] = $usuario["password_usr"];
        $respuesta["status"] = 1;
        
 
        echo json_encode($respuesta);
    }
     
    function deleteUsuario($id){
        global $db;
        $respuesta = [];
        $usuarios = $db -> delete("usuarios", [
            "id_usr"=> $id
            ]);
            if($usuarios){
                $respuesta["status"]=1;
                echo json_encode($respuesta);
            }else{
                $respuesta["status"]=0;
                echo json_encode($respuesta);
            }
    }

?>