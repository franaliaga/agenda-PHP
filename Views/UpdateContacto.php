<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar contacto</title>
  <link rel="stylesheet" href="../styles.css">
</head>

<body>
  <?php
  $id = $_GET["id"];
  $nombre = $_GET["nombre"];
  $email = $_GET["email"];
  $tlf = $_GET["tlf"];
  $direccion = $_GET["direccion"];

  echo "<form action='../index.php' method='GET'>";
  echo "<input type='text' value={$id} name='updateId' class='hiddenInput'>";
  echo "<label for='nombre'>Nombre</label>";
  echo "<input type='text' id='nombre' name='updateNombre' required value={$nombre}>";
  echo "<label for='email'>Email</label>";
  echo "<input type='email' id='email' name='updateEmail' required value={$email}>";
  echo "<label for='tlf'>Teléfono</label>";
  echo "<input type='tel' id='tlf' name='updateTlf' value={$tlf}>";
  echo "<label for='direccion'>Direccion</label>";
  echo "<input type='text' id='direccion' name='updateDireccion' value={$direccion}>";
  echo "<input type='submit' value='Actualizar'>";
  echo "</form>";
  ?>
</body>

</html>