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
        private $database = 'sqlite:../data/db/book.db';

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

            $req = "SELECT * FROM livre ORDER BY isbn ASC LIMIT $n";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }

        // Acces au n livres à partir de la reférence $isbn
        // Cette méthode retourne un tableau contenant n  livres de
        // la base sous la forme d'objets de la classe Livre.
        function getN(string $isbn,int $n) : array {

            $req = "SELECT * FROM livre WHERE isbn>=$isbn ORDER BY isbn LIMIT $n";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;

        }

        // Acces à l'isbn qui suit l'isbn $isbn dans l'ordre des isbn
        function next(string $isbn) : string {

            $req = "SELECT * FROM livre WHERE isbn>$isbn ORDER BY isbn LIMIT 1";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            if ($result[0] == NULL){
              return 0;
            }else{
              return ($result[0]->isbn);
            }
        }

        // Acces aux n livres qui précèdent de $n l'isbn $isbn dans l'ordre des isbn
        function prevN(string $isbn,int $n): array {

            $req = "SELECT * FROM livre WHERE isbn<$isbn ORDER BY isbn DESC LIMIT $n";
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

            $req = "SELECT * FROM categorie WHERE id=$id";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Categorie');
            return $result[0];
        }


        // Acces au n livres à partir de l'isbn $isbn
        // Retourne une table d'objets de la classe Livre
        function getNCateg(string $isbn,int $n,int $categorie) : array {
          // changement : j'ai défini en int => identifiant

            $req = "SELECT * FROM livre WHERE isbn>=$isbn AND categorie=$categorie ORDER BY isbn ASC LIMIT $n ";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }

        //======================================================================
        // Format
        //======================================================================

        // Acces à un format
        // Retourne un objet de la classe Format connaissant son identifiant
        function getFormat(int $id): Format {

            $req = "SELECT * FROM format WHERE id=$id";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Format');
            return $result[0];
        }


        // Acces au n livres à partir de l'isbn $isbn
        // Retourne une table d'objets de la classe Livre
        function getNFormat(string $isbn,int $n,int $idFormat) : array {
          // changement : j'ai défini en int => identifiant

            $req = "SELECT * FROM livre WHERE isbn>=$isbn AND format=$format ORDER BY isbn ASC LIMIT $n ";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Livre');
            return $result;
        }

        //======================================================================
        // Magasin
        //======================================================================

        // Acces à un format
        // Retourne un objet de la classe Format connaissant son identifiant
        function getMaga(int $id): Magasin {

            $req = "SELECT * FROM Magasin WHERE id=$id";
            $lignereq =($this->db)->query($req);
            $result =$lignereq->fetchAll(PDO::FETCH_CLASS,'Magasin');
            return $result[0];
        }

        // Un livre possède un magasin?


    }

    ?>
