<?php

    class Categorie {
        public $idCategorie;   // Identifiant
        public $libelle;  // nom de la catégorie


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
