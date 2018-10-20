<?php

    // Un article en vente
    class Livre {
        private $isbn;         // Référence unique
        private $titre;        // titre du livre
        private $infos;        // petit commentaire sur le livre
        private $prix;         // prix du livre
        private $image;        // nom de l'image du livre
        private $categorie;    // objet Categorie du Livre
        private $format;       // objet Format du Livre
        private $auteur;       // auteur du livre
        private $editeur;      // editeur du Livre
        private $nbPages;      // Nom du fichier image
        private $dateParution; // date de parution du livre
        private $resume;       // Nom du fichier image

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
