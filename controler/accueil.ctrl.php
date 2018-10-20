<?php

  include_once("../model/DAO.class.php");

  $nbLivres = 5;

  if(isset($_GET['ISBN'])){
    $isbn = $_GET['ISBN'];
  }
  else{
    $isbn = (string)$dao->firstN(1)[0]->__get("isbn");
  }

  $livres = $dao->getN($isbn,$nbLivres);

  $next = $dao->getN(next(end($livres)->__get["isbn"]),$nbLivres);
  $pred = $dao->prevN($livres[0],$nbLivres);

  include("../view/acceuil.view.php");

?>
