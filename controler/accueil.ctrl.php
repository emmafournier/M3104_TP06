<?php

  session_start();
  
  include_once("../model/DAO.class.php");

  $categories = $dao->getAllCat();
  $formats = $dao->getAllFormat();


  if(isset($_GET['ISBN'])){
    $isbn = $_GET['ISBN'];
  }
  else{
    $isbn = (string)$dao->firstN(1)[0]->__get("ISBN");
  }

  if(isset($_GET['listeNbLibre'])){
    if($_GET['listeNbLibre'] == 0){
      $nbLivres = $dao->getNBLivre();
      $total = true;
    }
    else{
      $nbLivres = $_GET['listeNbLibre'];
      $total = false;
    }
  }
  else{
    $nbLivres = 5;
    $total = false;
  }

  $livres = $dao->getN($isbn,$nbLivres);
  $next = $dao->getN($dao->next(end($livres)->__get("ISBN")),$nbLivres);
  $pred = $dao->prevN($livres[0]->__get("ISBN"),$nbLivres);



  include("../view/acceuil.view.php");

?>
