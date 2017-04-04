<?php
/*
 * Créateur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// Fonction pour afficher les erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

// On créé une nouvelle connexion à la BDD
$bdd = new bdd ($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password);

// On vérifie que les inputs avec les attributs name 'ordre' ET 'description' ET 'titre' ET 'id'
if (isset($_POST['ordre']) && isset($_POST['description']) && isset($_POST['titre']) && isset($_POST['id'])) {
    // On met les informations de l'input dans des variables
    $ordre = $_POST['ordre'];
    $description = $_POST['description'];
    $titre = $_POST['titre'];
    $id = $_POST['id'];

    // Par la suite on viens vérifier quel bouton a été cliqué
    // Cela permet de bien effectuer les bonnes actions si on clique sur le bon bouton
    // De cette manière on ne peut pas accéder à la fonction supprimer si on a cliqué sur le boutton modifier
    if ($_REQUEST['btn_submit'] == "modifier") {
        // Le bouton d'attribut name="btn_sumit" et qui a comme attribut value="modifier" a été cliqué
        // On lance donc la fonction modifier de l'object bdd
        $bdd->modifier($id, $ordre, $titre, $description);

        header('Location: ?page=modifier&&message=MODIF_SUCCES');
    } else if ($_REQUEST['btn_submit'] == "supprimer") {
        // si c'est le boutton de value supprimer qui a été cliquer
        // On lancer donc la fonction supprimer de la classe bdd
        $bdd->supprimer($id);
        header('Location: ?page=modifier&&message=IMG_DEL');
    }
    // Ici nous somme dans le cas de ajouter, il n'y a donc pas les mêmes verifications de champs à faire
} else if ($_REQUEST['btn_submit'] == "ajouter") {
    // Ici pour éviter de vérifier si le fichier existe déjà ou de gérer le renommage
    // Je viens créer un nom aleéatoire qui sera sauvegardé en base de donnée, il y a donc très peu de chances que le même nom soit généré deux fois

    //////////////////////////////////////////////
    // Cette fonction permet de générer une chaine de 20 caractères aléatoirement grâce à la chaine
    // $charactres_list
    $max = 20;
    $character_list = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $i = 0;
    $name = "";
    while ($i < $max) {
        $name .= $character_list{mt_rand(0, (strlen($character_list) - 1))};
        $i++;
    }
    //////////////////////////////////////////////

    // Cette fonction très moche et compliquée permet de vérifier l'extension du fichier
    // de vérifier sa taille
    // De le renommer
    // et au final de l'uploader
    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // on explose le string pour récuperer ce qui est après le .
    $file_ext = substr($filename, strripos($filename, '.')); // on explose le string pour récuperer ce qui est avant
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.png', '.jpg', '.gif', '.jpeg'); // on définie quelle extension de fichier est autorisé

    // on vérifie que le fichier est une extension valide et que sa taille ne sois pas trop grosse
    if (in_array($file_ext, $allowed_file_types) && ($filesize < 2000000000000000000000000000000000000000000000000000000000000)) {
        // On renomme le fichier
        $newfilename = $name . $file_ext;
        if (file_exists(PATH_IMAGES . $newfilename)) {
            // l'image existe déjà dans le dossier images
            header('Location: ?page=modifier&&message=ALREADY_EXIST');
        } else {
            // Ici on upload
            move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $newfilename);
            // SI toutes ces verifications sont ok, et que l'image est sur le serveur, elle n'est toujours pas en base de donnée
            // C'est ici que l'on viens donc l'entrée en base de donnée
            $bdd->ajouter($newfilename);
            header('Location: ?page=modifier&&message=UPLOAD_SUCCES');
        }
    } elseif (empty($file_basename)) {
        // Ici il ny a pas de fichier
        header('Location: ?page=modifier&&message=NO_FILE');
    } elseif ($filesize > 2000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000) {
        // Le fichier est trop gros
        header('Location: ?page=modifier&&message=TROP_GROS');
    } else {
        // L'extension du fichier n'est pas correcte
        unlink($_FILES["file"]["tmp_name"]);
        header('Location: ?page=modifier&&message=ALLOWED_FILES');
    }
} else {
    // Si erreur non listée, on affiche quand même une erreur
    header('Location: ?page=modifier&&message=ERROR');
}
