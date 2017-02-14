<?php

require_once("../business/pizzaservice.class.php");

if (isset($_SESSION["user"])) {
  header("location: invoice.php");
}


include("../presentation/pagehead.php");
include("../presentation/redirect_view.php");
include("../presentation/info.php");

?>
