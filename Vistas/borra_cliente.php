<?php
  require_once '../Includes/cliente.php';
  $clave=$_GET['dni'];
  $objCliente=new Cliente();
  $resultado=$objCliente->Borrar($clave);
  if ($resultado) {
    echo '<script> alert("Registro eliminado");</script>';
    header('Location:lista_cliente.php');
  }
?>
