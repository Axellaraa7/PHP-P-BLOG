<?php
require_once("./routes/Route.php");

$route = new Route();

$route->route("/", function(){
  if(isset($_SESSION["logged"])) require_once("./view/blog.php");
  else require_once("./view/login.php");
});

$route->route("/home", fn() => require_once("./view/blog.php"));

$route->route("/login",fn() => include_once("./view/login.php"));

$route->route("/register",fn() => include_once("./view/register.php"));

$route->route("/404",function(){
  echo "<h1>Not Found</h1>";
});

$route->run();

?>