<?php 
// $explode = explode("/",$_SERVER["SCRIPT_FILENAME"]);
// $filename = substr(array_pop($explode),0,-4);
$banJS = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <!-- <link rel="stylesheet" href="<?php echo "./view/scss/dist/$filename.css"; ?>"> -->
  <link rel="stylesheet" href="./view/scss/dist/<?php echo $stylesheet.".css";?>">
</head>
<body>
  
