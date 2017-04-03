<?php
/*
 * Createur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// On verifie que l'input avec l'attriubut "name" = login sois égale au login enregistrer dans le fichier de configuration
// on veriffie ensuite que le mot de passe envoyé par l'input de d'attribut name="password"
// Pour verifier j'utilise la fonction hash avec la methode 'SHA512'
// j'ai utiliser cette fonction dans un echo pour recuperer le hash du mot de passe admin
// J'ai enregistrer le resultat dans le define de PASSWORD
// Pour verifier si c'est bien la meme chose, je re hash le mot de passe a chaque connexion
// Je verifie ensuite les deux hash, celui dans le fichier configuration et celui envoyer par le form

// Si il on égaux, alors c'est que le mot de passe est correct
// Dans ce cas je crée un séssion
// Une session est des variables php qui von ce transmettre de page en page
// Je crée les varibales 'logged' et 'user'
// Ensuite grace au header je redirige sur la bonne page en affichant un message de confirmation de connexion

//Dans le cas ou le mot de passe ou le nom d'utilisateur n'est pas correct alors je detourne sur la page 404
//Eet j'affiche un erreur
if ($_POST['login'] == LOGIN && hash('sha512', $_POST['password']) == PASSWORD) {
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['user'] = $_POST['login'];
    header('Location: ?page=modifier&&message=CONNECTE');
} else {
    header('Location: ?page=404&&message=PASSWORD_INVALIDE');
}

?>
