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

  public function getNameUser($id){
    return $this->userModel->getNameUser($id);
  }

  public function authUser($data){
    return $this->userModel->authUser($data);
  }
  
  public function insert($data){
    return $this->userModel->insert($data);
  }
}

?>