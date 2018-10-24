<?php

    class Utilisateur {
        public $idUtilisateur;   // Identifiant
        public $mot_de_passe;  // nom du Magasin
        public $adresse;

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
