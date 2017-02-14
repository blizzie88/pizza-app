<?php
class Product {
  private $productid;
  private $productnaam;
  private $omschrijving;
  private $prijs;
  private $img;
  private $aantal;

  public function __construct($productid,$productnaam,$omschrijving,$prijs,$img,$aantal) {
    $this->productid = $productid;
    $this->productnaam = $productnaam;
    $this->omschrijving = $omschrijving;
    $this->prijs = $prijs;
    $this->img = $img;
    $this->aantal = $aantal;

  }
  public function getProductid() {
    return $this->productid;
  }
  public function getProductnaam() {
    return $this->productnaam;
  }
  public function getOmschrijving() {
    return $this->omschrijving;
  }
  public function getPrijs() {
    return $this->prijs;
  }
  public function getImage() {
    return $this->img;
  }
  public function getAantal(){
    return $this->aantal;
  }
  public function setAantal($optel) {
    $this->aantal += $optel;
  }

}
