<?php
   require_once '../Includes/cliente.php';

   $resultado=false;
   if(!empty($_POST))
   {
     $cliente=$_POST['cliente'];
     $objCliente=new Cliente();
     $query=$objCliente->consulta_dni($cliente);
     $row=$query->fetch(PDO::FETCH_ASSOC);
     $codigo_cliente=$row['dni'];
     $objCliente=new Cliente();

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
    <link rel="stylesheet" href="../Estilos/nuevo5.css">
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
    ?>
    <h1 align="center">Reporte por cliente</h1>
    <div class="container">
      <form action="reporte__ventas_clientes.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-25">
            <label for="cliente">Cliente</label>
          </div>
          <div class="col-75">
            <select class ="form-control" name="cliente" id="cliente">
              <?php
                  $objCliente=new Cliente();
                  $datos=$objCliente->lista_cliente();
                  while($row=$datos->fetch(PDO::FETCH_ASSOC))
                  {
                    echo '<option>'.$row['nombre'].'</option>';
                  }
               ?>
             </select>
          </div>

        </div>
        <div class="row">
          <input type="submit" value="Enviar">
        </div>
      </form>
    </div>
    <footer>
      <div class="footer-copyright text-center py-3">
          <h5>Aldair Sánz</h5>
          <h5>© 2019 <h5>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
