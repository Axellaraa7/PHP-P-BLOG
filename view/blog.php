<?php
// if(empty($_SESSION)) header("Location: ./");
require_once("./controller/UserController.php");
$title = "BLOGGIE / HOME";
$stylesheet = "home";
$banJS = true;
include_once("./view/templates/head.php");
include_once("./view/templates/headerBlog.php");
$userController = new UserController();
?>
<main>
  <section>
    <div class="">
      <img src="" alt="" class="">
    </div>
    <div class="">
      <form action="" method="post" enctype="multipart/form-data" class="" id="formPost">
        <input type="hidden" name="idUser" value = "<?php echo $_SESSION["idUser"]; ?>">
        <input type="text" name="title" class="" placeholder="Ingresa un título a tu publicación">
        <textarea name="body" id="" cols="30" rows="10" placeholder="¿Cómo estas hoy?, Compártelo!" class=""></textarea>
        <div class="">
          <label for="imgPost" class=""></label>
          <input type="file" name="imgPost" id="imgPost" class="">
        </div>
        <div class="">
          <button type="submit">Enviar</button>
        </div>
      </form>
    </div>
  </section>
</main>
<?php include_once("./view/templates/footer.php") ?>
