<?php

include_once("../model/DAO.class.php");

$nbLivres = 5;
$categories = $dao->getAllCat();
$formats = $dao->getAllFormat();

$magasins = $dao->getAllMaga();

include("../view/magasin.view.php");
?>
