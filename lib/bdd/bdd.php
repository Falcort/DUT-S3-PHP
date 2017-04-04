<?php
/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// Ici on definie la classe BDD
class bdd
{

    public $donnees = NULL;

    // Le constructeur
    function __construct($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password)
    {
        try {
            $this->bdd = new PDO('mysql: host =' . $MYSQL_host . '; dbname=' . $MYSQL_dbname, $MYSQL_user, $MYSQL_password); //on crée un objet dans la classe bdd
            $this->bdd->exec('SET NAMES utf8');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // '::' Avoir accès à un attribut statique de la classe
        } catch (Exception $e) {
            die ('Erreur : ' . $e->getMessage());
        }
    }

    //Fonction que je ne comprends pas
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

    //Pareil
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

    // C'est la fonction qui modifie une image
    // Elle a besoin de 4 arguments
    // Ce n'est pas la fonction du prof, je l'ai codé moi même

    // Elle utilise un système de paramètres
    // On ne peut pas dans la commande SQL inclure des variables PHP
    // On prépare donc la fonction
    // Dans la commande SQL à chaque fois qu'il y a :XXXXX il y aura un paramètre
    // Ici il y en a deux, :ordre, et :id
    // Il veut ensuite dire ce :XXXX va être égale à
    // Pour cela on utilise bind params
    // Une fois tout les paramètres defini on exécute
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

    //Pareil que celle du dessus, référez-vous aux explications au dessus
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

    //Pareil que celle du dessus, référez-vous aux explications au dessus
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
