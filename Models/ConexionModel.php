<?php

class ConexionModel {
  
  private static $server = "localhost";
  private static $username = "root";
  private static $pass = "";
  private static $db = "agenda";
  private static $conexion = null;
  
  public static function connect() {
    if(!self::$conexion){
      try{
        self::$conexion = new PDO("mysql:host=" . self::$server . ";dbname=" . self::$db . ";charset=utf8", self::$username, self::$pass);
      }catch(Exception $e) {
        
      }
    }
    
    return self::$conexion;
  }
}

?>