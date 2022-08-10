<?php 
require_once("./controller/UserController.php");
$title = "BLOGGIE / My profile";
$stylesheet = "profile";
include_once("./view/templates/head.php");
include_once("./view/templates/headerBlog.php");

$userController = new UserController();
// $dataUser = $userController->getNameUser($_SESSION["id"]);
$nameUser = (ucwords(implode(" ",$userController->getNameUser(1))));
$countPost = rand(1,250);

?>

<main>
  <section class="container-1140">
    <figure class="profile_background">
      <img src="" alt="background user">
    </figure>
    <div class="profile_bioUser">
      <div class="profile_userImg">
        <figure class="profile_img">
          <img src="<?php echo $urlImg ?>" alt="">
        </figure>
        <div class="profile_stadisticsUser">
          <div class="profile_infoUser">
            <h2><?php echo $nameUser ?></h2>
            <p><span><?php echo $countPost ?></span> posts</p>
          </div>
          <div class="profile_infoUser2">
            <button class="btn btnMain">Create post</button>
          </div>
        </div>
      </div>
      <div class="profile_userActions">
        <ul>
          <li>Posts</li>
          <li>Información</li>
          <li>Fotos</li>
          <li>Configuración</li>
        </ul>
      </div>
    </div>
  </section>
</main>

<section class="container-1140"></section>