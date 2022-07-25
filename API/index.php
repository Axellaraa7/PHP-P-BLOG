<?php
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Controll-Allow-Methods: GET,POST,PUT,DELETE");

require_once("./controller/PostController.php");

function createMessage($status,$msg){
  return json_encode(array("status" => $status, "msg" => $msg));
}

switch($_SERVER["REQUEST_METHOD"]){
  case "GET":
    $postController = new PostController();
    $results = (isset($_GET["id"])) ? 
    $postController->getById($_GET["id"]) : 
    (
      (isset($_GET["user"])) ?
      $postController->getByUser($_GET["user"]) :
      $postController->getAll()
    );
/*     if(isset($_GET["id"])) $results = ;
    else if(isset($_GET["user"])) $results = 
    else $results =  */
    echo $results;
    break;

  case "POST":
    $_POST = json_decode(file_get_contents("php://input"),TRUE);
    if(empty($_POST)) echo createMessage(204,"No data send");
    else{
      $postController = new PostController();
      echo ($postController->insert($_POST)) ? createMessage(201,"Post created") : createMessage(500,"Post create failed");
    }
    break;

  case "PUT":
    break;
  
  case "DELETE":
    break;
  
  default:
    echo createMessage(405,"No HTTP method accepted");
    break;
}