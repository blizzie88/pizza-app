<?php
class Klant {

  private $klantid;
  private $naam;
  private $voornaam;
  private $straatnummer;
  private $postid;
  private $telefoon;
  private $postcode;
  private $gemeente;
  private $email;
  private $opmerking;

  public function __construct($klantid,$naam, $voornaam,$straatnummer,$postid,$telefoon,$postcode,$gemeente,$email,$opmerking) {
    $this->klantid = $klantid;
    $this->naam = $naam;
    $this->voornaam = $voornaam;
    $this->straatnummer = $straatnummer;
    $this->postid = $postid;
    $this->telefoon = $telefoon;
    $this->postcode = $postcode;
    $this->gemeente = $gemeente;
    $this->email = $email;
    $this->opmerking = $opmerking;
  }
  public function getKlantid() {
    return $this->klantid;
  }
  public function getNaam() {
    return $this->naam;
  }
  public function getVoornaam() {
    return $this->voornaam;
  }
  public function getStraatnummer() {
    return $this->straatnummer;
  }
  public function getPostid() {
    return $this->postid;
  }
  public function getTelefoon() {
    return $this->telefoon;
  }
  public function getPostcode() {
    return $this->postcode;
  }
  public function getGemeente() {
    return $this->gemeente;
  }

  public function getEmail() {
    return $this->email;
  }
  public function getOpmerking() {
    return $this->opmerking;
  }

  public function setNaam($naam) {
    $this->naam = $naam;
  }
  public function setVoornaam($voornaam) {
    $this->voornaam = $voornaam;
  }
  public function setStraatnummer($straatnummer) {
    $this->straatnummer = $straatnummer;
  }
  public function setTelefoon($telefoon) {
    $this->telefoon = $telefoon;
  }
  public function setPostid($postid) {
    $this->postid = $postid;
  }
  public function setPostcode($postcode) {
    $this->postcode = $postcode;
  }
  public function setGemeente($gemeente) {
    $this->gemeente = $gemeente;
  }
  public function setEmail($email) {
    $this->email = $email;
  }
  public function setOpmerking($opmerking) {
    $this->opmerking = $opmerking;
  }
}
