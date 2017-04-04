<?php
/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// Ici je vérifie que l'utilisateur sois connecté pour qu'il puisse accéder à cette page
// Pour vérifier si il est connecté j'utilise les variables de session
// voir login.php pour les explications de session
// Si il est connecté à ce moment là il a le droit d'accéder à cette page

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
