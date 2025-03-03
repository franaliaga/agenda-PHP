<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=0.5">
  <title>Agenda</title>
  <link rel="stylesheet" href="./styles.css">
</head>

<body>
  <?php
  require_once "./Controllers/AgendaController.php";

  $agendaController = new AgendaController();

  if (isset($_GET["deleteId"]) && !empty($_GET["deleteId"])) {
    $deleteId = $_GET["deleteId"];
    $deleteResult = $agendaController->deleteContacto($deleteId);
    echo $deleteResult ? "<p class='resultText success'>Contacto borrado con éxito.</p>" : "<p class='resultText error'>No se ha podido borrar el contacto.</p>";
  }

  if (isset($_GET["insertNombre"]) && !empty($_GET["insertNombre"])) {
    $insertNombre = $_GET["insertNombre"];
    $insertEmail = $_GET["insertEmail"];
    $insertTlf = $_GET["insertTlf"];
    $insertDireccion = !empty($_GET["insertDireccion"]) ? $_GET["insertDireccion"] : null;

    $insertResult = $agendaController->insertContacto($insertNombre, $insertEmail, $insertTlf, $insertDireccion);

    echo $insertResult ? "<p class='resultText success'>Contacto añadido con éxito.</p>" : "<p class='resultText error'>No se ha podido añadir el contacto.</p>";
  }

  if (isset($_GET["updateId"]) && !empty($_GET["updateId"])) {
    $updateId = $_GET["updateId"];
    $updateNombre = $_GET["updateNombre"];
    $updateEmail = $_GET["updateEmail"];
    $updateTlf = $_GET["updateTlf"];
    $updateDireccion = $_GET["updateDireccion"] = "" ? $_GET["updateDireccion"] : null;

    $updateResult = $agendaController->updateContacto($updateId, $updateNombre, $updateEmail, $updateTlf, $updateDireccion);

    echo $updateResult ? "<p class='resultText success'>Contacto actualizado con éxito.</p>" : "<p class='resultText error'>No se ha podido actualizar el contacto.</p>";
  }

  $contactos = $agendaController->getContactos();
  ?>

  <table>
    <?php
    if ($contactos) {
      echo "<tr>";
      echo "<th>Nombre</th>";
      echo "<th>Email</th>";
      echo "<th>Teléfono</th>";
      echo "<th>Dirección</th>";
      echo "<th></th>";
      echo "<th></th>"; 
      echo "</tr>";
      foreach ($contactos as $contacto) {
        $direccion = $contacto["direccion"] ? $contacto["direccion"] : "Sin dirección";
        echo "<tr>";
        echo "<td>{$contacto["nombre"]}</td>";
        echo "<td>{$contacto["email"]}</td>";
        echo "<td>{$contacto["tlf"]}</td>";
        echo "<td>{$direccion}</td>";
        echo "<td><a href='./Views/UpdateContacto.php?id={$contacto["id_contacto"]}&nombre={$contacto["nombre"]}&email={$contacto["email"]}&tlf={$contacto["tlf"]}&direccion={$contacto["direccion"]}'>Modificar</a></td>";
        echo "<td><a href='./index.php?deleteId={$contacto["id_contacto"]}'>Borrar</a></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr>";
      echo "<td> No hay contactos </td>";
      echo "</tr>";
    }
    ?>
  </table>
  <a href="./Views/InsertContacto.php" class="insertButton">Insertar</a>
</body>

</html>