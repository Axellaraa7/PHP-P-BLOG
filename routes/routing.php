<?php
require_once("./routes/Route.php");

$route = new Route();

$username = (!isset($_SESSION["username"])) ? "axellaraa" : null;

$route->route("/", fn() =>  isset($_SESSION["logged"]) ? 
  header("Location: ./home") : header("Location: ./login")
);

$route->route("/index", fn() =>  isset($_SESSION["logged"]) ? 
  header("Location: ./home") : header("Location: ./login")
);

$route->route("/index.php", fn() =>  isset($_SESSION["logged"]) ? 
  header("Location: ./home") : header("Location: ./login")
);

$route->route("/login", fn() => require_once("./view/login.php"));

$route->route("/register",fn() => include_once("./view/register.php"));

$route->route("/home", fn() =>  isset($_SESSION["logged"]) ? 
  require_once("./view/blog.php") : header("Location: ./login")
);

$route->route("/my-profile/".$username, fn() => ($username) ? 
  require_once("./view/profile.php") : header("Location: /login")
);

$route->route("/404",fn() => require_once("./view/404.php"));

//$route->runXampp();
$route->run();

?>