<?php

$bdd = new bdd ($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password);

$ordre = $_POST['ordre'];
$description = $_POST['description'];
$titre = $_POST['titre'];

$monquerry = "UPDATE `image` SET `ordre`='$ordre' WHERE odre = '$ordre'";
$bdd->querryArray($monquerry);
$diapositives = $bdd->donnees;
