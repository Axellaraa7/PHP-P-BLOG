<?php
require_once("./controller/UserController.php");

$userController = new UserController();

var_dump($userController->getAll());
?>
<h1>MAIN BLOG</h1>