<?php 
class ConnectionDB{
  private $connection;
  private static $instance;

  private function __construct($dbname){
    $this->connection = pg_connect("host=localhost dbname=$dbname user=postgres password=180598") or die ("No se pudo conectar: ".pg_last_error());
  }

  public static function getInstance($dbname){
    if(!isset(self::$instance)){
      self::$instance = new ConnectionDB($dbname);
    }
    return self::$instance;
  }

  public function getConnection(){ return $this->connection; }

  public function destroyConnection(){ pg_close($this->connection); }

  public function __clone(){
    trigger_error("NO SE PUEDE CLONAR EL OBJETO");
  }
}
?>