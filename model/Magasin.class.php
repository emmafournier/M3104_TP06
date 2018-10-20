<?php

    class Magasin {
        public $idMagasin;   // Identifiant
        public $nom;  // nom du Magasin
        public $adresse;
        public $departement;
        public $ville;  // adresse de la boutique

        public function __construct(array $tab = NULL){
          if($tab != NULL){
            foreach ($tab as $key => $value) {
              $this->$key = $value;
            }
          }
        }

        public function __get($carac) {
          return $this->$carac;
        }

    }


?>
