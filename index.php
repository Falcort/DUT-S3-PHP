<?php
/*
 * Createur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

//Cette deux lignes permettent d'afficher les message d'erreur sur linux (apache)
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Importation
//Ici on importe totts les fichiers qui von etre utiles au pages du site
// Ici on require tout les fichier avec require once
require_once('defines/structure.php');
require_once(PATH_DEFINES . 'configuration.php');
require_once(PATH_LANGUES . PATH_FR . 'textes.php');

require_once(PATH_LIB . 'base.php');
$base = new base();
require_once(PATH_LIB . PATH_BDD . 'bdd.php');
require_once(PATH_VUE.'alert.php');

// Ici on verifie que dans l'url il y est un ?page=
// Si il y en a un alors, on rentre dans la boucle
// On verifie ensuite avec iseAlpha qu'il ny est pas de charatères chelou
// Si il ny a pas de char chelou, on veirife que le fichier portant le nome du ?page=XXXXX existe
// En fonction de toutes ces verification, on rentre la ou on va "regiriger" dans la variablle $page
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
//A la fin de la bouche, on ne redirige pas
// On importe danns cette page la parge en question
// Ce qui a pour effet de ne pas perdre les requires_onces
// On ne perd donc pes les imports, et il est necessaire de les faire que dans cette page
require_once(PATH_CONTROLLER . $page . '.php');

$base->__destruct();

?>
