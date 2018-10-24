<?php

  include("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");
  session_start();

  $erreur = false;

  if(isset($_POST['idUtilisateur'])){

    $idUtilisateur = $_POST['idUtilisateur'];
  }
  else{
    $erreur = true;
  }

  if(isset($_POST['mot_de_passe'])){

    $mot_de_passe = $_POST['mot_de_passe'];
  }
  else{
    $erreur = true;
  }

  if(isset($_POST['adresse'])){

    $adresse = $_POST['adresse'];
  }
  else{
    $erreur = true;
  }

  if(!$erreur){
    $result = $dao->creerUtilisateur($idUtilisateur,$mot_de_passe,$adresse);
    if($result == 0){
      $utilisateur = $dao->getUtilisateurConnexion($idUtilisateur,$mot_de_passe);
      if($utilisateur->__get('idUtilisateur') != null){
        $_SESSION['utilisateur'] = $utilisateur;
        foreach ($_SESSION['panier'] as $elementPanier) {
          $dao->ajouterPanierUtilisateur($idUtilisateur,$elementPanier->_get('ISBN'),$elementPanier->__get('nb_Exemplaires'));
          $_SESSION['panier'] = $dao->getPanierUtilisateur($idUtilisateur);
        }
        include($_SESSION['path']);
      }
      else{
        $erreur = true;
      }


    }
    else{
      $erreur = true;
    }
  }




  if($erreur){
    include("../view/creationCompte.view.php");
  }





?>
