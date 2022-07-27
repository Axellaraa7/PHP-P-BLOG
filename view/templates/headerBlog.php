<?php 
$user = array();

$urlImg = (isset($user["img"]) && file_exists("./db/img/".$user["img"])) ? $user["img"] : "./view/assets/img/user.svg";
?>
<header class="blogHeader">
  <div>
    <h1 class="">BLOGGIE</h1>
  </div>
  <nav class="navHeader">
    <ul>
      <li><a href="/" class="navLink">My Profile</a></li>
      <li><a href="/" class="navLink">Settings</a></li>
      <li>
        <a href="/">
          <figure>
            <img class="imgUser" src="<?php echo $urlImg; ?>" alt="profile img">
            <figcaption class="navLink"><?php echo $_SESSION["username"]?></figcaption>
          </figure>
        </a>
      </li>
    </ul>
  </nav>
</header>
