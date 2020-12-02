<?php
  require_once '../Includes/cliente.php';
  $objCliente=new Cliente();
  $result=$objCliente->lista_cliente();
?>
<header>
  <div class="container">
<center>
    <h1>Sistema de ventas</h1>
    <h3>Ejemplo: IAAS, PAAS, SAAS</h3>
    <h3>PAAS</h3>
</center>
  </div>

</header>
<div>
    <br>
    <header>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="#" class="navbar-brand">Ventas</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
              <span class="sr-only">Menu</span>
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navbar-1">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                 <a class="nav-link" href="lista_cliente.php">Clientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="lista_productos.php">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="lista_proveedores.php">Provedores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Includes/logout.php">Cerrar sesion</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="home.php">
                  Reportes en Pdf
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="reporte_ventas.php">Ventas generales</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="reporte_ventas_clientes.php">Ventas por clientes</a>

                </div>
              </li>

            <?php
                require_once '../Includes/user_session.php';
                $sesion=new userSession();
                $userName=$sesion->getCurrentUser();
             ?>
             <li class="nav-item">
                <a class="nav-link disabled navbar-left" href="#" tabindex="-1" aria-disabled="true">Bienvenido <?php echo $userName; ?></a>
              </li>
            </div>
         </div>
       </nav>
     </header>
   </div>
