<?php 
class UserModel implements iCrud{
  private $connection,$table,$id,$username,$name,$lastname,$email;

  public function getId(){ return $this->id; }
  public function setId(int $setter){ $this->id = $setter; }
  public function getUsername(){ return $this->username; }
  public function setUsername(string $setter){ $this->username = $setter; }
  public function getName(){ return $this->name; }
  public function setName(string $setter){ $this->name = $setter; }
  public function getLastname(){ return $this->lastname; }
  public function setLastname(string $setter){ $this->lastname = $setter; }
  public function getEmail(){ return $this->email; }
  public function setEmail(string $setter){ $this->email = $setter; }

  public function __construct($connection){
    $this->connection = $connection;
    $this->table = '"php-blog".usuarios';
  }

  public function getAll(){
    return pg_fetch_all(pg_query("SELECT * FROM $this->table"),PGSQL_ASSOC);
  }
  
}

?>