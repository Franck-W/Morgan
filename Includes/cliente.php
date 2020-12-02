<?php
    require_once 'DB.php';
    class Cliente
    {
      private $dni, $nombre, $fecha_nac, $telefono;
      public function setDni($dni)
      {
        $this->dni=$dni;
      }
      public function setNombre($nombre)
      {
        $this->nombre=$nombre;
      }
      public function setFecha($fecha)
      {
        $this->fecha_nac=$fecha;
      }
      public function setTel($tel)
      {
        $this->tel=$tel;
      }
      public function Alta()
      {
        $conexion=new DB();
        $pdo=$conexion->Pdo();
        try {
          $sql="INSERT INTO cliente(dni, nombre, fecha_nac, telefono) VALUES (:dni, :nombre, :fecha_nac, :telefono)";
          $query=$pdo->prepare($sql);
          $result=$query->execute([
            'dni'=>$this->dni,
            'nombre'=>$this->nombre,
            'fecha_nac'=>$this->fecha_nac,
            'telefono'=>$this->tel
          ]);
        } catch (\Exception $e) {
          $result=false;
        }
        return $result;
      }
      public function lista_cliente()
      {
        $conexion=new DB();
        $pdo=$conexion->Pdo();
        return $pdo->query("SELECT * FROM cliente");
      }
      public function Actualizar($c, $n, $f, $t)
      {
        $conexion=new DB();
        $pdo=$conexion->Pdo();
        $sql="UPDATE cliente SET nombre=:nombre, fecha_nac=:fecha, telefono=:tel WHERE dni=:clave";
        $query=$pdo->prepare($sql);
        $result=$query->execute([
          'clave'=>$c,
          'nombre'=>$n,
          'fecha'=>$f,
          'tel'=>$t
        ]);
        return $result;
      }
      public function consulta_dni($dni)
      {
        $conexion=new DB();
        $pdo=$conexion->Pdo();
        $sql="SELECT * FROM cliente WHERE dni=:dni";
        $query=$pdo->prepare($sql);
        $result=$query->execute(['dni'=>$dni]);
        return $query;
      }
      public function Borrar($dni)
      {
        $conexion=new DB();
        $pdo=$conexion->Pdo();
        $sql="DELETE FROM cliente WHERE dni=:dni";
        $query=$pdo->prepare($sql);
        $result=$query->execute(['dni'=>$dni]);
        return $result;
      }
    }
 ?>
