<?php
  include 'Includes/user.php';
  include 'Includes/user_session.php';
  $userSession=new userSession();
  $user=new User();
  //
  if(isset($_SESSION['user']))//para verificar si alguine ya se logeo
  {
    //echo "Hay sesión";
    $user->setUser($userSession->getCurrentUser());
    header('Location: Vistas/home.php');
  }//para verificar el usuario y password
  elseif (isset($_POST['Username']) && isset($_POST['Password']))
  {
    //echo "Validación de login";
    $userForm=$_POST['Username'];
    $passForm=$_POST['Password'];
    if ($user->userExists($userForm, $passForm))
    {
      $userSession->setCurrentUser($userForm);
      $user->setUser($userForm);
      header('Location:vistas/home.php');
    }
    else {
      $errorLogin="Nombre de usuario y/o password incorrecto";
      $userSession->setError($errorLogin);
      header('Location:vistas/login.php');
    }
  }//Si no existe sesion ni se ha dado un usuario
  else {
    //echo "Login";
    header('Location:vistas/login.php');
  }
?>
