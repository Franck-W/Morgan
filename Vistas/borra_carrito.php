<?php
  include_once '../Includes/compras_temp.php';
  $clave=$_GET['clave'];
  $objCompras=new ComprasT();
  $res=$objCompras->Borrar($clave);
  if($res)
    echo '<script> alert("Registro eliminado"); </script>';
    header("Location:MiCarrito.php");

 ?>
