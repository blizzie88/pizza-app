<?php
require_once("../business/pizzaservice.class.php");

if (isset($_GET["action"]) && $_GET["action"] == "login") {
  if (Pizzaservice::db_checkUser($_POST["loginemail"]) == false ) {
    echo "deze gebruiker bestaat niet";
  } else {
    $hash = Pizzaservice::db_getHash($_POST["loginemail"]);
    if(password_verify($_POST["loginpassword"], $hash)) {
      $klant = Pizzaservice::db_checkUser($_POST["loginemail"]);
      $_SESSION["user"] = array();
      array_push($_SESSION["user"],$klant);
      header("location:main.php");
      if (!empty($_SESSION["cart"])) {
        $bestelid = Pizzaservice::db_getBestelling($_SESSION["user"][0]->getKlantid());
        foreach ($_SESSION["cart"] as $key) {
          Pizzaservice::db_copyBestelregel($bestelid->getBestellingid(),$key->getProductid(), $key->getAantal());
        }
      }
      if (Pizzaservice::db_getBestelling($_SESSION["user"][0]->getKlantid())) {
        if ($bestelid->getAfgerond() == 1) {
          Pizzaservice::db_createBestelling($_SESSION["user"][0]->getKlantid());
        }
      } else {
        Pizzaservice::db_createBestelling($_SESSION["user"][0]->getKlantid());
      }
    } else {
      echo "verkeerd wachtwoord";
    }
  }
  Pizzaservice::db_emptySessionCart();
}

include("../presentation/pagehead.php");
include("../presentation/login_view.php");
include("../presentation/info.php");
?>
