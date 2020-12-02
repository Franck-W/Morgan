<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estilos/registro.css">
  </head>
  <body>
  <form action="validar.php" method="post">
    <div class="container">

      <label for="text"><b>Nombre de usuario</b></label>
      <input type="text" placeholder="Nombre del usuario" name="usuario" required>

      <label for="txtNacimiento"><b>Fecha de Nacimiento</b></label><br>
      <input type="date" id="txtNacimiento" name="txtNacimiento" placeholder="Tu Fecha de Nacimiento es...">
      <br><br>
      <label for="txtTelefono"><b>Telefono</b></label><br>
      <input type="tel" id="txtTelefono" name="txtTelefono" placeholder="Tu Telefono es..."
          pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}"
          title="Un numero de telefono valido consiste en 3 digitos entre parentesis,
          que corresponde al codigo del area, un espacio en blanco, 3 digitos mas,
          luego espacio o guion (-) y otros 4 digitos mas" required>

      <br><br>
      <label for="text"><b>Username</b></label>
      <input type="text" placeholder="Usuario" name="Username" required>

      <label for="password"><b>Contraseña</b></label>
      <input type="password" placeholder="Contraseña" name="Password" required>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
        <button type="submit" class="signupbtn">Agregar</button>
      </div>
    </div>
  </form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
