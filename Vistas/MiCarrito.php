<?php
   include_once '../Includes/compras_temp.php';
   include_once '../Includes/user_session.php';
   include_once '../Includes/user.php';
   $objCompras=new ComprasT();
   $userSession=new userSession();
   $user=new User();
   $usuario=$userSession->getCurrentUser();
   $query=$user->regresa_id($usuario);
   $row=$query->fetch(PDO::FETCH_ASSOC);
   $id_usuario=$row['id'];
   $resultado=$objCompras->lista_compra($id_usuario);
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mi Carrito</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estilos/estilos.css">
  </head>
<body style="background-color: #EAF4FF ">
     <?php
         $query=$user->regresa_categoria($usuario);
         $row=$query->fetch(PDO::FETCH_ASSOC);
         $categoria=$row['id_categoria'];
         if($categoria==1)
            include 'menu.php';
        else {
            include_once 'menu_cliente.php';
        }

      ?>
     <form action="guardar_carrito.php" method="post">
        <div class="container" align="center">
          <h1>Mis compras</h1>
          <table class="table">
            <tr>
              <th>Acción</th>
              <th>Foto</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
            </tr>
            <?php
                $total=0;
                while($row=$resultado->fetch(PDO::FETCH_ASSOC))
                {
                  echo '<tr>';
                  echo '<td><a href="javascript:Confirmar('.$row['id'].')">Borrar </a></td>';
                  echo '<td><img src="'.$row['ruta_foto'].'" width="100" height="100"></td>';
                  echo '<td>'.$row['nombre'].'</td>';
                  echo '<td>'.$row['precio'].'</td>';
                  echo '<td><select onchange="actualizar_producto_carrito('.$row['id'].','
                  .$row['idCliente'].','.$row['idProducto']. ')" id="cantidad" name="cantidad">';
                  $cant=0;
                  for($x=1; $x<11;$x++)
                  {
                    if($row['cantidad']==$x)
                    {
                      echo '<option selected="selected">'.$x.'</option>';
                      $cant=$x;
                    }
                    else {
                      echo '<option>'.$x.'</option>';
                    }
                  }
                  echo '</tr>';
                  $total=$total+$row['precio']*$cant;
                }
             ?>
          </table>
          <h1 id="total">Total: <strong>
            <?php
               echo $total;
            ?>
          </strong></h1>
          <input type="submit" value="Realizar la compra">
          <br>
          <?php
              echo '<a href="javascript:Confirmar2('.$id_usuario.')">
              Vaciar carrito </a>';
           ?>
        </div>
     </form>
     <script type="text/javascript">
       function Confirmar(clave)
       {
         var mensaje=confirm("¿Seguro que desea eliminar el registro?");
         if(mensaje)
            window.location.href="borra_carrito.php?clave="+clave;
       }
       function Confirmar2(clave)
       {
         var mensaje=confirm("¿Seguro que desea vaciar el carrito?");
         if(mensaje)
            window.location.href="vacia_carrito.php?clave="+clave;
       }
       function actualizar_producto_carrito(clave, cliente, producto)
       {
         cantidad=document.getElementById('cantidad').value;
         window.location.href="actualiza_carrito.php?clave="+clave+"&cantidad="+
         cantidad+"&cliente="+cliente+"&producto="+producto;
       }
     </script>
     <footer>
       <div class="container">
           <h3>LOS COMPADRES AJUA</h3>
       </div>

     </footer>
     <div class="footer">
       <small>Derechos reservados &copy; 2020</small>
       <h3>LOS COMPADRES AJUA</h3>
     </div>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
