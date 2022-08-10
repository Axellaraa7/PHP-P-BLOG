<?php 
require_once("./models/iCrud.php");

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

  public function getNameUser($id){
    pg_prepare($this->connection, "getById", "SELECT name,lastname FROM $this->table WHERE id = $1");
    $results = pg_fetch_row(pg_execute($this->connection, "getById", array($id)));
    return ($results) ?: false;
  }

  public function authUser($data){
    $results = $this->userExists($data["username"])[0];
    $results = (!empty($results)) ? $results : $this->emailExists($data["username"])[0];
    return (!empty($results) &&  password_verify($data["password"],$results["password"])) ? $results : false;
    /* return (password_verify($data["password"],$results["password"])) ? array("name"=>$results["name"],"lastname"=>$results["lastname"],"username"=>$results["username"]) : false; */
  }

  public function insert($data){
    pg_prepare($this->connection,"insertuser","INSERT INTO $this->table (username,name,lastname,email,password) VALUES ($1,$2,$3,$4,$5)");
    $execute = pg_execute($this->connection,"insertuser",array($data["username"],$data["name"],$data["lastname"],$data["email"],password_hash($data["password"],PASSWORD_DEFAULT)));
    return $execute;
  }

  public function update($data,$id){

  }

  public function delete($id){

  }

  private function userExists($username){
    pg_prepare($this->connection,"getuser","SELECT * FROM  $this->table WHERE username = $1");
    $userCount =  pg_fetch_all(pg_execute($this->connection,"getuser",array($username)));
    return $userCount; 
  }

  private function emailExists($username){
    pg_prepare($this->connection,"getemail","SELECT * FROM  $this->table WHERE email = $1");
    $userCount =  pg_fetch_all(pg_execute($this->connection,"getemail",array($username)),PGSQL_ASSOC);
    return $userCount;
  }
}

?>