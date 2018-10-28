<?php

    require_once("../model/Livre.class.php");
    require_once("../model/Categorie.class.php");
    require_once("../model/Format.class.php");
    require_once("../model/Magasin.class.php");
    require_once("../model/Utilisateur.class.php");


    // Creation de l'unique objet DAO
    $dao = new DAO();

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;
        // Le type, le chemin et le nom de la base de donnée
        private $database = 'sqlite:../model/data/book.db';

        // la base s'appelle book !

        // Constructeur chargé d'ouvrir la BD + gestion d'erreur
        function __construct() {

            try {
              $this->db = new PDO($this->database);
            }
            catch (PDOException $e){
              die("erreur de connexion:".$e->getMessage());
            }

        }

        //======================================================================
        // Livre
        //======================================================================

        // Accès aux n premiers livres
        // Cette méthode retourne un tableau contenant les n permier livres de
        // la base sous la forme d'objets de la classe Livre (classé par ISBN)
        function firstN(int $n) : array {
          try{
            $req = "SELECT * FROM livre ORDER BY ISBN ASC LIMIT $n";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
          }
          catch(PDOException $e){
            return array();
          }

            return $result;
        }


        // Acces au n livres à partir de la reférence $isbn
        // Cette méthode retourne un tableau contenant n  livres de
        // la base sous la forme d'objets de la classe Livre.
        function getN(string $isbn,int $n) : array {

          try{
            $req = "SELECT * FROM livre WHERE ISBN >= $isbn ORDER BY ISBN LIMIT $n";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
          }
          catch(PDOException $e){
            return array();
          }


        }

