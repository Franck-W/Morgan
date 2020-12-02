<?php
   include_once '../Includes/compras.php';
   include_once '../Includes/user_session.php';
   include_once '../Includes/user.php';
   $user=new User();
   $userSession=new userSession();
   $compras=new Compras();
   $usuario=$userSession->getCurrentUser();
   $query=$user->regresa_id($usuario);
   $row=$query->fetch(PDO::FETCH_ASSOC);
   $id_usuario=$row['id'];
   $compras->realiza_compras($id_usuario);
   header("Location:ventas.php");
 ?>
