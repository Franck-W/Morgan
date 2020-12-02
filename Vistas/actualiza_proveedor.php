<?php
  require_once '../Includes/proveedor.php.';
  $resultado=false;
  $objProveedor=new Proveedor();
  if(!empty($_POST))
  {
    $nif=$_POST['txtNif'];
    $nombre=$_POST['txtNombre'];
    $direccion=$_POST['txtDireccion'];
    $resultado=$objProveedor->Actualizar(
      $nif, $nombre, $direccion);
  }
  else{
    $nif=$_GET['nif'];
    $query=$objProveedor->consulta_nombre($nif);
    $row=$query->fetch(PDO::FETCH_ASSOC);
    $nif=$row['nif'];
    $nombre=$row['nombre'];
    $direccion=$row['direccion'];
  }
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Actualizacion de Provedores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../Estilos/altas.css">
    <link rel="stylesheet" href="../Estilos/estilos.css">

  </head>
  <body>
    <?php
    include 'menu.php'?>
    <h1 align="center">Actualizacion de Provedores</h1>
    <div class="container">
      <?php
      if($resultado){
        echo '<div class="alert alert-success">
        Actualizacion realizada!! </div>';
      }
      ?>
      <form action="actualiza_proveedor.php" method="post">
        <div class="row">
          <div class="col-25">
            <label for="fname">Nif</label>
          </div>
          <div class="col-75">
            <input type="text" id="Nif" name="txtNif" value="<?php echo $nif; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Nombre de la empresa</label>
          </div>
          <div class="col-75">
            <input type="text" id="txtNombre" name="txtNombre" value="<?php echo $nombre; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Direccion</label>
          </div>
          <div class="col-75">
            <input type="text" id="txtDireccion" name="txtDireccion" value="<?php echo $direccion; ?>">
          </div>
        </div>
        </div>
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
