<?php

  include("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");
  include_once("../model/Utilisateur.class.php");
  session_start();

  $erreur = false;

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



  if(!$erreur){
    $utilisateur = $dao->getUtilisateurConnexion($idUtilisateur,$mot_de_passe);


    if($utilisateur->__get('idUtilisateur') != null){
      $_SESSION['utilisateur'] = $utilisateur;
      foreach ($_SESSION['panier'] as $elementPanier) {
        $dao->ajouterPanierUtilisateur($idUtilisateur,$elementPanier->__get('ISBN'),$elementPanier->__get('nb_Exemplaires'));

      }
      var_dump($dao->getPanierUtilisateur($idUtilisateur));
      $_SESSION['panier'] = $dao->getPanierUtilisateur($idUtilisateur);
      include("accueil.ctrl.php");

    }
    else{
      $erreur = true;
    }
  }


  if($erreur){
    include("../view/connexion.view.php");
  }





?>
