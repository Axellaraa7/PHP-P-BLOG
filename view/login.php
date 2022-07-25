<?php 
$title = "BLOG - LOGIN";
$stylesheet = "login";
include_once("./view/templates/head.php");

require_once("./controller/UserController.php");
if(!empty($_POST)){
  $userController = new UserController();
  $data = $userController->getUser($_POST);
  if(!empty($data)){
    $_SESSION["logged"] = true;
    $_SESSION["username"] = $data["username"];
    if(isset($_POST["agreement"]) && $_POST["agreement"] == "on") setcookie("username",$data["username"],60*5);
    header("Location: ".$_SERVER["HTTP_ORIGIN"]."/home");
  }else $alert = true;
}
?>
<header>
  <h1>BLOGGIE</h1>
</header>
<main>
  <section class="container-700">
  <?php if(isset($insertError) && $insertError == false) echo "<div class='alert alertError'>Usuario o contraseñas incorrectas</div>"; ?>
    <form action="" method="post" class="form-container">
      <div class="formElementUp">
        <label for="username" class="labels labelUp">Nombre de usuario o email</label>
        <input type="text" id="username" name="username" class="inputText-350 itUp">
      </div>
      <div class="formElementUp">
        <label for="password" class="labels labelUp">Password</label>
        <input type="password" name="password" id="password" class="inputText-350 itUp">
      </div>
      <div class="formConfirmation">
        <div>
          <input type="checkbox" name="agreement" id="agreement" class="inputBox">
          <label for="agreement" class="labels">Mantener la sesión iniciada</label>
        </div>
        <div>
          <button class="btn btnMain">Iniciar sesión</button>
        </div>
      </div>
    </form>
    <hr>
    <div>
      <p class="messageButton">¿No tienes cuenta? <a href="./register" class="btn btnSec">Registrate</a></p>
    </div>
  </section>
</main>
<?php include_once("./view/templates/footer.php");