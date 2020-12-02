<?php
   include_once '../fpdf/fpdf.php';
   class Pdf extends FPDF
   {
     function Header()
     {
       $this->Image("../Imagenes/logo.png",5,5,30);
       $this->SetFont('Arial','B',25);
       $this->Cell(30);
       $this->Cell(120,10,'Reporte de Ventas',0,0,'C');
       $this->Ln(20);
     }
     function Footer()
     {
       $this->setY(-15);
       $this->SetFont('Arial','I',8);
       $this->Cell(0,10,utf8_decode("Página ").$this->PageNo().
       "/{nb}",0,0,'C');
     }
   }
 ?>
