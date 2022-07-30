<?php
if(empty($_SESSION)) header("Location: ./");
require_once("./controller/UserController.php");
$title = "BLOGGIE / HOME";
$stylesheet = "home";
include_once("./view/templates/head.php");
include_once("./view/templates/headerBlog.php");
$userController = new UserController();
?>
<main>
  <section class="container-1140">
    <div class="userPost">
      <img src="<?php echo $urlImg; ?>" alt="profile img" class="imgUser">
    </div>
    <div>
      <form action="" method="post" enctype="multipart/form-data" class="formPost" id="formPost">
        <input type="hidden" name="idUser" value = "<?php echo $_SESSION["idUser"]; ?>">
        <input type="text" name="title"  placeholder="Ingresa un título a tu publicación" class="postNode">
        <div class="fileImgButton">
          <textarea name="body" id="" cols="30" rows="5" placeholder="¿Cómo estas hoy?, Compártelo!" class="postNode"></textarea>
          <div>
            <label for="imgPost" class="fa-solid fa-image"></label>
            <input type="file" name="imgPost" id="imgPost">
            <button type="submit" class="btn btnThird">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </section>
  <section class="container-1140" id="bloggie-main"></section>
</main>
<?php 
$banJS = true;
include_once("./view/templates/footer.php");
?>
