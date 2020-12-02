<?php
  include_once 'DB.php';
  class Compras
  {
    private $dniCliente, $codigo_producto, $cant, $fecha_compra;

    public function setdniCliente($dniC)
    {
      $this->$dniCliente=$dniC;
    }
    public function setcodigoProducto($cp)
    {
      $this->$codigo_producto=$cp;
    }
    public function setCant($c)
    {
      $this->cant=$c;
    }
    public function setFecha($f)
    {
      $this->$fecha_compra=$f;
    }
    public function Alta()
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();
      $sql="INSERT INTO compras (dni_cliente, codigo_producto,  cant, fecha_compra) VALUES (:dniC, :codP, :cant, :fc)";
      $query=$pdo->prepare($sql);
      $result=$query->execute([
        'dniC'=>$this->dniCliente,
        'codP'=>$this->codigo_producto,
        'cant'=>$this->cant,
        'fc'=>$this->fecha_compra
      ]);
      return $result;
    }
    public function realiza_compras($user)
    {
         //Pasar compras de temp a compras
         $conexion=new DB();
         $pdo=$conexion->Pdo();
         $hoy=date("Y/m/d");
         $sql="insert into compras (dni_cliente, codigo_producto, cant, fecha_compra)
               select idCliente, idProducto, cantidad,'".$hoy."'
               from compras_temp where idCliente=:user";
         $query=$pdo->prepare($sql);
         $result=$query->execute([
           'user'=>$user
         ]);
         //Borrar compras de temp de user
         $sql="DELETE FROM compras_temp where idCliente=:user";
         $query=$pdo->prepare($sql);
         $result=$query->execute([
           'user'=>$user
         ]);
    }
    public function reporte_ventas()//$user)
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();

      $sql="select cliente.nombre as cliente, compras.fecha_compra, producto.nombre as producto,
       producto.precio, compras.cant from cliente, compras, producto where cliente.dni=compras.dni_cliente
       and compras.codigo_producto=producto.codigo order by cliente";
      $query=$pdo->prepare($sql);
      $result=$query->execute();
      return $query;
    }
    public function reporte_ventas_cliente($dniCliente)
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();

      $sql="select cliente.nombre as cliente, compras.fecha_compra, producto.nombre as producto,
       producto.precio, compras.cant from cliente, compras, producto where cliente.dni=compras.dni_cliente
       and compras.codigo_producto=producto.codigo and compras.dni_cliente=:cliente";
      $query=$pdo->prepare($sql);
      $result=$query->execute([
        'cliente'=>$dniCliente]);
      return $query;
    }
    public function lista_clientes()
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();
      $sql="SELECT distinct cliente.nombre from compras, cliente WHERE cliente.dni=compras.dni_cliente";
      $query=$pdo->prepare($sql);
      $result=$query->execute();
      return $query;
    }
    public function regresa_dni_cliente($nombre)
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();
      $sql="SELECT distinct cliente.dni as id from compras, cliente WHERE cliente.dni=compras.dni_cliente and cliente.nombre=:nombre";
      $query=$pdo->prepare($sql);
      $result=$query->execute(['nombre'=>$nombre]);
      return $query;
    }
  }
 ?>
