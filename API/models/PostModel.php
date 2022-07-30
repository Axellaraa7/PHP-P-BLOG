<?php

class PostModel{
  private $connection,$table;
  private $select,$orderDateDesc;

  public function __construct($connection){
    $this->connection = $connection;
    $this->table = '"php-blog".post';
    $this->select = "SELECT u.username,p.title,p.body,p.img,p.date FROM $this->table AS p INNER JOIN ".'"php-blog".usuarios AS u ON p.id_user = u.id ';
    $this->orderDateDesc = "ORDER BY p.date DESC";
  }

  public function getAll(){
    $query = pg_query($this->connection, $this->select.$this->orderDateDesc);
    return json_encode(pg_fetch_all($query,PGSQL_ASSOC));
  }

  public function getById($id){
    pg_prepare($this->connection,"selectById",$this->select."WHERE id = $1 ".$this->orderDateDesc);
    $execute = pg_execute($this->connection,"selectById",array($id));
    return ($execute) ? json_encode(pg_fetch_all($execute,PGSQL_ASSOC)) : null;
  }

  public function getByUser($user){
    pg_prepare($this->connection,"selectByUser",$this->select."WHERE users.username = $1 ".$this->orderDateDesc);
    $execute = pg_execute($this->connection,"selectByUser",array($user));
    return ($execute) ? json_encode(pg_fetch_all($execute,PGSQL_ASSOC)) : null;
  }

  public function getByOffset($limit,$offset){
    pg_prepare($this->connection,"getOffset",$this->select.$this->orderDateDesc." LIMIT $1 OFFSET $2");
    $execute = pg_execute($this->connection,"getOffset",array($limit,$limit*$offset));
    return ($execute) ? json_encode(pg_fetch_all($execute,PGSQL_ASSOC)) : null;
  }

  public function insert($data){
    pg_prepare($this->connection,"insertPost","INSERT INTO $this->table (id_user,title,body,img,date) VALUES ($1,$2,$3,$4,LOCALTIMESTAMP);");
    return (!pg_execute($this->connection,"insertPost",$data)) ? false : true;
  }
}