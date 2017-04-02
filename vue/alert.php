<?php
function alert($classeAlert, $messageAlert)
{
    ?>
    <div class="alert alert-<?php echo $classeAlert; ?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echo $messageAlert; ?></strong>
    </div>
    <?php
}

if (isset($_GET['message'])) {
    $message = $_GET['message'];
    switch ($message) {
        case "URL_INVALIDE":
            alert('danger', MESSAGE_URL_INVALIDE);
            break;
        case "CONNECTE":
            if ($_SESSION['logged'] == true) alert('success', MESSAGE_CONNECTE);
            break;
        case "DECONNECTE":
            if (!isset($_SESSION['logged'])) alert('success', MESSAGE_DECONNECTE);
            break;
        case "PAS_CONNECTE":
            alert('danger', MESSAGE_PAS_CONNECTE);
            break;
        case "PASSWORD_INVALIDE":
            alert('danger', MESSAGE_PASSWORD_INVALIDE);
        case "ACCES_REFUSED":
            alert('danger', ACCES_REFUSER);
        default :
    }
}