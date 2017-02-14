<?php
class Bestelling {
  private $bestellingid;
  private $klantid;
  private $datumuur;
  private $afgerond;

  public function __construct($bestellingid,$klantid,$datumuur,$afgerond) {
    $this->bestellingid = $bestellingid;
    $this->klantid = $klantid;
    $this->datumuur = $datumuur;
    $this->afgerond = $afgerond;
  }
  public function getBestellingid() {
    return $this->bestellingid;
  }
  public function getKlantid() {
    return $this->klantid;
  }
  public function getDatumuur() {
    return $this->datumuur;
  }
  public function getAfgerond() {
    return $this->afgerond;
  }
  public function setAfgerond($afgerond) {
    $this->afgerond = $afgerond;
  }

}
