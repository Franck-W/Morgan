<?php
  include_once '../Includes/compras.php';
  include_once '../Includes/pdf.php';
  require_once '../Includes/cliente.php';
  $pdf=new Pdf();
  $objCompras=new Compras();
  $cliente=$_POST['cliente'];

  $cliente2=$objCompras->regresa_dni_cliente($cliente);

  $renglon=$cliente2->fetch(PDO::FETCH_ASSOC);
  $cliente3=$renglon['id'];

  $consulta=$objCompras->reporte_ventas_cliente($cliente3);
  $pdf->AliasNbPages();
  $pdf->AddPAge();
  $pdf->SetFillColor(232,232,232); //color gris en RG
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Cell(50,6,"Cliente",1,0,'C',1);
  // ancho, alto, mensaje, borde, salto de linea, centrado, color
  $pdf->Cell(50,6,"Producto",1,0,'C',1);
  $pdf->Cell(20,6,"Precio",1,0,'C',1);
  $pdf->Cell(20,6,"Cantidad",1,0,'C',1);
  $pdf->Cell(20,6,"Total",1,1,'C',1);
  $pdf->SetFont('Arial','',10);
  $total=0;
  while($renglon=$consulta->fetch(PDO::FETCH_ASSOC))
  {
    $pdf->Cell(50,6,utf8_decode($renglon['cliente']),1,0,'C',1);
    $pdf->Cell(50,6,utf8_decode($renglon['producto']),1,0,'C',1);
    $pdf->Cell(20,6,$renglon['precio'],1,0,'C',1);
    $pdf->Cell(20,6,$renglon['cant'],1,0,'C',1);
    $subtotal=$renglon['precio']*$renglon['cant'];
    $total=$total+$subtotal;
    $pdf->Cell(20,6,$subtotal,1,1,'C',1);
  }
  $pdf->Cell(140,6,'Total',1,0,'R',1);
  $pdf->Cell(20,6,$total,1,1,'C',1);
  $pdf->Output();
 ?>
