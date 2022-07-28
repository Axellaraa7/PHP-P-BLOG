<?php

class PostModel{
  private $connection;

  public function __construct($connection){
    $this->connection = $connection;
    $this->table = '"php-blog".post';
  }

  public function getAll(){
    $query = pg_query($this->connection, "SELECT u.username, p.title, p.body, p.img, p.date FROM $this->table AS p INNER JOIN ".'"php-blog".usuarios as u ON p.id_user = u.id order by p.date desc');
    return json_encode(pg_fetch_all($query,PGSQL_ASSOC));
  }

  public function getById($id){
    pg_prepare($this->connection,"selectById","SELECT * FROM $this->table WHERE id = $1");
    $execute = pg_execute($this->connection,"selectById",array($id));
    return ($execute) ? json_encode(pg_fetch_all($execute,PGSQL_ASSOC)) : null;
  }

  public function getByUser($user){
    pg_prepare($this->connection,"selectByUser","SELECT post.* FROM $this->table AS post inner join ".'"php-blog".usuarios as users ON post.id_user = users.id WHERE users.username = $1');
    $execute = pg_execute($this->connection,"selectByUser",array($user));
    return ($execute) ? json_encode(pg_fetch_all($execute,PGSQL_ASSOC)) : null;
  }

  public function insert($data){
    pg_prepare($this->connection,"insertPost","INSERT INTO $this->table (id_user,title,body,img,date) VALUES ($1,$2,$3,$4,LOCALTIMESTAMP);");
    return (!pg_execute($this->connection,"insertPost",$data)) ? false : true;
  }
}