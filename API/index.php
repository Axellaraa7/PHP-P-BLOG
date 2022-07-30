<?php
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");

require_once("./controller/PostController.php");

function createMessage($status,$msg){
  return json_encode(array("status" => $status, "msg" => $msg));
}

$pathImg = "./img/";
switch($_SERVER["REQUEST_METHOD"]){
  case "GET":
    $postController = new PostController();
    if(isset($_GET["id"])) $results = $postController->getById($_GET["id"]);
    else if(isset($_GET["user"])) $results = $postController->getByUser($_GET["user"]);
    else if(isset($_GET["posts"]) && isset($_GET["offset"])) $results = $postController->getByOffset($_GET["posts"], $_GET["offset"]);
    else $results = $postController->getAll();

    echo $results;
    break;

  case "POST":
    if(empty($_POST["body"])) echo createMessage(204,"No data send");
    else{
      $filesName = null;
      if($_FILES["imgPost"]["error"] === 0){
        $filesName = $_FILES["imgPost"]["name"];
        $ban = move_uploaded_file($_FILES["imgPost"]["tmp_name"],$pathImg.$filesName);
        if(!$ban){
          echo createMessage(204,"Failed to upload the image");
          return;
        };
      }
      $postController = new PostController();
      echo ($postController->insert(array($_POST["idUser"],$_POST["title"],$_POST["body"],$filesName))) ? createMessage(201,"Post created") : createMessage(500,"Post create failed");
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