<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

    //Importation des fichiers de configuration
    require_once('defines/structure.php');
    //On importe defines, afin de pouvoir utiliser les constantes que l'on a définit auparavant
    require_once(PATH_DEFINES.'configuration.php');
    require_once(PATH_LANGUES.PATH_FR.'textes.php');

    require_once(PATH_LIB.'base.php');
    $base = new base();
    require_once (PATH_LIB.PATH_BDD.'bdd.php');

    if(isset($_GET['page']))
    {
        if ($base->isAlpha($_GET['page'])!=false)
        {
            if(is_file(PATH_CONTROLLER.$_GET['page'].".php"))
            {
                $page = $_GET['page'];
            }
            else
            {
                $page = "erreur";
            }
        }
        else
        {
            $page = "404";
        }
    }
    else
    {
        $page = "index";
    }
    require_once(PATH_CONTROLLER.$page.'.php');

    $base->__destruct();

    /*elseif(!isset(*secure_key) || !$base->validate());
      //cle de securite InvalidArgumentException
      header("location:".$url."-message-cle_securite_invalide");
      exit();
    elseif(!isset($identifiant) || !$base->isAlpha($identifiant));
      //identifiant InvalidArgumentException
      header("location:".$url."-message-identifiant_invalide");
      exit();
    elseif(!isset($identifiant) || !$base->isAlpha($identifiant));
      //identifiant InvalidArgumentException
      header("location:".$url."-message-identifiant_invalide");
      exit();*/

?>
