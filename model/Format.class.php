<?php

    class Format {
        public $id;   // Identifiant
        public $nom;  // nom du format

        public function __construct($id,$nom){
          $this->id = $id;
          $this->nom = $nom;
        }

        public function __get($carac) {
          return $this->$carac;
        }
    }


?>
