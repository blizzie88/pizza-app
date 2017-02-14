<?php
require_once("../business/pizzaservice.class.php");

if(isset($_SESSION["user"])) {
  $bestelid = Pizzaservice::db_getBestelling($_SESSION["user"][0]->getKlantid());
}
$db = Pizzaservice::db_getRegelsDB($bestelid->getBestellingid());

if (!isset($_SESSION["af"])) {
  Pizzaservice::db_afronden($bestelid->getBestellingid());
}


if (!isset($_SESSION["af"])) {
  Pizzaservice::db_createBestelling($_SESSION["user"][0]->getKlantid());
  $_SESSION["af"] = 1;
}

include("../presentation/pagehead.php");
include("../presentation/besteld_view.php");
include("../presentation/info.php");

?>
