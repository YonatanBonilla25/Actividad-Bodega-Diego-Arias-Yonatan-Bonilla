<?php
 class Producto extends Conectar{



    public function get_producto(){
      $conectar = parent :: conexion();
      parent:: set_names();
      $sql="SELECT * FROM productos";
      $sql=$conectar->prepare($sql);
      $sql->execute();
      return $resultado=$sql->fetchAll();
    
    }

    public function get_producto_x_id($id_Producto){
        $conectar= parent::Conexion();
        parent::set_names();
        $sql="SELECT * FROM productos WHERE id_Producto = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_Producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert_producto($id_Producto, $nom_Producto, $precio_Producto, $cantidad_Producto) {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO productos (id_Producto, nom_Producto, precio_Producto, cantidad_Producto) VALUES (?, ?, ?, ?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_Producto);
        $sql->bindValue(2, $nom_Producto);
        $sql->bindValue(3, $precio_Producto);
        $sql->bindValue(4, $cantidad_Producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function delete_producto($id_Producto){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "DELETE FROM productos WHERE id_Producto = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_Producto);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function update_producto($id_Producto, $nom_Producto, $precio_Producto) {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE productos SET
                nom_Producto = ?,
                precio_Producto = ?
                WHERE
                id_Producto = ?";
        
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_Producto);
        $sql->bindValue(2, $precio_Producto);
        $sql->bindValue(3, $id_Producto);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    





}
?>


    


      

    
    





    


      
    




