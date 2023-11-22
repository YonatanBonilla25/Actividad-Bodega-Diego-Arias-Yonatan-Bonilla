<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Ventas.php");
    $venta = new venta();
    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) {
        case "GetAll":
            $datos=$venta->get_venta();
            echo json_encode($datos);
        break;
    

        case "Insert":
            $datos=$venta->insert_venta(
                $body["id_Venta"],
                $body["id_Producto"],
                $body["cantidad_Venta"],
                $body["total_Venta"],
                $body["fecha_Venta"],
            );
            echo "Insert Correcto";
        break;
















}
?>