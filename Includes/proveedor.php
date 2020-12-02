<?php
   require_once 'DB.php';
   class Proveedor
   {
     private $nif, $nombre, $direccion;

     public function setNif($n)
     {
       $this->nif=$n;
     }
     public function setNombre($n)
     {
       $this->nombre=$n;
     }
     public function setDireccion($d)
     {
       $this->direccion=$d;
     }

     public function Alta()
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       try {
         $sql="INSERT INTO proveedor(nif, nombre, direccion) VALUES (:nif, :nombre, :direccion)";
         $query=$pdo->prepare($sql);
         $result=$query->execute([
           'nif'=>$this->nif,
           'nombre'=>$this->nombre,
           'direccion'=>$this->direccion
         ]);
       } catch (\Exception $e) {
         $result=false;
       }
       return $result;
     }
     public function lista_proveedores()
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       return $pdo->query("SELECT * FROM proveedor ");
     }
     public function Actualizar($dn, $n, $d)
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="UPDATE proveedor SET nombre=:nombre, direccion=:direccion WHERE nif=:nif";
       $query=$pdo->prepare($sql);
       $result=$query->execute([
         'nif'=>$dn,
         'nombre'=>$n,
         'direccion'=>$d

       ]);
       return $result;
     }
     public function consulta_dni($nombre)
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="SELECT * FROM proveedor WHERE nombre=:nombre";
       $query=$pdo->prepare($sql);
       $result=$query->execute([
         'nombre'=>$nombre
       ]);
       return $query;
     }
     public function consulta_nombre($nif)
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="SELECT * FROM proveedor WHERE nif=:nif";
       $query=$pdo->prepare($sql);
       $result=$query->execute([
         'nif'=>$nif
       ]);
       return $query;
     }
     public function Borrar($nif)
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();
      $sql="DELETE FROM proveedor WHERE nif=:nif";
      $query=$pdo->prepare($sql);
      $result=$query->execute(['nif'=>$nif]);
      return $result;
    }
   }
 ?>
