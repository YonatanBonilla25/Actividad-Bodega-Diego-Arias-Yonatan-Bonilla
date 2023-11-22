<?php
 class Venta extends Conectar{

    public function get_venta(){
        $conectar = parent :: conexion();
        parent:: set_names();
        $sql="SELECT * FROM venta";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
      
      }
  
      public function insert_venta($id_Venta, $id_Producto, $cantidad_Venta, $total_Venta, $fecha_Venta) {
        $conectar = parent::Conexion();
        parent::set_names();
        
        // Primero, actualizamos la cantidad del producto en la tabla productos restando la cantidad de la venta
        $sql = "UPDATE productos SET cantidad_Producto = cantidad_Producto - ? WHERE id_Producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cantidad_Venta);
        $sql->bindValue(2, $id_Producto);
        $sql->execute();
    
        // Luego, insertamos la venta en la tabla venta
        $sql = "INSERT INTO venta (id_Venta, id_Producto, cantidad_Venta, total_Venta, fecha_Venta) VALUES (?, ?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_Venta);
        $sql->bindValue(2, $id_Producto);
        $sql->bindValue(3, $cantidad_Venta);
        $sql->bindValue(4, $total_Venta);
        $sql->bindValue(5, $fecha_Venta);
        $sql->execute();
    
        // Devolvemos el resultado si es necesario
        return $resultado =$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    


















}
?>