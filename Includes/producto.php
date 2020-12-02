<?php
   require_once 'DB.php';
   class Producto
   {
     private $codigo, $nombre, $precio, $nif_proveedor, $ruta_foto;

     public function setCodigo($c)
     {
       $this->codigo=$c;
     }
     public function setNombre($n)
     {
       $this->nombre=$n;
     }
     public function setPrecio($p)
     {
       $this->precio=$p;
     }
     public function setNif_proveedor($np)
     {
       $this->nif_proveedor=$np;
     }
     public function setRuta_foto($r)
     {
       $this->ruta_foto=$r;
     }
     public function Alta()
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       try {
         $sql="INSERT INTO producto(codigo, nombre, precio, nif_proveedor, ruta_foto) VALUES (:codigo, :nombre, :precio, :nif_proveedor, :ruta_foto)";
         $query=$pdo->prepare($sql);
         $result=$query->execute([
           'codigo'=>$this->codigo,
           'nombre'=>$this->nombre,
           'precio'=>$this->precio,
           'nif_proveedor'=>$this->nif_proveedor,
           'ruta_foto'=>$this->ruta_foto
         ]);
       } catch (\Exception $e) {
         $result=false;
       }
       return $result;
     }
     public function lista_productos()
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       return $pdo->query("SELECT codigo, producto.nombre, precio, proveedor.nombre as proveedor, ruta_foto FROM producto, proveedor WHERE proveedor.nif=producto.nif_proveedor");
     }
     public function Actualizar($c, $n, $p, $np, $r)
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="UPDATE producto SET nombre=:nombre, precio=:precio, nif_proveedor=:nif_proveedor, ruta_foto=:ruta_foto WHERE codigo=:codigo";
       $query=$pdo->prepare($sql);
       $result=$query->execute([
         'codigo'=>$c,
         'nombre'=>$n,
         'precio'=>$p,
         'nif_proveedor'=>$np,
         'ruta_foto'=>$r
       ]);
       return $result;
     }
     public function consulta_codigo($codigo)
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="SELECT * FROM producto WHERE codigo=:codigo";
       $query=$pdo->prepare($sql);
       $result=$query->execute([
         'codigo'=>$codigo
       ]);
       return $query;
     }
     public function Borrar($codigo)
     {
       $conexion=new DB();
       $pdo=$conexion->Pdo();
       $sql="DELETE from producto WHERE codigo=:codigo";
       $query=$pdo->prepare($sql);
       $result=$query->execute([
         'codigo'=>$codigo
       ]);
       return $result;
     }
   }
 ?>
