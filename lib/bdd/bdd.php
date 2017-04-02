<?php

class bdd
{

    public $donnees = NULL;

    function __construct($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password)
    {
        try {
            $this->bdd = new PDO('mysql: host =' . $MYSQL_host . '; dbname=' . $MYSQL_dbname, $MYSQL_user, $MYSQL_password); //on crée un objet dans la classe bdd
            $this->bdd->exec('SET NAMES utf8');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // '::' Avoir acces a un attribut statique de la classe
        } catch (Exception $e) {
            die ('Erreur : ' . $e->getMessage());
        }
    }

    public function querryArray($monquery, $mesdonnees = array())
    {

        try {
            $request = $this->bdd->prepare($monquery);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request->execute($mesdonnees);
            $this->donnees = $request->fetchAll();
        } catch (PDOExection $e) {
            die ('Erreur : ' . $e->getMessage());
        }

    }

    public function query($monquery, $mesdonnees = array())
    {

        try {
            $request = $this->bdd->prepare($monquery);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request->execute($mesdonnees);
            $this->donnees = $request->fetch();

        } catch (PDOExection $e) {
            die ('Erreur : ' . $e->getMessage());
        }
    }

    public function modifier($id, $ordre, $titre, $description)
    {
        try {
            $stmt = $this->bdd->prepare("UPDATE image SET ordre=:ordre WHERE id=:id");
            $stmt->bindparam(":ordre", $ordre);
            $stmt->bindparam(":id", $id);
            $stmt->execute();

            $stmt2 = $this->bdd->prepare("UPDATE image_description SET titre=:titre,description=:description,date_modification=SYSDATE() WHERE id_image = :id");
            $stmt2->bindparam(":id", $id);
            $stmt2->bindparam(":titre", $titre);
            $stmt2->bindparam(":description", $description);
            $stmt2->execute();
        } catch (PDOException $e) {
            die ('Erreur : ' . $e->getMessage());
        }
    }

    public function supprimer($id)
    {
        try {
            $stmt = $this->bdd->prepare("DELETE FROM image WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();

            $stmt2 = $this->bdd->prepare("DELETE FROM image_description WHERE id_image=:id");
            $stmt2->bindparam(":id", $id);
            $stmt2->execute();
        } catch (PDOException $e) {
            die ('Erreur : ' . $e->getMessage());
        }
    }

    public function ajouter($nom_fichier)
    {
        try {
            $stmt = $this->bdd->prepare("INSERT INTO image(nom_fichier, date_création, date_modification) VALUES (:nom,SYSDATE(),SYSDATE())");
            $stmt->bindparam(":nom", $nom_fichier);
            $stmt->execute();

            $stmt2 = $this->bdd->prepare("INSERT INTO image_description(titre, description, date_création, date_modification) VALUES ('', '', SYSDATE(), SYSDATE())");
            $stmt2->execute();
        } catch (PDOException $e) {
            die ('Erreur : ' . $e->getMessage());
        }
    }

}
