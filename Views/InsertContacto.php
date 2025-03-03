<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insertar Contacto</title>
  <link rel="stylesheet" href="../styles.css">
  </head>

<body>
  <form action="../index.php" method="GET">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="insertNombre" required>
    <label for="email">Email</label>
    <input type="email" id="email" name="insertEmail" required>
    <label for="tlf">Teléfono</label>
    <input type="tel" id="tlf" name="insertTlf">
    <label for="direccion">Direccion</label>
    <input type="text" id="direccion" name="insertDireccion">
    <input type="submit" value="Insertar">
  </form>
</body>

</html>