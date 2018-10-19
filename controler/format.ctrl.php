<?php
  include_once("../model/DAO.class.php");

  if (!empty($_GET['format'])) {
    $isbn = 0+ $_GET['isbn'];
    $idFormat = 0+$_GET['format'];
    $format = $dao->getFormat($idFormat);
    $articles = $dao->getNFormat($isbn,5,$format->idFormat);
 }

 include("../view/format.view.php");

?>
