<?php
/*
 * Createur: Thibault SOUQUET
 * Pour le cours de PHP
 * IUT 2017
 */

// Fonction pour afficher les erreur
ini_set('display_errors', 1);
error_reporting(E_ALL);

//On crée un nouvelle connexion a la BDD
$bdd = new bdd ($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password);

// On verifie que les input avec les attribut name 'ordre' ET 'description' ET 'titre' ET 'id'
if (isset($_POST['ordre']) && isset($_POST['description']) && isset($_POST['titre']) && isset($_POST['id'])) {
    // On met les information de l'input dans des variables
    $ordre = $_POST['ordre'];
    $description = $_POST['description'];
    $titre = $_POST['titre'];
    $id = $_POST['id'];

    // par la suite on vien verifier quelle boutton a été cliquer
    // Cela permet de bien effectuer les bonnes action si on clique sur le bon coutton
    // De cette maniere on ne peu pas acceder a la fonction supprier si on a cliquer sur le boutton modifier
    if ($_REQUEST['btn_submit'] == "modifier") {
        //Le button d'attribut name="btn_sumit" et qui a comme attribut value="modifier" a été cliquer
        // on lance donc la fonction modifier de l'object bdd
        $bdd->modifier($id, $ordre, $titre, $description);

        header('Location: ?page=modifier&&message=MODIF_SUCCES');
    } else if ($_REQUEST['btn_submit'] == "supprimer") {
        // sis c'est le boutton de value supprimer qui a été cliquer
        // on lancer donc la fonction supprimer de la classe bdd
        $bdd->supprimer($id);
        header('Location: ?page=modifier&&message=IMG_DEL');
    }
    //Ici nous somme dans le cas de ajouter, il n'y a donc pas les meme verification de champs a faire
} else if ($_REQUEST['btn_submit'] == "ajouter") {
    // Ici pour eviter de verifier si le fichier existe deja ou de gerer le renomage
    // Je vien crée un nom aleéatoire qui sera sauvgarder en base de donnée, il y a donc tres peu de chance que le meme nom sois generer deux fois

    //////////////////////////////////////////////
    // Cette fonction permmet de generer une chaine de 20 characteres aléatoirement grace a la chaine
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

    //Cette fonction tres moche et compliquer permet de verifier l'extension du fichier
    // de verifier sa taille
    // De le renomer
    // et au final de l'uploader
    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // on explose le string pour recuperer ce qui est apres du .
    $file_ext = substr($filename, strripos($filename, '.')); // on explose le string pour recuperer ce qui est avant
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.png', '.jpg', '.gif', '.jpeg'); // on definie quelle extension de fichier est autoriser

    // on verifie que le fichier est une extension valide et que sa taille ne sois pas trop grosse
    if (in_array($file_ext, $allowed_file_types) && ($filesize < 200000)) {
        // On renome le fichier
        $newfilename = $name . $file_ext;
        if (file_exists(PATH_IMAGES . $newfilename)) {
            // l'image existe deja dans le dossier images
            header('Location: ?page=modifier&&message=ALREADY_EXIST');
        } else {
            // Ici on upload
            move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $newfilename);
            // SI toutes ces verification sotn ok, et que l'image ests ur le serveur, elle n'est toujours pas en base de donnée
            // C'est ici que l'on vien donc l'entrée en base de donnée
            $bdd->ajouter($newfilename);
            header('Location: ?page=modifier&&message=UPLOAD_SUCCES');
        }
    } elseif (empty($file_basename)) {
        // ici il ny a pas de fichier
        header('Location: ?page=modifier&&message=NO_FILE');
    } elseif ($filesize > 200000) {
        // Le fichier est trop gros
        header('Location: ?page=modifier&&message=TROP_GROS');
    } else {
        // L'extension du fichier n'est pas correct
        unlink($_FILES["file"]["tmp_name"]);
        header('Location: ?page=modifier&&message=ALLOWED_FILES');
    }
} else {
    // Si erreur non listé, on affiche quand meme une erreur
    header('Location: ?page=modifier&&message=ERROR');
}
