<?php

    class Categorie {
        public $id;   // Identifiant
        public $nom;  // nom de la catégorie


        public function __construct($id,$nom){
          $this->id = $id;
          $this->nom = $nom;
        }

        public function __get($carac) {
          return $this->$carac;
        }
    }


?>
