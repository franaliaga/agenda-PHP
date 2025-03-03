<?php
require_once __DIR__ . "/ConexionModel.php";
class BaseModel {
  public $conexion;
  
  public function __construct() {
    $this->conexion = (new ConexionModel())->connect();
  }
  public function commitBD() {
    try{
      if ($this->conexion->commit()) {
        return true;
      }else {
        $this->conexion->rollback();
        return false;
      }
    }catch(Exception $ex) {
      return false;
    }
  }
}

?>