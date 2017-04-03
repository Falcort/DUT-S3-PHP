<?php
/*
 * Createur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// Ces un page qui va etre importer par le index
// on importe donc notre header qui va quand a lui importer le cssle js etc etc
// Et surtout il va crée l'image avec le titre du site
// et crée l bar de navigation
require_once(PATH_VUE . 'header.php');
echo "<h1>" . ERREUR_404 . "</h1>";
require_once(PATH_VUE . 'footer.php');
//Pareil que le header, le footer va lui importer le html de notre footer et d'onc l'afficher
?>
