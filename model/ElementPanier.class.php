<?php

    // Un article en vente
    class ElementPanier {
        private $ISBN;
        private $nb_Exemplaires;

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
