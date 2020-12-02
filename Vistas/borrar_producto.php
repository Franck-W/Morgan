<?php
require_once '../Includes/producto.php';
  $clave=$_GET['clave'];
  $objProducto=new Producto();
  $resultado=$objProducto->Borrar($clave);
  if ($resultado) {
    echo '<script> alert("Registro eliminado");</script>';
    header('Location:lista_productos.php');
  }
?>
