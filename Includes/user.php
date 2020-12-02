<?php
  include_once 'DB.php';
  class User extends DB
  {
    private $nombre;
    private $username;
    private $password;
    private $id_categoria;
    public function setNombre($n)
    {
      $this->nombre=$n;
    }
    public function getNombre()
    {
      return $this->nombre;
    }
    public function setUsername($u)
    {
      $this->username=$u;
    }
    public function setPassword($p)
    {
      $this->password=$p;
    }
    public function setIdCategoria($id)
    {
      $this->$id_categoria=$id;
    }
    public function Alta()
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();
      $sql="INSERT INTO usuarios(Nombre, Username, Password, id_categoria) VALUES
      (:nom, :user, :pass, 0)";
      $query=$pdo->prepare($sql);
      $result=$query->execute([
        'nom'=>$this->nombre,
        'user'=>$this->username,
        'pass'=>$this->password
      ]);
      return $result;
    }
    public function userExists($user, $pass)//argumento de la funcion
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();
      $sql="SELECT * FROM usuarios WHERE Username=:user";//'user' es una etiqueta
      $query=$pdo->prepare($sql);
      $query->execute([
        'user'=>$user
      ]);
      while($registro=$query->fetch(PDO::FETCH_ASSOC))//regresar renglon por renglon
      {
        if(password_verify($pass,$registro['Password']))//'password' debe ser igual que la base de datos; 'password_verify' desencripta
          return true;
        else {
          return false;
        }
      }
    }
    public function seleccionar_nombre($n)
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();
      $sql="SELECT * FROM usuarios WHERE Nombre=:nom";
      $query=$pdo->prepare($sql);
      $result=$query->execute(['nom'=>$n]);
      return $query;
    }
    public function setUser($user)
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();
      $sql="SELECT * FROM usuarios WHERE Username=:user";
      $query=$pdo->prepare($sql); //revisar esta linea
      $query->execute(['user'=>$user]);
      foreach ($query as $currentUser)//forma de hacer una consulta{
        $this->nombre=$currentUser['nombre'];//currentUser hace una asignaciòn
        $this->username=$currentUser['Username'];
    }
    public function regresa_categoria($user)
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();
      $sql="SELECT id_categoria from usuarios where username=:usuarios";
      $query=$pdo->prepare($sql); //revisar esta linea
      $result=$query->execute(['usuarios'=>$user]);
      return $query;
    }
    public function regresa_id($user)
    {
      $conexion=new DB();
      $pdo=$conexion->Pdo();
      $sql="SELECT id FROM usuarios WHERE username=:usuarios";
      $query=$pdo->prepare($sql); //revisar esta linea
      $result=$query->execute(['usuarios'=>$user]);
      return $query;
    }
  }
?>
