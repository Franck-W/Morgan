<header>
  <div class="container">
      <div align="Center">
              <img src='../Imagenes/logo.png' width="110" height="80">
      </div>
    <center><h3>ISTORE TIENDA DE ELECTRONICA</h3><h3>SAAS</h3>
  </div>
</header>
<div>
    <header>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="" class="navbar-brand">Ventas</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
              <span class="sr-only">Menu</span>
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navbar-1">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                 <a class="nav-link" href="ventas.php">Ventas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="MiCarrito.php">Mi Carrito</a>
              </li
              <li class="nav-item">
                <a class="nav-link" href="../Includes/logout.php">Cerrar sesion</a>
              </li>
            </ul>
            <?php
                require_once '../Includes/user_session.php';
                $sesion=new userSession();
                $userName=$sesion->getCurrentUser();
             ?>
             <li class="nav-item">
               <a class="nav-link disabled navbar-left" href="#" tabindex="-1" aria-disabled="true">Bienvenido(a) <?php echo $userName; ?></a>
             </li>
           </div>
        </div>
      </nav>
    </header>
  </div>
