<?php

    class Magasin {
        public $id;   // Identifiant
        public $nom;  // nom du Magasin
        public $adresse // adresse de la boutique
        public $livres // liste des livres

        public function __construct($id,$nom,$adresse,$livres){
          $this->id = $id;
          $this->nom = $nom;
          $this->adresse = $adresse;
          $this->$livres = $livres;
        }

        public function __get($carac) {
          return $this->$carac;
        }

    }


?>
