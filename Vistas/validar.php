<?php
    require_once '../Includes/user.php';
    require_once '../Includes/user_session.php';
    require_once '../Includes/cliente.php';

    $nombre=$_POST['usuario'];
    $fecha=$_POST['txtNacimiento'];
    $telefono=$_POST['txtTelefono'];
    $usuario=$_POST['Username'];
    $pass=$_POST['Password'];
    $pass_encriptado=password_hash($pass, PASSWORD_DEFAULT);
    $user=new User();
    $sesion=new userSession();
    $user->setNombre($nombre);
    $user->setUsername($usuario);
    $user->setPassword($pass_encriptado);
    $res=$user->seleccionar_nombre($nombre);
    $row=$res->fetch(PDO::FETCH_ASSOC);
    if ($res->rowCount()!=0)
    {
      $errorLogin="Ya existe un usuario con ese nombre, favor de seleccionar otro nombre";
      $sesion->setError($errorLogin);
      header('Location:registro_usuario.php');
    }
    else
    {
      $sesion->setCurrentUser($usuario);
      $res2=$user->Alta();
      if ($res2!=0)
        echo "Insercion realizada";

      else
        echo "Error";

      $user->setUser($usuario);
      $query=$user->regresa_id($usuario);
      $row=$query->fetch(PDO::FETCH_ASSOC);
      $id=$row['id'];
      $objCliente=new Cliente();
      $objCliente->setDni($id);
      $objCliente->setNombre($nombre);
      $objCliente->setFecha($fecha);
      $objCliente->setTel($telefono);
      $res=$objCliente->Alta();
      if(!$res)
        echo 'Error al registrar el cliente';
      header('Location:home.php');
    }

 ?>
