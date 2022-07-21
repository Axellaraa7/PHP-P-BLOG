<?php
class Loader{
  public static function loader(){
    spl_autoload_register(function($classname){
      $modelsPath = "./models/".$classname.".php";
      $controllersPath = "./controller/".$classname.".php";
      if(file_exists($modelsPath)) require_once($modelsPath);
      if(file_exists($controllersPath)) require_once($controllersPath);
    });
  }
}