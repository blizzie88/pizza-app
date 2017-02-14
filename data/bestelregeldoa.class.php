<?php
require_once("../entities/bestelregel.class.php");
require_once("dbconfig.class.php");

class BestelregelDAO {

  public function createBestelregel($bestellingid,$productid) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = $dbh->prepare("insert into bestelregel (bestellingid,productid,aantal) values (:bestellingid,:productid,1)");
    $sql->bindParam(":bestellingid",$bestellingid);
    $sql->bindParam(":productid",$productid);
    $sql->execute();
  }

  public function copyBestelregel($bestellingid,$productid,$aantal) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = $dbh->prepare("insert into bestelregel (bestellingid,productid,aantal) values (:bestellingid,:productid,:aantal)");
    $sql->bindParam(":bestellingid",$bestellingid);
    $sql->bindParam(":productid",$productid);
    $sql->bindParam(":aantal",$aantal);
    $sql->execute();
  }

  public function deleteBestelregel($bestelregelid) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = $dbh->prepare("delete from bestelregel where bestelregelid = :bestelregelid");
    $sql->bindParam(":bestelregelid",$bestelregelid);
    $sql->execute();
  }

  public function updateBestelregel($bestellingid,$productid) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = $dbh->prepare("update bestelregel set aantal = aantal + 1 where bestellingid = :bestellingid AND productid= :productid");
    $sql->bindParam(":bestellingid",$bestellingid, PDO::PARAM_INT);
    $sql->bindParam(":productid",$productid, PDO::PARAM_INT);
    $sql->execute();
  }

  public function checkBestelregel($bestellingid,$productid) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = $dbh->prepare("select bestelregelid from bestelregel where bestellingid= :bestellingid AND productid = :productid");
    $sql->bindParam(":bestellingid",$bestellingid, PDO::PARAM_INT);
    $sql->bindParam(":productid",$productid, PDO::PARAM_INT);
    $sql->execute();
    if ($sql) {
      $rij = $sql->fetch();
      if ($rij) {
        return true;
        $dbh = null;
      } else return false;
    } else return false;
  }

  public function getRegelsDB ($bestellingid) {
    $regelsdb = array();
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = $dbh->prepare("select bestelregel.bestelregelid,bestelregel.aantal,product.productnaam, product.prijs, product.img from bestelregel inner join product on bestelregel.productid = product.productid where bestellingid = :bestellingid");
    $sql->bindParam(":bestellingid",$bestellingid, PDO::PARAM_INT);
    $sql->execute();
    foreach ($sql as $rij) {
      $besteldb = new Bestelregel($rij["bestelregelid"],$rij["aantal"],$rij["productnaam"], $rij["prijs"], $rij["img"]);
      array_push($regelsdb, $besteldb);
    }
    $dbh = null;
    return $regelsdb;
  }

}
