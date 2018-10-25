<?php

  include("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");
  session_start();


  $erreur = false;
  $firstCo = false;

  if(isset($_GET['btnConnextion'])){
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

    if(isset($_GET['adresse'])){

      $adresse = $_GET['adresse'];
    }
    else{
      $erreur = true;
    }
  }
  else{
    $firstCo = true;
  }



  if(!$erreur && !$firstCo){
    $result = $dao->creerUtilisateur($idUtilisateur,$mot_de_passe,$adresse);

    if($result != 0){

      $utilisateur = $dao->getUtilisateurConnexion($idUtilisateur,$mot_de_passe);


      if($utilisateur->__get('idUtilisateur') != null){

        $_SESSION['utilisateur'] = $utilisateur;
        var_dump($_SESSION['panier']);
        foreach ($_SESSION['panier'] as $elementPanier) {
          $dao->ajouterPanierUtilisateur($idUtilisateur,$elementPanier->__get('ISBN'),$elementPanier->__get('nb_Exemplaires'));
          $_SESSION['panier'] = $dao->getPanierUtilisateur($idUtilisateur);
        }

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
    else{
      $erreur = true;
    }
  }




  if($erreur || $firstCo){

    include("../view/creationCompte.view.php");
  }





?>
