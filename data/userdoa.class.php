<?php
require_once("../entities/klant.class.php");
require_once("dbconfig.class.php");

class UserDAO {

  public function makeUser ($reg_naam,$reg_voornaam,$reg_straatnummer,$reg_postid,$reg_telefoon,$reg_email,$reg_wachtwoord,$reg_opmerking) {
    if (!empty($reg_naam) && !empty($reg_voornaam) && !empty($reg_straatnummer) && !empty($reg_postid) && !empty($reg_telefoon) && !empty($reg_email) && !empty($reg_wachtwoord) && !empty($reg_opmerking)) {
      $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
      $sql = $dbh->prepare("insert into klant (naam, voornaam, straatnummer, postid, telefoon, email, wachtwoord, opmerking) values (:naam, :voornaam, :straatnummer, :postid, :telefoon, :email, :wachtwoord, :opmerking)");
      $sql->bindParam(':naam', $reg_naam);
      $sql->bindParam(':voornaam', $reg_voornaam);
      $sql->bindParam(':straatnummer', $reg_straatnummer);
      $sql->bindParam(':postid', $reg_postid);
      $sql->bindParam(':telefoon', $reg_telefoon);
      $sql->bindParam(':email', $reg_email);
      $sql->bindParam(':wachtwoord', $reg_wachtwoord);
      $sql->bindParam(':opmerking', $reg_opmerking);
      $sql->execute();
      $dbh = null;
    }
  }

  public function checkUser($username) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $resultSet = $dbh->prepare("select klant.klantid,klant.naam,klant.voornaam,klant.straatnummer,klant.postid,klant.telefoon,postcode.postcode,postcode.gemeente,klant.email,klant.opmerking from klant inner join postcode on klant.postid=postcode.postid where email = :username");
    $resultSet->bindParam(":username",$username);
    $resultSet->execute();
    if ($resultSet) {
      $rij = $resultSet->fetch();
      if ($rij) {
        $klant = new Klant($rij["klantid"],$rij["naam"],$rij["voornaam"], $rij["straatnummer"], $rij["postid"],$rij["telefoon"],$rij["postcode"],$rij["gemeente"], $rij["email"],$rij["opmerking"]);
        $dbh = null;
        return $klant;
      } else return false;
    } else return false;
  }

  public function getHash($username) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $resultSet = $dbh->prepare("select wachtwoord from klant where email = :username");
    $resultSet->bindParam(":username",$username);
    $resultSet->execute();
    $rij = $resultSet->fetch();
    return $rij["wachtwoord"];
    $dbh = null;
  }



  public function updateUser($klantid,$reg_naam,$reg_voornaam,$reg_straatnummer,$reg_postid,$reg_telefoon,$reg_email,$reg_opmerking) {
    if (!empty($reg_naam) && !empty($reg_voornaam) && !empty($reg_straatnummer) && !empty($reg_postid) && !empty($reg_telefoon) && !empty($reg_email) && !empty($reg_opmerking)) {
      $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
      $sql = $dbh->prepare("update klant set naam = :naam, voornaam = :voornaam, straatnummer = :straatnummer, postid = :postid, telefoon = :telefoon, email = :email, opmerking = :opmerking where klantid = $klantid");
      $sql->execute(array("naam" => $reg_naam,"voornaam" => $reg_voornaam,"straatnummer" => $reg_straatnummer,"postid" => $reg_postid,"telefoon" => $reg_telefoon,"email" => $reg_email,"opmerking" =>$reg_opmerking));
      $dbh = null;
    }
  }

  public function userUitloggen() {
    unset($_SESSION["user"]);
  }
}
