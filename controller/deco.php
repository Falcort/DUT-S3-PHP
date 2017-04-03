<?php
/*
 * Createur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

//ce script permet de ce deconnter
//Il detruit la session php existante

session_start();
$_SESSION = array();
session_destroy();
header('Location: ?page=index&&message=DECONNECTE');
exit();
?>
