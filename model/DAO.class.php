<?php

    require_once("../model/Livre.class.php");
    require_once("../model/Categorie.class.php");
    require_once("../model/Format.class.php");
    require_once("../model/Magasin.class.php");


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

        // Constructeur chargé d'ouvrir la BD
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
        // la base sous la forme d'objets de la classe Livre.
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


        // Acces au n livres à partir de l'isbn $isbn
        // Retourne une table d'objets de la classe Livre
        function getNCateg(string $isbn,int $n,int $categorie) : array {
          // changement : j'ai défini en int => identifiant

            $req = "SELECT * FROM livre WHERE ISBN>=$isbn AND idCategorie=$categorie ORDER BY ISBN ASC LIMIT $n ";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }

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

        // Acces aux n livres de catégorie->id=$idCategorie qui précèdent de $n l'isbn $isbn dans l'ordre des isbn
        function prevNCateg(string $isbn,int $n,int $idCategorie): array {

            $req = "SELECT * FROM (SELECT * FROM livre WHERE ISBN<$isbn AND idCategorie=$idCategorie ORDER BY ISBN DESC LIMIT $n) ORDER BY ISBN";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }
        //======================================================================
        // Format
        //======================================================================

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
            return $result[0];
        }


        // Acces au n livres à partir de l'isbn $isbn
        // Retourne une table d'objets de la classe Livre
        function getNFormat(string $isbn,int $n,int $idFormat) : array {
          // changement : j'ai défini en int => identifiant

            $req = "SELECT * FROM livre WHERE ISBN>=$isbn AND idFormat=$idFormat ORDER BY ISBN ASC LIMIT $n ";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }

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
        function prevNFormat(string $isbn,int $n,int $idFormat): array {

            $req = "SELECT * FROM (SELECT * FROM livre WHERE ISBN<$isbn AND idFormat=$idFormat ORDER BY ISBN DESC LIMIT $n) ORDER BY ISBN";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }

        //======================================================================
        // Magasin
        //======================================================================

        function getAllMaga() : array {

            $req = "SELECT * FROM magasin";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Magasin');
            return $result;
        }

        // Acces à un format
        // Retourne un objet de la classe Format connaissant son identifiant
        function getMaga(string $id): Magasin {

            $req = "SELECT * FROM Magasin WHERE idMagasin=$id";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Magasin');
            return $result[0];
        }


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

        function nbExemplaireMag(string $isbn, int $idMag){
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

    }

    ?>
