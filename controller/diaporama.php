<?php
/*
 * Createur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// Ici la structure de notre page
// On importe le resultat de la requete SQL avec la variable $ diapositives
// On affiche le header
// On affiche le diaporama lui meme
// On affiche le footer
require_once(PATH_MODELS . 'diaporama.php');
require_once(PATH_VUE . 'header.php');
require_once(PATH_VUE . 'diaporama.php');
require_once(PATH_VUE . 'footer.php');
