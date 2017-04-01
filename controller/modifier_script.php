<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$bdd = new bdd ($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password);

if(isset($_POST['ordre']) && isset($_POST['description']) && isset($_POST['titre']) && isset($_POST['id']))
{
    $ordre = $_POST['ordre'];
    $description = $_POST['description'];
    $titre = $_POST['titre'];
    $id = $_POST['id'];

    if($_REQUEST['btn_submit']=="modifier")
    {
        $bdd->modifier($id, $ordre, $titre, $description);
    }
    else if($_REQUEST['btn_submit']=="supprimer")
    {
        $bdd->supprimer($id);
    }
}
else if($_REQUEST['btn_submit']=="ajouter")
{
    $bdd->ajouter("test");
}
else
{
    echo "Erreur";
}
header('Location: ?page=modifier');
