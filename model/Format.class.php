<?php

    class Format {
        public $idFormat;   // Identifiant
        public $libelle;  // nom du format

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
