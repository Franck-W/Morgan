<?php
   include_once '../Includes/compras_temp.php';
   $clave=$_GET['clave'];
   $objCompras=new ComprasT();
   $res=$objCompras->vaciar_carrito($clave);
   if($res)
      echo '<script> alert("Carrito eliminado"); </script>';
  header ("Location:MiCarrito.php");
 ?>
