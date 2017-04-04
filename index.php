<?php
/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// Cette deux lignes permettent d'afficher les messages d'erreur sur linux (apache)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Importation
// Ici on importe tous les fichiers qui vont être utiles aux pages du site
// Ici on require tous les fichiers avec require once
require_once('defines/structure.php');
require_once(PATH_DEFINES . 'configuration.php');
require_once(PATH_LANGUES . PATH_FR . 'textes.php');

require_once(PATH_LIB . 'base.php');
$base = new base();
require_once(PATH_LIB . PATH_BDD . 'bdd.php');
require_once(PATH_VUE.'alert.php');

// Ici on verifie que l'URL a bien un ?page=
// Si il y en a un alors on rentre dans la boucle
// On vérifie ensuite avec iseAlpha qu'il n'y est pas de caratères impromptus
// Si il n'y a pas de char chelou, on vérifie que le fichier portant le nom du ?page=XXXXX existe
// En fonction de toutes ces verifications, on rentre là où on va "rediriger" dans la variable $page
if (isset($_GET['page'])) {
    if ($base->isAlpha($_GET['page']) != false) {
        if (is_file(PATH_CONTROLLER . $_GET['page'] . ".php")) {
            $page = $_GET['page'];
        } else {
            $page = "erreur";
        }
    } else {
        $page = "404";
    }
} else {
    $page = "index";
}
// A la fin de la boucle, on ne redirige pas
// On importe dans cette page la page en question
// Ce qui a pour effet de ne pas perdre les requires_onces
// On ne perd donc pes les imports, et il est nécessaire de les faire que dans cette page
require_once(PATH_CONTROLLER . $page . '.php');

$base->__destruct();

?>
