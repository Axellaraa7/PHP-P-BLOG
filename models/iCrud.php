<?php 
interface iCrud{
  public function getAll();
  public function getById($id);
  public function insert($data);
  public function update($data,$id);
  public function delete($id);
}
?>
