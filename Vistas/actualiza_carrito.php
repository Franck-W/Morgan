<?php
  include_once '../Includes/compras_temp.php';
  $id=$_GET['clave'];
  $cantidad=$_GET['cantidad'];
  $cliente=$_GET['cliente'];
  $producto=$_GET['producto'];
  $objCompras=new ComprasT();
  $objCompras->setIdCliente($cliente);
  $objCompras->setIdProducto($producto);
  $objCompras->setCantidad($cantidad);
  $objCompras->Actualizar($id, $cliente, $producto, $cantidad);
  header("Location:MiCarrito.php");
 ?>
