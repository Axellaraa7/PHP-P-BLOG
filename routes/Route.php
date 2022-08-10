<?php

class Route{
  private $routes;

  public function __construct(){
    $this->routes = array();
  }

  public function route(string $path, callable $callback){
    $this->routes[$path] = $callback;
  }

  public function run(){
    // $uri = explode("/",$_SERVER["REQUEST_URI"]);
    // $uri = "/".array_pop($uri);
    $found = false;
    foreach($this->routes as $path=>$callback){
      if($_SERVER["REQUEST_URI"] !== $path) continue;
      $found = true;
      $callback();
    }

    if(!$found) $this->routes["/404"]();
  }
}

?>