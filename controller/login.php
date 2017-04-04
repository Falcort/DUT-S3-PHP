<?php
/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// On vérifie que l'input avec l'attribut "name" = login soit égale au login enregistré dans le fichier de configuration
// On vérifie ensuite que le mot de passe envoyé par l'input de d'attribut name="password"
// Pour vérifier j'utilise la fonction hash avec la méthode 'SHA512'
// J'ai utiliser cette fonction dans un echo pour recuperer le hash du mot de passe admin
// J'ai enregistré le résultat dans le define de PASSWORD
// Pour vérifier si c'est bien la même chose, je re-hash le mot de passe à chaque connexion
// Je vérifie ensuite les deux hash, celui dans le fichier configuration et celui envoyé par le form

// Si ils sont égaux, alors c'est que le mot de passe est correct
// Dans ce cas je crée un session
// Une session est un ensemble de variables php qui vont se transmettre de pages en pages
// Je créé les varibales 'logged' et 'user'
// Ensuite grâce au header je redirige sur la bonne page en affichant un message de confirmation de connexion

//Dans le cas où le mot de passe ou le nom d'utilisateur n'est pas correct alors je détourne sur la page 404
//Et j'affiche une erreur
if ($_POST['login'] == LOGIN && hash('sha512', $_POST['password']) == PASSWORD) {
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['user'] = $_POST['login'];
    header('Location: ?page=modifier&&message=CONNECTE');
} else {
    header('Location: ?page=404&&message=PASSWORD_INVALIDE');
}

?>
