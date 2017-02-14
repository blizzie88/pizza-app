<?php
class Bestelregel {

  private $bestelregel;
  private $aantal;
  private $productnaam;
  private $prijs;
  private $img;

  public function __construct($bestelregel,$aantal,$productnaam,$prijs,$img) {
    $this->bestelregel = $bestelregel;
    $this->aantal = $aantal;
    $this->productnaam = $productnaam;
    $this->prijs = $prijs;
    $this->img = $img;
  }
  public function getBestelregel() {
    return $this->bestelregel;
  }
  public function getAantal() {
    return $this->aantal;
  }
  public function getProductnaam() {
    return $this->productnaam;
  }
  public function getPrijs() {
    return $this->prijs;
  }
  public function getImage() {
    return $this->img;
  }
}
