<?php

include_once("../model/DAO.class.php");


$categories = $dao->getAllCat();
$formats = $dao->getAllFormat();

//-------------CHANGEMENT-------------------------------------------------------

if (isset($_GET['idCategorie'])) {

  $idCategorie = $_GET['idCategorie'];

}
else{
  $idCategorie = 1;
}

if(isset($_GET['ISBN'])){
 $isbn = $_GET['ISBN'];
}
else{
 $isbn = $dao->firstNCateg(1,$idCategorie)[0]->__get('ISBN');
}

if(isset($_GET['total'])){
  $nbLivres = $dao->getNBLivreCat($idCategorie);
  $total = true;
}
else{
  $nbLivres = 5;
  $total = false;
}

$categorie = $dao->getCat($idCategorie);
$livres = $dao->getNCateg($isbn,$nbLivres,$idCategorie);

$next = $dao->getNCateg($dao->next(end($livres)->__get("ISBN")),$nbLivres,$idCategorie);
$pred = $dao->prevNCateg($livres[0]->__get("ISBN"),$nbLivres,$idCategorie);

//-----------FIN CHANGEMENT-----------------------------------------------------

include("../view/categorie.view.php");
?>
