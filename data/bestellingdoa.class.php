<?php
require_once("../entities/bestelling.class.php");
require_once("userdoa.class.php");
require_once("dbconfig.class.php");

class BestellingDAO {

  public function createBestelling($klantid) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = $dbh->prepare("insert into bestelling (klantid) values (:klantid)");
    $sql->bindParam(":klantid",$klantid);
    $sql->execute();
  }

  public function getBestelling($klantid) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = $dbh->prepare("select bestellingid, klantid, datumuur, afgerond from bestelling where klantid = :klantid order by bestellingid desc limit 1");
    $sql->bindParam(":klantid",$klantid);
    $sql->execute();
    if ($sql) {
      $rij = $sql->fetch();
      if ($rij) {
        $bestel = new Bestelling($rij["bestellingid"],$rij["klantid"], $rij["datumuur"],$rij["afgerond"]);
        $dbh = null;
        return $bestel;
      } else return false;
    } else return false;
  }


  public function afronden ($bestellingid) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = $dbh->prepare("update bestelling set afgerond='1' where bestellingid = :bestellingid");
    $sql->bindParam(":bestellingid",$bestellingid);
    $sql->execute();
  }
}
