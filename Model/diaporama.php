<?php

$bdd = new bdd ($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password);

$monquerry = "SELECT * FROM image, image_description WHERE image.id = image_description.id_image";
$bdd->querryArray($monquerry);
$diapositives = $bdd->donnees;
