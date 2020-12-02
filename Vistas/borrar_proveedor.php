<?php
  require_once '../Includes/proveedor.php';
  $clave=$_GET['nif'];
  $objProveedor=new Proveedor();
  $resultado=$objProveedor->Borrar($clave);
  if($resultado)
    echo '<script> alert("Registro eliminado");
    </script>';
    header("Location:lista_proveedores.php");


 ?>
