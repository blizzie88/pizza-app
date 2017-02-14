<?php
require_once("../business/pizzaservice.class.php");

$levering = true;

if(isset($_SESSION["user"])) {
  $bestelid = Pizzaservice::db_getBestelling($_SESSION["user"][0]->getKlantid());
  if (isset($_GET["action"]) && $_GET["action"] == "addtocart") {
    if (Pizzaservice::db_checkBestelregel($bestelid->getBestellingid(),$_GET["id"]) == false) {
      Pizzaservice::db_createBestelregel($bestelid->getBestellingid(),$_GET["id"]);
    } else {
      Pizzaservice::db_updateBestelregel($bestelid->getBestellingid(),$_GET["id"]);
    }
  }

  if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    Pizzaservice::db_deleteBestelregel($_GET["id"]);
  }
  $db = Pizzaservice::db_getRegelsDB($bestelid->getBestellingid());
}


if (isset($_GET["action"]) && $_GET["action"] == "edit") {
  $_SESSION["user"][0]->setNaam($_POST["naam"]);
  $_SESSION["user"][0]->setVoornaam($_POST["voornaam"]);
  $_SESSION["user"][0]->setStraatnummer($_POST["straatnummer"]);
  $_SESSION["user"][0]->setGemeente($_POST["gemeente"]);
  $_SESSION["user"][0]->setTelefoon($_POST["telefoon"]);
  $_SESSION["user"][0]->setEmail($_POST["email"]);
  $_SESSION["user"][0]->setOpmerking($_POST["opmerking"]);

  if (Pizzaservice::db_checkPostcode($_POST["postcode"]) == false) {
    $levering = false;
  } else {
    $post = Pizzaservice::db_checkPostcode($_POST["postcode"]);
    $_SESSION["user"][0]->setPostid($post->getId());
    $_SESSION["user"][0]->setPostcode($_POST["postcode"]);
    Pizzaservice::db_updateUser($_SESSION["user"][0]->getKlantid(),$_POST["naam"],$_POST["voornaam"],$_POST["straatnummer"],$post->getId(),$_POST["telefoon"],$_POST["email"],$_POST["opmerking"]);
  }
}

// opvangen van leeg karretje error

if (!isset($som)) {
  $som = 0;
}


include("../presentation/pagehead.php");
include("../presentation/invoice_view.php");
if (isset($_SESSION["user"])) {
  include("../presentation/invoice_user_cart_view.php");
} else {
  include("../presentation/session_cart_view.php");
}
include("../presentation/info.php");
?>
