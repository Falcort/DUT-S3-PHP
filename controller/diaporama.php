<?php
/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// Ici la structure de notre page
// On importe le résultat de la requête SQL avec la variable $ diapositives
// On affiche le header
// On affiche le diaporama lui-même
// On affiche le footer
require_once(PATH_MODELS . 'diaporama.php');
require_once(PATH_VUE . 'header.php');
require_once(PATH_VUE . 'diaporama.php');
require_once(PATH_VUE . 'footer.php');
