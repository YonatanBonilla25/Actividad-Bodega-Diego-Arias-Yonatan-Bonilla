<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Ingreso.php");
    $ingreso = new Ingreso();
    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) {
        case "GetAll":
            $datos=$ingreso->get_ingreso();
            echo json_encode($datos);
        break;
    

        case "Insert":
            $datos=$ingreso->insert_ingreso(
                $body["id_Ingreso"],
                $body["nom_Distribuidor"],
                $body["tel_Distribuidor"],
                $body["id_Producto"],
                $body["cantidad_Ingresada"],
                $body["fecha_Ingreso"],
            );
            echo "Insert Correcto";
        break;


        case "GetId":
            $datos=$ingreso->get_ingreso_x_id($body["id_Producto"]);
            echo json_encode($datos);
            break;



    }
    ?>