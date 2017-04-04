<?php
/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// C'est une page qui va être importé par l'index
// On importe donc notre header qui va quant à lui importer le CSS, le JSS etc
// Et surtout il va créer l'image avec le titre du site
// Et créer la barre de navigation
require_once(PATH_VUE . 'header.php');
echo "<h1>" . ERREUR_404 . "</h1>";
require_once(PATH_VUE . 'footer.php');
//Pareil que le header, le footer va lui importer le html de notre footer et donc l'afficher
?>
