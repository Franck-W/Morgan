<?php
   require_once '../Includes/producto.php';
   require_once '../Includes/proveedor.php';
   $resultado=false;
   if(!empty($_POST))
   {
     if($_FILES['archivo']['error']>0)
     {
       echo 'Error al cargar el archivo';
     }
     else {
       $permitidos=array("image/gif", "image/png", "image/jpg");
       $limite_kb=200;
       $path='../Imagenes/';
       $archivo=$path.$_FILES['archivo']['name'];
       if(!file_exists($path))
          mkdir($path);
      $copia=false;
      if(!file_exists($archivo))
      {
        $copia=@move_uploaded_file($_FILES['archivo']['tmp_name'],$archivo);
      }
     }
     $codigo=$_POST['txtCodigo'];
     $nombre=$_POST['txtNombre'];
     $precio=$_POST['txtPrecio'];
     $proveedor=$_POST['proveedor'];
     $ruta=$archivo;
     $objProvedor=new Proveedor();
     $query=$objProvedor->consulta_dni($proveedor);
     $row=$query->fetch(PDO::FETCH_ASSOC);
     $codigo_proveedor=$row['nif'];
     $objProducto=new Producto();
     $objProducto->setCodigo($codigo);
     $objProducto->setNombre($nombre);
     $objProducto->setPrecio($precio);
     $objProducto->setNif_proveedor($codigo_proveedor);
     $objProducto->setRuta_foto($ruta);
     $resultado=$objProducto->Alta();
   }
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Alta de productos</title>
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
              $mensaje="Alta realizada";
          }
          else {
              $mensaje="Error ! No se pudo insertar el registro";

          }
          if(file_exists($archivo))
             $mensaje.=" - Imagen del producto ya existia";
          if($copia)
             $mensaje.=" - Imagen del producto almacenada";

          echo '<div id="alert"><span id="Mensaje">'.$mensaje.
          '</span></div>';
        }
     ?>
     <h1 align="center">Alta de productos</h1>
     <div class="container">
       <form action="alta_productos.php" method="post" enctype="multipart/form-data">
         <div class="row">
           <div class="col-25">
             <label for="txtCodigo">Codigo</label>
           </div>
           <div class="col-75">
             <input type="text" id="txtCodigo" name="txtCodigo" placeholder="Escriba el codigo">
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label for="txtNombre">Nombre</label>
           </div>
           <div class="col-75">
             <input type="text" id="txtNombre" name="txtNombre" placeholder="Nombre del producto">
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label for="txtPrecio">Precio</label>
           </div>
           <div class="col-75">
             <input type="number" id="txtPrecio" name="txtPrecio" >
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label for="proveedor">Proveedor</label>
           </div>
           <div class="col-75">
             <select class ="form-control" name="proveedor" id="proveedor">
               <?php
                   $objProveedor=new Proveedor();
                   $datos=$objProveedor->lista_proveedores();
                   while($row=$datos->fetch(\PDO::FETCH_ASSOC))
                   {
                     echo '<option>'.$row['nombre'].'</option>';
                   }
                ?>
              </select>
           </div>
           <div class="form-group">
             <label for="archivo">Imagen del producto:</label>
             <input type="file" class="form-control" name="archivo" accept="image\*">
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
