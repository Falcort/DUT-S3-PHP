<?php
/*
 * Createur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// On crée une nouvelle connection a la base de donnée
$bdd = new bdd ($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password);

//On entre la requete SQL voulu
$monquerry = "SELECT * FROM image, image_description WHERE image.id = image_description.id_image ORDER BY ordre";
//On execute la query, grace a la fonction du prof
$bdd->querryArray($monquerry);
// On rentre le resultat dans la variables $diapositives
$diapositives = $bdd->donnees;
