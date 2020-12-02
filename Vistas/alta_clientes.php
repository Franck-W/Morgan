<?php
   require_once '../Includes/cliente.php';
   $resultado=false;
   if(!empty($_POST))
   {
     $dni=$_POST['txtDni'];
     $nombre=$_POST['txtNombre'];
     $fecha=$_POST['txtNacimiento'];
     $tel=$_POST['txtTelefono'];
     $objCliente=new Cliente();
     $objCliente->setDni($dni);
     $objCliente->setNombre($nombre);
     $objCliente->setFecha($fecha);
     $objCliente->setTel($tel);
     $resultado=$objCliente->Alta();
   }
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Alta de clientes</title>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="../Estilos/altas.css">
     <link rel="stylesheet" href="../Estilos/estilos.css">
     <script type="text/javascript">
       setTimeout(function())
       {
         document.getElementById("alert").style.display="none";
       },2000);
     </script>
   </head>
   <body>
     <?php
        include 'menu.php';
        if(!empty($_POST))
        {
          if($resultado)
          {
            echo '<div id="alert"><span id="Mensaje">
            Alta realizada</span></div>';
          }
          else {
            echo '<div id="alert"><span id="Mensaje">
            Error ! No se pudo insertar el registro
            </span></div>';
          }
        }
     ?>
     <h1 align="center">Alta de clientes</h1>
     <div class="container">
       <form action="alta_clientes.php" method="post">
         <div class="row">
           <div class="col-25">
             <label for="txtDni">Dni</label>
           </div>
           <div class="col-75">
             <input type="text" id="txtDni" name="txtDni" placeholder="Escriba el DNI">
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label for="txtNombre">Nombre</label>
           </div>
           <div class="col-75">
             <input type="text" id="txtNombre" name="txtNombre" placeholder="Su nombre">
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label for="txtNacimiento">Fecha de nacimiento</label>
           </div>
           <div class="col-75">
             <input type="date" id="txtNacimiento" name="txtNacimiento" >
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label for="txtTelefono">Teléfono</label>
           </div>
           <div class="col-75">
             <input type="tel" id="txtTelefono" name="txtTelefono"
             pattern ="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}"
             title="Un número de teléfono válido consiste en 3 dígitos entre paréntesis,
             que corresponde al código del área, un espacio en blanco, 3 dígitos más,
             luego espacio o guión (-) y otros 4 dígitos más" required >
           </div>
         </div>
         <div class="row">
           <input type="submit" value="Enviar">
         </div>
       </form>
     </div>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
 </html>
