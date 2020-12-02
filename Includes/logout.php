<?php
  include_once 'user_session.php';
  $userSession=new userSession();
  $userSession->closeSession();
  header('Location:../index.php');
 ?>
