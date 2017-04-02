<?php
    include('../defines/configuration.php');
    if ($_POST['login'] == LOGIN && hash('sha512', $_POST['password']) == PASSWORD)
    {
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $_POST['login'];
        echo "Connecté";
        header('Location ?page=modifier.php');
    }
    else
    {
        header('Location: ?page=404.php');
    }

?>
