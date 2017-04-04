<?php
/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// On crée une nouvelle connection à la base de donnée
$bdd = new bdd ($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password);

// On entre la requête SQL voulue
$monquerry = "SELECT * FROM image, image_description WHERE image.id = image_description.id_image ORDER BY ordre";
// On exécute la query, grâce à la fonction du prof
$bdd->querryArray($monquerry);
// On rentre le résultat dans la variable $diapositives
$diapositives = $bdd->donnees;
