<?php
require_once __DIR__ . "/../Models/AgendaModel.php";

class AgendaController {
  private $agendaModel;
  
  public function __construct() {
    $this->agendaModel = new Agenda();
  }
  
  public function insertContacto($nombre, $email, $tlf, $direccion) {
    return $this->agendaModel->insertContacto($nombre,$email,$tlf,$direccion);
  }
  
  public function deleteContacto($id) {
    return $this->agendaModel->deleteContacto($id);
  }
  
  public function updateContacto($id,$nombre,$email,$tlf,$direccion) {
    return $this->agendaModel->updateContacto($id,$nombre,$email,$tlf,$direccion);
  }
  
  public function getContactos() {
    $contactos = $this->agendaModel->getContactos();
    
    if ($contactos) {
      return $contactos;
    }else {
      return null;
    }
  }
}

?>