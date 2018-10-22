<?php

include_once("../model/DAO.class.php");

$nbLivres = 5;
$categories = $dao->getAllCat();
$formats = $dao->getAllFormat();

//-------------CHANGEMENT-------------------------------------------------------


if(isset($_GET['ISBN'])){
 $isbn = $_GET['ISBN'];
}
else{
 echo "Erreur : livre inconnu";
}

$livre = $dao->getLivre($isbn);

$idCatLivre = $livre->__get("idCategorie");
$catLivre = $dao->getCat($idCatLivre);

$idFormatLivre = $livre->__get("idFormat");
$formatLivre = $dao->getFormat($idFormatLivre);

//-----------FIN CHANGEMENT-----------------------------------------------------

include("../view/produit.view.php");
?>
