<?php

require_once("../business/pizzaservice.class.php");


$levering = true;

if (isset($_GET["action"]) && $_GET["action"] == "account") {
  if (Pizzaservice::db_checkPostcode($_POST["postcode"]) == false) {
    $levering = false;
  } else {
    $post = Pizzaservice::db_checkPostcode($_POST["postcode"]);
    Pizzaservice::db_makeUser($_POST["naam"],$_POST["voornaam"],$_POST["straatnummer"],$post->getId(),$_POST["telefoon"],$_POST["email"],password_hash($_POST["wachtwoord"], PASSWORD_DEFAULT),$_POST["opmerking"]);
    $made = 1;
  }
}


include("../presentation/pagehead.php");

if (isset($made)) {
  include("../presentation/login_view.php");
} else {
  include("../presentation/register_view.php");
}
include("../presentation/info.php");
?>
