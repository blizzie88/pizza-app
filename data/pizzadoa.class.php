<?php
require_once("../entities/product.class.php");
require_once("dbconfig.class.php");

class PizzaDAO {
  public function getLijst () {
    $lijst = array();
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $resultSet = $dbh->prepare("select productid,productnaam,omschrijving,prijs,img from product");
    $resultSet->execute();
    foreach ($resultSet as $rij) {
      $product = new Product($rij["productid"],$rij["productnaam"],$rij["omschrijving"], $rij["prijs"], $rij["img"],1);
      array_push($lijst, $product);
    }
    $dbh = null;
    return $lijst;
  }
  public function getPizzaById($id) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $resultSet = $dbh->prepare("select productnaam,omschrijving,prijs,img from product where productid = :id");
    $resultSet->bindParam(":id",$id);
    $resultSet->execute();
    if ($resultSet) {
      $rij = $resultSet->fetch();
      if ($rij) {
        $product = new Product($id,$rij["productnaam"],$rij["omschrijving"], $rij["prijs"], $rij["img"],1);
        $dbh = null;
        return $product;
      } else return false;
    } else return false;
  }
  public function checkDouble ($id) {
    foreach ($_SESSION["cart"] as &$item) {
      if ($item->getProductid() == $id) {
        $item->setAantal(1);
        return true;
      }
    }
    return false;
  }

  public function deletePizza ($id) {
    unset($_SESSION["cart"][$id]);
  }

  public function emptySessionCart () {
    unset($_SESSION["cart"]);
  }
}
