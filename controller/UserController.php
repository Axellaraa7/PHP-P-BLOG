<?php 
require_once("./models/UserModel.php");
require_once("./db/ConnectionDB.php");

class UserController{
  private $userModel;
  private $connection;

  public function __construct(){
    $this->connection = ConnectionDB::getInstance("pruebasconexion")->getConnection();
    $this->userModel = new UserModel($this->connection);  

  }

  public function getAll(){
    return $this->userModel->getAll();
  }
  
  public function insert($data){
    return $this->userModel->insert($data);
  }
}

?>