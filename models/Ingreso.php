<?php
 class Ingreso extends Conectar{


    public function get_ingreso(){
      $conectar = parent :: conexion();
      parent:: set_names();
      $sql="SELECT * FROM ingreso";
      $sql=$conectar->prepare($sql);
      $sql->execute();
      return $resultado=$sql->fetchAll();
    
    }

    public function insert_ingreso($id_Ingreso, $nom_Distribuidor, $tel_Distribuidor, $id_Producto, $cantidad_Ingresada, $fecha_Ingreso) {
        $conectar = parent::Conexion();
        parent::set_names();
        
        // Asegúrate de que estás insertando en la tabla 'ingreso' y no 'productos'
        $sql = "INSERT INTO ingreso (id_Ingreso, nom_Distribuidor, tel_Distribuidor, id_Producto, cantidad_Ingresada, fecha_Ingreso) VALUES (?, ?, ?, ?, ?, ?)";
        
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_Ingreso);
        $sql->bindValue(2, $nom_Distribuidor);
        $sql->bindValue(3, $tel_Distribuidor);
        $sql->bindValue(4, $id_Producto);
        $sql->bindValue(5, $cantidad_Ingresada);
        $sql->bindValue(6, $fecha_Ingreso);
        
        // Ejecuta la inserción en la tabla 'ingreso'
        $sql->execute();
        
        // Actualizar la cantidad en la tabla productos
        $sql = "UPDATE productos SET cantidad_Producto = cantidad_Producto + ? WHERE id_Producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cantidad_Ingresada);
        $sql->bindValue(2, $id_Producto);
        $sql->execute();
        
        // Puedes devolver algún mensaje o resultado si es necesario
        return "Ingreso registrado correctamente.";
    }
    
    public function get_ingreso_x_id($id_Producto){
      $conectar= parent::Conexion();
      parent::set_names();
      $sql="SELECT * FROM productos WHERE id_Producto = ?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $id_Producto);
      $sql->execute();
      return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

  }
        
    
}
?>