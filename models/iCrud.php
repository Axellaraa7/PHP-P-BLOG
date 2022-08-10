<?php 
interface iCrud{
  public function getAll();
  public function getNameUser($id);
  public function insert($data);
  public function update($data,$id);
  public function delete($id);
}
?>
