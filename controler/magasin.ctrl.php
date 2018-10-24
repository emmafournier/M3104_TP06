<?php
session_start();
include_once("../model/DAO.class.php");

$nbLivres = 5;
$categories = $dao->getAllCat();
$formats = $dao->getAllFormat();

if(isset($_GET['departement'])){
  $departement = $_GET['departement'];
  $magasins = $dao->getMagaDepartement($departement);
  if(count($magasins) == 0){
    $magasins = $dao->getAllMaga();
    $departement = 0;
  }
}
else{
  $magasins = $dao->getAllMaga();
}



include("../view/magasin.view.php");
?>
