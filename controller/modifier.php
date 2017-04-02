<?php
    if($_SESSION['logged'] != true && !isset($_SESSION['user']))
    {
        header('Location: index.php?page=index&&message=ACCES_REFUSED');
    }
    else
    {
        require_once (PATH_MODELS.'diaporama.php');
        require_once(PATH_VUE.'modifier.php');
    }
?>
