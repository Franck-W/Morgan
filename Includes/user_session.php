<?php
  class userSession
  {
    public function __construct()
    {
      if (!isset($_SESSION))
        session_start();//mantener session activa
    }
    public function setCurrentUser($user)
    {
      $_SESSION['user']=$user;//pasarle a la session el nombre del usuario
    }
    public function setError($error)
    {
      $_SESSION['errorMessage']=$error;
      $_SESSION['error']=true;//tres cosas almacenadas en la variable de SESSION
    }
    public function Error()
    {
      if(isset($_SESSION['error']))
        return $_SESSION['error'];
      else
        return false;
    }
    public function getError()
    {
      return $_SESSION['errorMessage'];
    }
    public function getCurrentUser()
    {
      return $_SESSION['user'];
    }
    public function closeSession()
    {
      session_unset();
      session_destroy();
    }
  }
?>
