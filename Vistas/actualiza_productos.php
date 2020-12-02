<?php
  require_once '../Includes/producto.php';
  require_once '../Includes/proveedor.php';
  $resultado=false;
  $objProducto=new Producto();
  $objProveedor=new Proveedor();
  if(!empty($_POST))
  {//GUARDA
    if ($_FILES['archivo']['error']>0) {
      $archivo=$_POST['RutaEscondida'];
      $copia=false;
    }
    else {
      $permitidos=array("image/gif", "image/png", "image/jpg");
      $limite_kb=200;
      $path="../Imagenes/";
      $archivo=$path.$_FILES['archivo']['name'];
      if (!file_exists($path))
        mkdir($path);
      $copia=false;
      if(!file_exists($archivo))
        $copia=@move_uploaded_file($_FILES['archivo']['tmp_name'],$archivo);
    }
    $codigo=$_POST['txtCodigo'];
    $nombre=$_POST['txtNombre'];
    $precio=$_POST['txtPrecio'];
    $proveedor=$_POST['proveedor'];
    $ruta_foto=$archivo;
    $query=$objProveedor->consulta_dni($proveedor);
    $row=$query->fetch(PDO::FETCH_ASSOC);
    $nif_proveedor=$row['nif'];//NIF igual que la base de datos
    $resultado=$objProducto->Actualizar(
      $codigo, $nombre, $precio, $nif_proveedor, $ruta_foto);
  }
  else {//MUESTRA
    $codigo=$_GET['codigo'];
    $query=$objProducto->consulta_codigo($codigo);
    $row=$query->fetch(PDO::FETCH_ASSOC);
    $clave=$codigo;
    $nombre=$row['nombre'];
    $precio=$row['precio'];
    $nif_proveedor=$row['nif_proveedor'];
    $ruta_foto=$row['ruta_foto'];
    $query=$objProveedor->consulta_nombre($nif_proveedor);
    $row=$query->fetch(PDO::FETCH_ASSOC);
    $nombre_proveedor=$row['nombre'];
  }
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Actualización de productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estilos/altas.css">
    <link rel="stylesheet" href="../Estilos/estilos.css">
  </head>
  <body>
    <?php include 'menu.php'; ?>
    <h1 aling="center">Actualización de productos</h1>
    <div class="container">
      <?php

        if (!empty($_POST)) {
          $mensaje="";
        if ($resultado)
          $mensaje="Actualización realizada!!";
        if ($copia)
          $mensaje="Imagen del producto almacenada";
        echo '<div class="alert alert-success">'.$mensaje.'</div>';
        }
      ?>
      <form action="actualiza_productos.php" method="post" enctype="multipart/form-data">
              <img name="txtRuta" src="<?php echo $ruta_foto; ?>" width="100" height="100" align="center">
              <label for="archivo">Seleccione una nueva imagen:</label>
              <input type="file" id="archivo" name="archivo" class="form-control" accept="image/*">
              <input type="hidden" name="RutaEscondida" value=" <?php echo $ruta_foto; ?>">
              <br>
              <div class="row">
              <div class="col-75">
                <label for="txtCodigo">Codigo</label>
                <input type="text" id="txtCodigo" name="txtCodigo" value="<?php echo $codigo; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="txtNombre">Nombre</label>
                </div>
                <div class="col-75">
                  <input type="text" id="txtNombre" name="txtNombre" value="<?php echo $nombre; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="txtPrecio">Precio</label>
                </div>
                <div class="col-75">
                  <input type="number" id="txtPrecio" name="txtPrecio" value="<?php echo $precio; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="proveedor">Proveedor</label>
                </div></div>
                <div class="col-75">
                 <select class ="form-control" name="proveedor" id="proveedor">
              <?php
                $objProveedor=new Proveedor();
                $datos=$objProveedor->lista_proveedores();
                while ($row=$datos->fetch(PDO::FETCH_ASSOC)) {
                  if ($row['nombre']==$nombre_proveedor)
                    echo '<option selected="selected">'.$row['nombre'].'</option>';
                  else
                    echo '<option>'.$row['nombre'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <input type="submit" value="Actualizar">
        </div>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
