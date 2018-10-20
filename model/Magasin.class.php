<?php

    class Magasin {
        public $id;   // Identifiant
        public $nom;  // nom du Magasin
        public $adresse; // adresse de la boutique
        public $livres; // liste des livres

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
