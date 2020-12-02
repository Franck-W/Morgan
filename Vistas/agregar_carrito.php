<?php
   require_once '../Includes/compras_temp.php';
   $clave=$_GET['codigo'];
   $cliente=$_GET['cliente'];
   $objCompras=new ComprasT();
   $objCompras->setIdCliente($cliente);
   $objCompras->setIdProducto($clave);
   $res=$objCompras->Alta();
   if($res)
      echo '<script> alert("Agregó al carrito"); </script>';
   header("Location:ventas.php");
 ?>
