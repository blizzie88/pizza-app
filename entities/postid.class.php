<?php
class Postid {

  private $postid;
  private $postcode;
  private $gemeente;


  public function __construct($postid,$postcode,$gemeente) {
    $this->postid = $postid;
    $this->postcode = $postcode;
    $this->gemeente = $gemeente;
  }

  public function getId() {
    return $this->postid;
  }
  public function getPostcode() {
    return $this->postcode;
  }
  public function getGemeente() {
    return $this->gemeente;
  }
}