//
        // Acces à l'isbn qui suit l'isbn $isbn dans l'ordre des isbn
        function next(string $isbn) : string {

            $req = "SELECT * FROM livre WHERE ISBN>$isbn ORDER BY ISBN LIMIT 1";
            $lignereq =($this->db)->query($req);
            $result = $lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            if (count($result)==0){
              return 0;
            }else{
              return ($result[0]->__get('ISBN'));
            }
        }

        // Acces aux n livres qui précèdent de $n l'isbn $isbn dans l'ordre des isbn
        function prevN(string $isbn,int $n): array {

            $req = "SELECT * FROM (SELECT * FROM livre WHERE ISBN<$isbn ORDER BY ISBN DESC LIMIT $n) ORDER BY ISBN";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }

        // retourne le Livre d'ISBN $isbn, NULL si non trouvé
        function getLivre(string $isbn) : Livre {
          try{
            $req = "SELECT * FROM livre WHERE ISBN=$isbn";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
          }
          catch(PDOException $e){
            return NULL;
          }
            return $result[0];
        }


        // retourne le nombre total de livres dans la base de donnée
        function getNBLivre() : int {
          try{
            $req = "SELECT * FROM livre";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
          }
          catch(PDOException $e){
            return NULL;
          }
          $som = 0;
          foreach ($result as $livre) {
            $som += 1;
          }
            return $som;
        }

        //======================================================================
        // Categorie
        //======================================================================

        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat() : array {

            $req = "SELECT * FROM categorie";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Categorie');
            return $result;
        }

        // Acces à une catégorie
        // Retourne un objet de la classe Categorie connaissant son identifiant
        function getCat(int $id): Categorie {

            $req = "SELECT * FROM categorie WHERE idCategorie=$id";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Categorie');
            return $result[0];
        }


        // Acces au n livres à partir de l'isbn $isbn de la catégorie $categorie
        // Retourne une table d'objets de la classe Livre
        function getNCateg(string $isbn,int $n,int $categorie) : array {


            $req = "SELECT * FROM livre WHERE ISBN>=$isbn AND idCategorie=$categorie ORDER BY ISBN ASC LIMIT $n ";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }

        //Acces aux n premiers livres de categorie $categorie
        // Retourne une table d'objet de la classe Livre
        function firstNCateg(int $n, int $idCategorie) : array {
          try{
            $req = "SELECT * FROM livre WHERE idCategorie = $idCategorie ORDER BY ISBN ASC LIMIT $n";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
          }
          catch(PDOException $e){
            return array();
          }

            return $result;
        }

        // retourne l'ISBN du livre suivant le livre d'ISBN $isbn et de Categorie
        // $categorie, si ISBN introuvable, retourne 0
        function nextCateg(string $isbn,int $idCategorie) : string {

            $req = "SELECT * FROM livre WHERE ISBN>$isbn AND idCategorie=$idCategorie ORDER BY ISBN LIMIT 1";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            if ($result[0] == NULL){
              return 0;
            }else{
              return ($result[0]->__get('ISBN'));
            }
        }

        // Acces aux n livres de catégorie->id=$idCategorie qui précèdent de $n
        // l'isbn $isbn dans l'ordre des isbn
        function prevNCateg(string $isbn,int $n,int $idCategorie): array {

            $req = "SELECT * FROM (SELECT * FROM livre WHERE ISBN<$isbn AND idCategorie=$idCategorie ORDER BY ISBN DESC LIMIT $n) ORDER BY ISBN";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }


        //retourne le nombre de livre d'une categorie d'id $idCategorie
        function getNBLivreCat(int $idCategorie) : int {
          try{
            $req = "SELECT * FROM livre WHERE idCategorie=$idCategorie";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
          }
          catch(PDOException $e){
            return NULL;
          }
          $som = 0;
          foreach ($result as $livre) {
            $som += 1;
          }
            return $som;
        }

        //======================================================================
        // Format
        //======================================================================

        // retourne tout les objets Format de la Base de Donnée
        function getAllFormat() : array {

            $req = "SELECT * FROM format";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Format');
            return $result;
        }
        // Acces à un format
        // Retourne un objet de la classe Format connaissant son identifiant
        function getFormat(int $id): Format {

            $req = "SELECT * FROM format WHERE idFormat=$id";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Format');
            if(count($result) == 0){
                return new Format();
            }
            else{
              return $result[0];
            }

        }


        // Acces aux $n livres à partir de l'isbn $isbn et de Format d'id $idFormat
        // Retourne une table d'objets de la classe Livre
        function getNFormat(string $isbn,int $n,int $idFormat) : array {

            $req = "SELECT * FROM livre WHERE ISBN>=$isbn AND idFormat=$idFormat ORDER BY ISBN ASC LIMIT $n ";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }

        //Acces aux $n premiers livres de Format d'id $idFormat
        // Retourne une table d'objets de la classe Livre
        function firstNFormat(int $n, int $idFormat) : array {
          try{
            $req = "SELECT * FROM livre WHERE idFormat = $idFormat ORDER BY ISBN ASC LIMIT $n";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
          }
          catch(PDOException $e){
            return array();
          }

            return $result;
        }

        // Retourne le livre  suivant le livre d'ISBN $isbn et de format d'id $idFormat
        function nextFormat(string $isbn,int $idFormat) : string {

            $req = "SELECT * FROM livre WHERE ISBN>$isbn AND idFormat=$idFormat ORDER BY ISBN LIMIT 1";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            if ($result[0] == NULL){
              return 0;
            }else{
              return ($result[0]->__get('ISBN'));
            }
        }

        // Acces aux n livres qui précèdent de $n l'isbn $isbn dans l'ordre des isbn
        // et de Format d'id $idFormat
        function prevNFormat(string $isbn,int $n,int $idFormat): array {

            $req = "SELECT * FROM (SELECT * FROM livre WHERE ISBN<$isbn AND idFormat=$idFormat ORDER BY ISBN DESC LIMIT $n) ORDER BY ISBN";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }

        //retourne le nombre de livre que contient le format d'id $idFormat
        function getNBLivreFormat(int $idFormat) : int {
          try{
            $req = "SELECT * FROM livre WHERE idFormat=$idFormat";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
          }
          catch(PDOException $e){
            return NULL;
          }
          $som = 0;
          foreach ($result as $livre) {
            $som += 1;
          }
            return $som;
        }

        //======================================================================
        // Magasin
        //======================================================================

        // retourne tout les objet Magasin contenu dans la base de donnée
        function getAllMaga() : array {

            $req = "SELECT * FROM magasin";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Magasin');
            return $result;
        }

        // Acces à un Magasins
        // Retourne un objet de la classe Magasin connaissant son identifiant
        function getMaga(string $id): Magasin {

            $req = "SELECT * FROM Magasin WHERE idMagasin=$id";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Magasin');
            return $result[0];
        }

        // Retourne un objet Magasin de departement $departement
        function getMagaDepartement(string $departement) : array{
          $req = "SELECT * FROM Magasin WHERE departement = $departement";
          $lignereq =($this->db)->query($req);
          if($lignereq){
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Magasin');
            return $result;
          }
          else{
            return array();
          }

        }

        //======================================================================
        // Disponibilité
        //======================================================================

        //renvoie le nombre de Disponibilite d'un livre d'ISBN $isbn
        function nbDisponibilite(string $isbn) : int{
            $req = "SELECT count(*) FROM Disponibilite WHERE ISBN = $isbn";
            $lignereq =($this->db)->query($req);
            if($lignereq){
              $result =$lignereq->fetchAll(PDO::FETCH_COLUMN,0);
              return $result[0];
            }
            else{
              return 0;
            }
        }

        //renvoie d'id des magasins ou le livre d'ISBN $isbn est disponible
        function listeMagDispo(string $isbn) : array {
          $req = "SELECT idMagasin FROM Disponibilite WHERE ISBN = $isbn";
          $lignereq =($this->db)->query($req);
          if($lignereq){
            $result =$lignereq->fetchAll(PDO::FETCH_COLUMN,0);
            return $result;
          }
          else{
            return array();
          }
        }

        // renvoie le nombre d'exemplaire disponible d'un livre d'ISBN $isbn et
        // de Magasin d'id $idMag
        function nbExemplaireMag(string $isbn, int $idMag) : int{
          $req = "SELECT count(*) FROM Disponibilite WHERE ISBN = $isbn AND idMagasin = $idMag";
          $lignereq =($this->db)->query($req);
          if($lignereq){
            $result =$lignereq->fetchAll(PDO::FETCH_COLUMN,0);
            return $result[0];
          }
          else{
            return 0;
          }
        }

        // retourne la table des livres disponibles dans le Magasin d'id $idMagasin
        function listeLivreDispo(string $idMagasin) : array{
          $req = "SELECT ISBN FROM Disponibilite WHERE idMagasin = $idMagasin";
          $lignereq =($this->db)->query($req);
          if($lignereq){
            $result =$lignereq->fetchAll(PDO::FETCH_COLUMN,0);
            return $result;
          }
          else{
            return array();
          }
        }

        //======================================================================
        // Utilisateurs
        //======================================================================

        //Retourne l'Utilisateur d'id $idUtilisateur et de mot de passe
        // $mot_de_passe
        function getUtilisateurConnexion(string $idUtilisateur, string $mot_de_passe) : Utilisateur {
          $req = "SELECT * FROM utilisateur WHERE idUtilisateur = \"$idUtilisateur\" AND mot_de_passe = \"$mot_de_passe\"";
          $lignereq =($this->db)->query($req);
          if($lignereq){
              $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
              if(count($result)>0){
                return $result[0];
              }
              else{
                return new Utilisateur();
              }
              return $result[0];
            }
            else{
              return new Utilisateur();
            }
          }

        // ajoute dans la base de donnée, à la table elementPanier,
        // un element d'id Utilisateur $idUtilisateur, d'ISBN $isbn et d'exemplaire
        // $nbExemplaire
        function ajouterPanierUtilisateur(string $idUtilisateur, string $ISBN, int $nbExemplaire) : int {
          $req = "INSERT INTO elementPanier(idUtilisateur,ISBN,nb_Exemplaires) VALUES('$idUtilisateur','$ISBN','$nbExemplaire')";
          $lignereq =($this->db)->exec($req);
          return $lignereq;
        }

        // retourne le panier d'un Utilisateur d'id $idUtilisateur
        function getPanierUtilisateur(string $idUtilisateur) : array {
          $req = "SELECT * FROM elementPanier WHERE idUtilisateur = '$idUtilisateur'";
          $lignereq =($this->db)->query($req);
          if($lignereq){
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'ElementPanier');
            return $result;
          }
          else{
            return array();
          }
        }

        // ajoute dans la base de donnée un nouvel Utilisateur d'id $idUtilisateur,
        // de mot de passe $mot_de_passe et d'adresse $adresse
        function creerUtilisateur(string $idUtilisateur, string $mot_de_passe, string $adresse) : int{
          $req = "INSERT INTO utilisateur(idUtilisateur,mot_de_passe,adresse) VALUES ('$idUtilisateur','$mot_de_passe','$adresse')";
          $lignereq =($this->db)->exec($req);
          return $lignereq;
        }

        // retourne l'Utilisateur d'id $idUtilisateur
        function getUtilisateur(string $idUtilisateur) : Utilisateur {
          $req = "SELECT * FROM Utilisateur WHERE idUtilisateur = ''$idUtilisateur'";
          $lignereq =($this->db)->query($req);
          if($lignereq){
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
            return $result[0];
          }
          else{
            return null;
          }
        }

        // enlève dans la base de donnée chaque elementPanier de l'Utilisateur
        // d'id $idUtilisateur
        function viderPanier(string $idUtilisateur){
          $req = "DELETE FROM elementPanier WHERE idUtilisateur = '$idUtilisateur'";
          $lignereq =($this->db)->exec($req);
          return $lignereq;
        }

        // enlève dans la base de donnée un elementPanier de l'Utilisateur
        // d'id $idUtilisateur
        function enleverPanier(string $idUtilisateur, string $isbn){
          $req = "DELETE FROM elementPanier WHERE idUtilisateur = '$idUtilisateur' AND ISBN = '$isbn'";
          $lignereq =($this->db)->exec($req);
          return $lignereq;
        }

    }

    ?>
