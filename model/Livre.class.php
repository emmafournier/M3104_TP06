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

        public function __construct($isbn,$titre,$infos,$prix,$image,$categorie,$format,$auteur,$editeur,$nbPages,$dateParution,$resume){
          $this->isbn = $isbn;
          $this->titre = $titre;
          $this->infos = $infos;
          $this->prix = $prix;
          $this->image = $image;
          $this->categorie = $categorie;
          $this->format = $format;
          $this->auteur = $auteur;
          $this->editeur = $editeur;
          $this->nbPages = $nbPages;
          $this->dateParution = $dateParution;
          $this->resume = $resume;
        }

        public function __get($carac) {
          return $this->$carac;
        }

    }

?>
