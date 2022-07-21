<?php 
class ConnectionDB{
  private $connection;

  public function __construct($dbname){
    $this->connection = pg_connect("host=localhost dbname=$dbname user=postgres password=180598") or die ("No se pudo conectar: ".pg_last_error());
  }

  public function getConnection(){ return $this->connection; }

  public function destroyConnection(){ pg_close($this->connection); }
}
?>