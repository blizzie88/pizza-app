<?php
require_once("../business/pizzaservice.class.php");

$tab = Pizzaservice::db_getLijst();

unset($_SESSION["af"]);

//unset($_SESSION["user"]);

if(!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = array();
}

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

} else {
  if (isset($_GET["action"]) && $_GET["action"] == "addtocart") {
    $product = Pizzaservice::db_getPizzaById($_GET["id"]);
    if (Pizzaservice::db_checkDouble($_GET["id"]) == false) {
      array_push($_SESSION["cart"],$product);
    }
  }
  if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    Pizzaservice::db_deletePizza($_GET["id"]);
  }
}

// uitloggen gebruiker

if (isset($_GET["action"]) && $_GET["action"] == "logout") {
  Pizzaservice::db_userUitloggen();
  $logged = true;
  unset($_SESSION["af"]);
}

// cart counter
$_SESSION["totalshop"] = 0;
if (isset($_SESSION["cart"])) {
  foreach ($_SESSION["cart"] as $key => $value) {
    $_SESSION["totalshop"] += $value->getAantal();
  }
}

// opvangen van leeg karretje error

if (!isset($som)) {
  $som = 0;
}


include("../presentation/pagehead.php");
include("../presentation/main_view.php");

if (isset($_SESSION["user"])) {
  include("../presentation/main_user_cart_view.php");
} else {
  include("../presentation/session_cart_view.php");
}
include("../presentation/info.php");
?>
