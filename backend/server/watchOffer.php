<?php
    session_start();

    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include realpath(dirname(__FILE__) . '/../db/models/WatchedOffers.php');

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        $_SESSION['watchOfferError'] = 'Błąd połączenia z bazą';
        header('Location: ../../frontend/views/watched.php');
    }
    else {
        if (!isset($_SESSION['userID'])) {
            header('Location: ../../frontend/views/signin.php');
        }
        else {
            if (!WatchedOffers::insertOffer($_POST['offerID'], $_SESSION['userID'], $db->getConnection())) {
                $_SESSION['watchOfferError'] = 'Chwilowo nie można wykonać żądanej operacji';
            }
            header('Location: ../../frontend/views/watched.php?page=1');
        }
    }
?>