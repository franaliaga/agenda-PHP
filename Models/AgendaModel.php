<?php
require_once __DIR__ . "/BaseModel.php";
class Agenda extends BaseModel {
  
  public function getContactos() {
    $stmt = $this->conexion->query("SELECT * FROM contactos");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function insertContacto($nombre, $email, $tlf, $direccion) {
    $this->conexion->beginTransaction();
    $stmt = $this->conexion->prepare("INSERT IGNORE INTO contactos (nombre,email,tlf,direccion) VALUES (:nombreContacto, :emailContacto, :tlfContacto, :direccionContacto)");
    $stmt->bindParam(":nombreContacto", $nombre);
    $stmt->bindParam(":emailContacto", $email);
    $stmt->bindParam(":tlfContacto", $tlf);
    $stmt->bindParam(":direccionContacto", $direccion);
    $stmt->execute();
    return $this->commitBD();
  }
  
  public function deleteContacto($idContacto) {
    $this->conexion->beginTransaction();
    $stmt = $this->conexion->prepare("DELETE FROM contactos WHERE id_contacto = :idContacto");
    $stmt->bindParam(":idContacto", $idContacto);
    $stmt->execute();
    return $this->commitBD();
  }
  
  public function updateContacto($idContacto, $nombre, $email, $tlf, $direccion) {
    $this->conexion->beginTransaction();
    $stmt = $this->conexion->prepare("UPDATE contactos SET nombre = :nombreContacto, email = :emailContacto, tlf = :tlfContacto, direccion = :direccionContacto WHERE id_contacto = :idContacto");
    $stmt->bindParam(":nombreContacto", $nombre);
    $stmt->bindParam(":emailContacto", $email);
    $stmt->bindParam(":tlfContacto", $tlf);
    $stmt->bindParam(":direccionContacto", $direccion);
    $stmt->bindParam(":idContacto", $idContacto);
    $stmt->execute();
    return $this->commitBD();
  }
}

?>