<?php
  include_once("../model/DAO.class.php");

  $nbLivres = 5;
  $categories = $dao->getAllCat();
  $formats = $dao->getAllFormat();

//------------------------------ RECCUP FORMAT ---------------------------------
  if (isset($_GET['idFormat'])) {

    $idFormat = $_GET['idFormat'];

 }
 else{
    $idFormat = 1;
 }

 //------------------------------ RECCUP ISBN  ---------------------------------

 if(isset($_GET['ISBN'])){
   $isbn = $_GET['ISBN'];
 }
 else{
   $isbn = $dao->firstNFormat(1,$idFormat)[0]->__get('ISBN');
 }

 //------------------------------ RECCUP TOTAL ---------------------------------

 if(isset($_GET['total'])){
   $nbLivres = $dao->getNBLivreFormat($idFormat);
   $total = true;
 }
 else{
   $nbLivres = 5;
   $total = false;
 }

 $format = $dao->getFormat($idFormat);
 $livres = $dao->getNFormat($isbn,$nbLivres,$idFormat);

 $next = $dao->getNFormat($dao->next(end($livres)->__get("ISBN")),$nbLivres,$idFormat);
 $pred = $dao->prevNFormat($livres[0]->__get("ISBN"),$nbLivres,$idFormat);

 include("../view/format.view.php");

?>
