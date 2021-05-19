<?php
//indica la estructura json
header('Content-Type: application/json');


require_once("../config/conexion.php ");
require_once("../models/Categoria.php ");

//se crea un nuevo objeto de la clase categoria
$categoria = new Categoria();


//variable global que toma como entrada el id 
$body = json_decode(file_get_contents("php://input"), true);


switch($_GET["op"]){


    case"GetAll":
//manda a traer todos los datos de la tabla
        $datos=$categoria->get_categoria();
        echo json_encode($datos);
            break;


    //webservice que consume la informacion por id    
    case"GetId":
        //manda a traer todos los datos del id 
                $datos=$categoria->get_categoria_id($body["id"]);
                echo json_encode($datos);
                break;
        



//webservice para insertar informacion desde la API           
    case"Insertar":
        //manda a traer todos los datos del id 
                $datos=$categoria->insertar_categoria($body["nombre"],$body["observacion"] );
                echo"informacion actualizada";
                break;
        


                case "Actualizar":
                    $datos=$categoria->update_categoria($body["id"],$body["nombre"],$body["observacion"]);
                    echo json_encode("Actualizado Correcto");
                break;
        
                case "Eliminar":
                    $datos=$categoria->delete_categoria($body["id"]);
                    echo json_encode("Eliminado Correcto");
                break;







    }

    





?>