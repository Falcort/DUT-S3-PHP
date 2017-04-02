<?php
    if($_SESSION['logged'] != true && !isset($_SESSION['user']))
    {
        header('Location: index.php');
    }
    else
    {
        require_once (PATH_MODELS.'diaporama.php');
        require_once(PATH_VUE.'modifier.php');
    }
?>
