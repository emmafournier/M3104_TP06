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

if(isset($_GET['idFormat'])){
 $idFormatQuery = $_GET['idFormat'];
 $query = "format.ctrl.php?idFormat=".$idFormatQuery;
<<<<<<< HEAD
=======
 $valBouton = "Retour au format";
}
>>>>>>> aae4a71696aaa006adfabce24b95e0ed96d68832

}else if(isset($_GET['idCategorie'])){
 $idCatQuery = $_GET['idCategorie'];
 $query = "categorie.ctrl.php?idCategorie=".$idCatQuery;
<<<<<<< HEAD

}else{
   $query = "accueil.ctrl.php";
=======
 $valBouton = "Retour à la categorie";
>>>>>>> aae4a71696aaa006adfabce24b95e0ed96d68832
}


$livre = $dao->getLivre($isbn);
$nbExemplaire = $dao->nbDisponibilite($isbn);

$idCatLivre = $livre->__get("idCategorie");
$catLivre = $dao->getCat($idCatLivre);

$idFormatLivre = $livre->__get("idFormat");
$formatLivre = $dao->getFormat($idFormatLivre);

//-----------FIN CHANGEMENT-----------------------------------------------------

include("../view/produit.view.php");
?>
