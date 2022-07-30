<?php
require_once("./models/PostModel.php");
require_once("./../db/ConnectionDB.php");
class PostController{
  private $connection,$postModel;

  public function __construct(){
    $this->connection =  ConnectionDB::getInstance("pruebasconexion")->getConnection();
    $this->postModel = new PostModel($this->connection);
  }

  public function getAll(){
    return $this->postModel->getAll();
  }

  public function getById($id){
    return $this->postModel->getById($id);
  }

  public function getByUser($user){
    return $this->postModel->getByUser($user);
  }

  public function getByOffset($limit,$offset){
    return $this->postModel->getByOffset($limit,$offset);
  }

  public function insert($data){
    return $this->postModel->insert($data);
  }
}