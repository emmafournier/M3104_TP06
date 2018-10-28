<?php

  include_once("../model/DAO.class.php");
  include_once("../model/Utilisateur.class.php");
  include_once("../model/ElementPanier.class.php");

// ouverture de la session si aucune session ouverte
  if(!isset($_SESSION)){
    session_start();
  }

// si l'utilisateur clique sur le bouton déconnexion : fermeture et ouverture d'une nouvelle session
  if(isset($_GET['btnDeconnexion'])){
    session_destroy();
    session_start();
    // le panier est vidé
    $_SESSION['panier'] = array();
  }

  // listes de toutes les catégories et de tous les formats pour le menu
  $categories = $dao->getAllCat();
  $formats = $dao->getAllFormat();


  // si un utilisateur est connecté, on récupère ces informations
  if (isset($_SESSION['utilisateur'])){
    $utilisateur = $_SESSION['utilisateur'];

  }

  // ISBN du premier produit affiché
  if(isset($_GET['ISBN'])){
    $isbn = $_GET['ISBN'];
  }
  else{
    $isbn = (string)$dao->firstN(1)[0]->__get("ISBN");
  }

//définition du nombre de produits à afficher sur la page (via une liste déroulante)
  if(isset($_GET['listeNbLibre'])){
    if($_GET['listeNbLibre'] == 0){
      // affichage de tous les produits
      $nbLivres = $dao->getNBLivre();
      $total = true;
    }
    else{
      $nbLivres = $_GET['listeNbLibre'];
      $total = false;
    }
  }
  else{
    // par défaut 5 produits
    $nbLivres = 5;
    $total = false;
  }

  // on récupère les livres à afficher
  $livres = $dao->getN($isbn,$nbLivres);
  //on récupère les livres de la page suivantes
  $next = $dao->getN($dao->next(end($livres)->__get("ISBN")),$nbLivres);
  //on récupère les livres de la page précédentes
  $pred = $dao->prevN($livres[0]->__get("ISBN"),$nbLivres);


  // affichage de la vue correspondante
  include("../view/acceuil.view.php");

?>
