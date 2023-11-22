<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Productos.php");
    $producto = new Producto();
    $body = json_decode(file_get_contents("php://input"), true);


    switch ($_GET["op"]) {
        case "GetAll":
            $datos=$producto->get_producto();
            echo json_encode($datos);
        break;


        case "GetId":
            $datos=$producto->get_producto_x_id($body["id_Producto"]);
            echo json_encode($datos);
            break;

        case "Insert":
            $datos=$producto->insert_producto(
                $body["id_Producto"],
                $body["nom_Producto"],
                $body["precio_Producto"],
                $body["cantidad_Producto"],
            );
            echo "Insert Correcto";
        break;


        case "Delete":
            $datos=$producto->delete_producto($body["id_Producto"]);
            echo "Delete Correcto";
        break;

        case "Update":
            $datos=$producto->update_producto(
                $body["id_Producto"],
                $body["nom_Producto"],
                $body["precio_Producto"],
            );
            echo "Upadate Correcto";
        break;

    




}
?>