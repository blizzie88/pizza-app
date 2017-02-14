<?php

require_once("../data/userdoa.class.php");
require_once("../data/pizzadoa.class.php");
require_once("../data/postdoa.class.php");
require_once("../data/bestellingdoa.class.php");
require_once("../data/bestelregeldoa.class.php");

session_start();

class Pizzaservice {

  //bestellingdoa

  public function db_createBestelling($klantid) {
    BestellingDAO::createBestelling($klantid);
  }

  public function db_getBestelling($klantid) {
    $temp = BestellingDAO::getBestelling($klantid);
    return $temp;
  }

  public function db_afronden($bestellingid) {
    BestellingDAO::afronden($bestellingid);
  }

  //bestelregeldoa

  public function db_createBestelregel($bestellingid,$productid) {
    BestelregelDAO::createBestelregel($bestellingid,$productid);
  }

  public function db_copyBestelregel($bestellingid,$productid,$aantal) {
    BestelregelDAO::copyBestelregel($bestellingid,$productid,$aantal);
  }

  public function db_deleteBestelregel($bestelregelid) {
    BestelregelDAO::deleteBestelregel($bestelregelid);
  }

  public function db_updateBestelregel($bestellingid,$productid) {
    BestelregelDAO::updateBestelregel($bestellingid,$productid);
  }

  public function db_checkBestelregel ($bestellingid,$productid) {
    $temp = BestelregelDAO::checkBestelregel($bestellingid,$productid);
    return $temp;
  }

  public function db_getRegelsDB($bestellingid) {
    $temp = BestelregelDAO::getRegelsDB($bestellingid);
    return $temp;
  }

  //pizzadoa

  public function db_getLijst () {
    $temp = PizzaDAO::getLijst();
    return $temp;
  }

  public function db_getPizzaById ($id) {
    $temp = PizzaDAO::getPizzaById($id);
    return $temp;
  }
  public function db_checkDouble ($id) {
    $temp = PizzaDAO::checkDouble($id);
    return $temp;
  }
  public function db_deletePizza($id) {
    PizzaDAO::deletePizza($id);
  }

  public function db_emptySessionCart () {
    PizzaDAO::emptySessionCart();
  }


  //postdoa

  public function db_checkPostcode($reg_postcode) {
    $temp = PostDAO::checkPostcode($reg_postcode);
    return $temp;
  }

  //userdoa
  public function db_makeUser ($reg_naam,$reg_voornaam,$reg_straatnummer,$reg_postid,$reg_telefoon,$reg_email,$reg_wachtwoord,$reg_opmerking) {
    UserDAO::makeUser($reg_naam,$reg_voornaam,$reg_straatnummer,$reg_postid,$reg_telefoon,$reg_email,$reg_wachtwoord,$reg_opmerking);
  }

  public function db_checkUser($username) {
    $temp = UserDAO::checkUser($username);
    return $temp;
  }

  public function db_getHash($username) {
    $temp = userDAO::getHash($username);
    return $temp;
  }

  public function db_updateUser ($klantid,$reg_naam,$reg_voornaam,$reg_straatnummer,$reg_postid,$reg_telefoon,$reg_email,$reg_opmerking) {
    userDAO::updateUser($klantid,$reg_naam,$reg_voornaam,$reg_straatnummer,$reg_postid,$reg_telefoon,$reg_email,$reg_opmerking);
  }

  public function db_userUitloggen() {
    UserDAO::userUitloggen();
  }

  //Needed for serialization/deserialization
  function __autoload($class_name) {
    include "../entities/". $class_name . '.class.php';
  }

}

?>
