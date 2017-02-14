<?php
require_once("../entities/postid.class.php");
require_once("dbconfig.class.php");

class PostDAO {

  public function checkPostcode($reg_postcode) {
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $sql = $dbh->prepare("select postid,postcode,gemeente from postcode where postcode = :postcode");
    $sql->bindParam(":postcode",$reg_postcode);
    $sql->execute();
    if ($sql) {
      $rij = $sql->fetch();
      if ($rij) {
        $post = new Postid($rij["postid"],$rij["postcode"],$rij["gemeente"]);
        $dbh = null;
        return $post;
      } else return false;
    } else return false;
  }
}
