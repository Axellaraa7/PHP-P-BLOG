<?php
$title = "BLOGGIE - REGISTER";
$stylesheet = "register";
include_once("./view/templates/head.php");
/*----------------------*/
if(!empty($_POST) && $_POST["agreement"]){
  require_once("./controller/UserController.php");
  $userController = new UserController();
  if($userController->insert($_POST)){
    $data = $userController->getUser($_POST["username"]);
    session_start();
    $_SESSION["logged"] = true;
    $_SESSION["username"] = $data["username"];
    $_SESSION["idUser"] = $data["id"];
    //header("Location: ".$_SERVER["HTTP_ORIGIN"]."/home");
    header("Location: ./home");
  }else{

  }
  
}
?>
<header>
  <h1>BLOGGIE</h1>
</header>
<main>
  <section class="container-700">
    
    <?php if(isset($insertError) && $insertError == false) echo "<div class='alert alertError'>Ocurrió un error al momento de inserta el registro...</div>"; ?>
    <form action="" method="post" class="form-container">
      <div class="formElementPh">
        <!-- <label for="username" class="labels">Username</label> -->
        <input type="text" id="username" name="username" class="inputText-350 " placeholder="Username" required>
      </div>
      <div class="formElementPh-2">
        <div>
          <!-- <label for="name" class="labels">Name</label> -->
          <input type="text" id="name" name="name" class="inputText-150 " placeholder="Name" required>
        </div>
        <div>
          <!-- <label for="lastname" class="labels">Lastname</label> -->
          <input type="text" id="lastname" name="lastname" class="inputText-150" placeholder="Lastname" required>
        </div>
      </div>
      <div class="formElementPh">
        <!-- <label for="email" class="labels">Email</label> -->
        <input type="text" id="email" name="email" class="inputText-350 " placeholder="Email" required>
      </div>
      <div class="formElementPh">
        <!-- <label for="password" class="labels">Password</label> -->
        <input type="password" name="password" id="password" class="inputText-350 " placeholder="Password" required>
      </div>
      <div class="formElementPh">
        <!-- <label for="password2" class="labels">Confirm your Password</label> -->
        <input type="password" name="password2" id="password2" class="inputText-350 " placeholder="Confirm your password">
      </div>
      <div class="formConfirmation">
        <div>
          <input type="checkbox" name="agreement" id="agreement" class="inputBox" required>
          <label for="agreement" class="labels">Acepto los términos y condiciones</label>
        </div>
        <div>
          <button class="btn btnMain">Registrar</button>
        </div>
      </div>
    </form>
    <hr>
    <div>
      <p class="messageButton">¿Ya tienes cuenta?<a href="./login" class="btn btnSec"> Inicia sesión</a></p>
    </div>
  </section>
</main>
<?php include_once("./view/templates/footer.php"); ?>