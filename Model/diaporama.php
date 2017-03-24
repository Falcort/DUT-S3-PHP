<?php

$bdd = new bdd ($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password);

$monquerry = "SELECT nom_fichier FROM image";
$bdd->querryArray($monquerry);
$diapositives = $bdd->donnees;
