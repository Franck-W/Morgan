<?php
    require_once '../Includes/proveedor.php';
    $resultado=false;
    if (!empty($_POST))
    {
      $nif=$_POST['txtNif'];
      $nombre=$_POST['txtNombre'];
      $direccion=$_POST['txtDireccion'];
      $objProveedor=new Proveedor();
      $objProveedor->setNif($nif);
      $objProveedor->setNombre($nombre);
      $objProveedor->setDireccion($direccion);
      $resultado=$objProveedor->Alta();

    }
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Alta de Proveedor</title>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <link rel="stylesheet" href="../Estilos/altas.css">
     <link rel="stylesheet" href="../Estilos/estilos.css">
     <script type="text/javascript">
     setTimeout(function())
     {
       document.getElementById("alert").style.display="none";
     },4000);
     </script>
   </head>
   <body style="background-color:#EAF4FF;">
     <?php
     include 'menu.php';
     if(!empty($_POST))
     {
       if($resultado)
       {
         echo '<div id="alert"><span id="Mensaje">Alta realizada</span></div>';

       }
       else
       {
         echo '<div id="alert"><span id="Mensaje">Error ! No se puede insertar el registro</span></div>';
       }
     }
     ?>
     <div class="container">
       <form action="alta_proveedor.php" method="post">
         <div class="row">
           <div class="col-25">
             <label for="fname">Nif</label>
           </div>
           <div class="col-75">
             <input type="text" id="Nif" name="txtNif" placeholder="Tu Nif es...">
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label for="lname">Nombre de la empresa</label>
           </div>
           <div class="col-75">
             <input type="text" id="txtNombre" name="txtNombre" placeholder="Tu nombre es...">
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label for="lname">Direccion</label>
           </div>
           <div class="col-75">
             <input type="text" id="txtDireccion" name="txtDireccion" placeholder="Su direccion es...">
           </div>
         </div>
         </div>
         <div class="row">
           <input type="submit" value="Añadir">
         </div>
       </form>
     </div>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   </body>
 </html>
