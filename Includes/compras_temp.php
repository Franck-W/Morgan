<?php
   include_once 'DB.php';
   class ComprasT
   {
     private $idCliente, $idProducto, $cantidad;
     public function setIdCliente($IdC)
     {
       $this->idCliente=$IdC;
     }
     public function setIdProducto($idProducto)
     {
       $this->idProducto=$idProducto;
     }
     public function setCantidad($c)
     {
       $this->cantidad=$c;
     }
     public function Alta()
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="INSERT INTO compras_temp(idCliente, idProducto, cantidad) VALUES
       (:idC, :idP, 1)";
       $query=$pdo->prepare($sql);
       $result=$query->execute([
         'idC'=>$this->idCliente,
         'idP'=>$this->idProducto
       ]);
       return $result;
     }
     public function lista_compra()
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="SELECT id, idCliente, idProducto,cantidad,ruta_foto, nombre, precio FROM
       producto, compras_temp WHERE producto.codigo=compras_temp.idProducto";
       $query=$pdo->prepare($sql);
       $result=$query->execute();
       return $query;
     }
     public function Borrar($codigo)
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="DELETE FROM compras_temp WHERE id=:codigo";
       $query=$pdo->prepare($sql);
       $result=$query->execute(['codigo'=>$codigo]);
       return $result;
     }
     public function Actualizar($cod, $cl, $p, $ca)
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="UPDATE compras_temp SET idCliente=:cliente, idProducto=:producto,
       cantidad=:cantidad WHERE id=:codigo";
       $query=$pdo->prepare($sql);
       $result=$query->execute([
         'codigo'=>$cod,
         'cliente'=>$cl,
         'producto'=>$p,
         'cantidad'=>$ca
       ]);
       return $result;
     }
     public function vaciar_carrito($codigo)
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="DELETE FROM compras_temp WHERE idCliente=:codigo";
       $query=$pdo->prepare($sql);
       $result=$query->execute(['codigo'=>$codigo]);
       return $result;
     }
   }
 ?>
