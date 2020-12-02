<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Elegant Modal Login Modal Form with Avatar Icon</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href='../Estilos/login3.css'>
<script type="text/javascript">
  function imprime_error(valor)
  {
    var nodo=document.createElement('p');
    var texto=document.createTextNode(valor);
    nodo.appendChild(texto);
    document.getElementById('Error').appendChild(nodo);
  }
</script>
</head>
<div class="container">
  <form action="../Index.php" method="post" style="max-width:900px; margin:auto">
    <div class="container">

      <p id="Error" align="center" style="color:#FF0000"></p>
      <?php
        include_once '../Includes/user_session.php';
        $userSession=new userSession();
        if($userSession->Error())
        {
          echo "<script>imprime_error('".$userSession->getError()."'); </script>";
        }
      ?>
<body>
<div class="text-center">
	<!-- Button HTML (to Trigger Modal) -->
	<a href="#myModal" class="trigger-btn" data-toggle="modal">Haga click aqui para inicar sesion</a>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src='../Imagenes/avatar.png' alt="Avatar">
				</div>
				<h4 class="modal-title">Inicio de Sesion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="../Index.php" method="post">
					<div class="form-group">
					<input type="text" placeholder="Username" name="Username" required>
					</div>
					<div class="form-group">
						<<input type="password" placeholder="Contraseña" name="Password" required>
					</div>
          <button type="submit" class="btn">Register</button>
          <span >¿Desea <a href="registro_usuario.php"> registrarse</a>?</span>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#">Forgot Password?</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
