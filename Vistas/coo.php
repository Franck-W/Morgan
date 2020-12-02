<?php
  include_once '../Includes/producto.php';
  include_once '../Includes/user_session.php';
  include_once '../Includes/user.php';
  $objProducto=new Producto();
  $resultado=$objProducto->lista_productos();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../Estilos/mostrar_productos.css">
<link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
  <?php
      include_once '../Includes/user_session.php';
      include_once '../Includes/user.php';
      $userSession=new userSession();
      $user=new User();
      $usuario=$userSession->getCurrentUser();
      $query=$user->regresa_categoria($usuario);
      $row=$query->fetch(PDO::FETCH_ASSOC);
      $categoria=$row['id_categoria'];
      IF($categoria==1)
        include 'menu.php';
      else {
        include_once 'menu_cliente.php';
      }
     ?>
  <h3><center>Selecciona los productos que vas a adquirir, usando el boton comprar</center></h3>
  <br>
  <?php
    $contador=0;
    echo '<button type="button" class="btn btn-primary">Carrito <span id="contador"
    class="badge"></span></button>';

      for ($i=0; $i<3; $i++) {
      echo '<div class="row">';
      while ($renglon=$resultado->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="column">';
        echo '<div class="card">';
        echo '<br>';
        echo '<img src="'.$renglon['ruta_foto'].'" alt="'.$renglon['nombre'].'" style="width:100%" width="100" height="150" align="center">';
        echo '<div class="container">';
        echo '<h4 align="center">'.$renglon['nombre'].'</h4>';
        echo '<h4 align="center">$ '.$renglon['precio'].'</h4>';
        $sesion= new userSession();
        $userName=$sesion->getCurrentUser();
        $user=new User();
        $query=$user->regresa_id($userName);
        $row=$query->fetch(PDO::FETCH_ASSOC);
        $idC=$row['id'];
        echo '<p><button class="button" onclick="Llenar_carrito('.$renglon['codigo'].','.$idC.','.$contador++.')">Comprar</button></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      echo '</div>';
    }
  ?>
  <script type="text/javascript">
    function Llenar_carrito(codProducto, codCliente, numProductos){
      window.location.href="agregar_carrito.php?codigo="+codProducto+"&cliente="+codCliente;
      document.getElementById("contador").innerHTML=numProductos;
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  </html>
