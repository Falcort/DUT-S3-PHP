<?php
/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

//Ce script permet de se déconnecter
//Il détruit la session PHP existante

session_start();
$_SESSION = array();
session_destroy();
header('Location: ?page=index&&message=DECONNECTE');
exit();
?>
