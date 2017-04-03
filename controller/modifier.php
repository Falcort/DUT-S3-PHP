<?php
/*
 * Createur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// Ici je verifie que l'utilisateur sois connecter pour qu'il puisse acceder a cette page
// Pour verifier si il est connecter j'utilise les variable de session
// voir login.php pour les explication de session
// Si il est connecter a ce moment la il a le droit d'aceder a cette page

//Sinon je le redirige
if ($_SESSION['logged'] != true && !isset($_SESSION['user'])) {
    header('Location: index.php?page=index&&message=ACCES_REFUSED');
} else {
    require_once(PATH_MODELS . 'diaporama.php');
    require_once(PATH_VUE . 'header.php');
    require_once(PATH_VUE . 'modifier.php');
    require_once(PATH_VUE . 'footer.php');
}
?>
