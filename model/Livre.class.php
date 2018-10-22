<?php

    // Un article en vente
    class Livre {
        private $ISBN;         // Référence unique
        private $titre;        // titre du livre
        private $prix;         // prix du livre
        private $photo;        // nom de l'image du livre
        private $idCategorie;    // objet Categorie du Livre
        private $idFormat;       // objet Format du Livre
        private $auteur;       // auteur du livre
        private $editeur;      // editeur du Livre
        private $nb_pages;      // Nom du fichier image
        private $date_parution; // date de parution du livre
        private $comp_info;       // complément d'information

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
