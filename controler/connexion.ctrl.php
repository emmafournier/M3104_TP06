<?php

  include("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");
  include_once("../model/Utilisateur.class.php");
  if(!isset($_SESSION)){
    session_start();
  }

  $erreur = false;
  $firstCo = false;

if(isset($_GET['btnConnection'])){
  if(isset($_GET['idUtilisateur'])){

    $idUtilisateur = $_GET['idUtilisateur'];
  }
  else{
    $erreur = true;
  }

  if(isset($_GET['mot_de_passe'])){

    $mot_de_passe = $_GET['mot_de_passe'];
  }
  else{
    $erreur = true;
  }
}
else{
  $firstCo = true;
}


//hello

  if(!$erreur && !$firstCo){
    $utilisateur = $dao->getUtilisateurConnexion($idUtilisateur,$mot_de_passe);


    if($utilisateur->__get('idUtilisateur') != null){
      $_SESSION['utilisateur'] = $utilisateur;
      foreach ($_SESSION['panier'] as $elementPanier) {
        $dao->ajouterPanierUtilisateur($idUtilisateur,$elementPanier->__get('ISBN'),$elementPanier->__get('nb_Exemplaires'));

      }
      $_SESSION['panier'] = $dao->getPanierUtilisateur($idUtilisateur);

      if(isset($_GET['commande'])){
        include("panier.ctrl.php");
      }
      else{
        include("accueil.ctrl.php");
      }


    }
    else{
      $erreur = true;
    }
  }


  if($erreur || $firstCo){
    include("../view/connexion.view.php");
  }





?>
