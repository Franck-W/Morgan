<?php
  //echo "hola";
  require_once '../Includes/proveedor.php';
  $objProveedor=new Proveedor();
  $resultado=$objProveedor->lista_proveedores();
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado de Provedores</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estilos/estilos.css">
  </head>
  <body style="background-color:#EAF4FF;">
    <?php include 'menu.php' ?>
    <div class="container" align="center">
      <h1>Proveedores</h1>
      <a href="alta_proveedor.php">Agregar nuevo proveedor</a>
      <table class="table">
        <tr>
          <th>Nif</th>
          <th>Nombre de la empresa</th>
          <th>Direccion</th>
        </tr>
        <?php
            while ($row=$resultado->fetch(\PDO::FETCH_ASSOC))
            {
              echo "<tr>";
              echo "<td>".$row['nif'].'</td>';
              echo "<td>".$row['nombre'].'</td>';
              echo "<td>".$row['direccion'].'</td';
              echo '<&nbsp>';
              echo '<td><a href="actualiza_proveedor.php?nif='.$row['nif'].'">  Editar</a></td>';
              echo '<td><a href="javascript:Confirmar('.$row['nif'].')">  Borrar</a></td>';
              echo "</tr>";
            }
         ?>
&nbsp;
      </table>

    </div>
    <script type="text/javascript">
    function Confirmar(clave)
    {
      var mensaje=confirm("¿Seguro que desea eliminar el registro");
      if (mensaje)
      {
        window.location.href="borrar_proveedor.php?nif="+clave;
      }
    }

    </script>
    <div class="footer">
      <small>Derechos reservados &copy; 2019</small>
      <h4>LOS COMPADRES</h4>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
