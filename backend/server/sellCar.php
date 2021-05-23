<?php
    session_start();

    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include "../db/models/Transactions.php";

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        $_SESSION['offerEditError'] = 'Błąd połączenia z bazą';
    }
    else {
        if ($_GET['method'] == 'DELETE') {
            $transaction = Transactions::deleteTransaction($_POST['offerID'], $db->getConnection());
            if (!$transaction) {
                $_SESSION['offerEditError'] = 'Chwilowo nie można anulować sprzedaży oferty';
            }
            else {
                $_SESSION['offerEditSuccess'] = 'Sprzedaż oferty została anulowana pomyślnie';
            }
        }
        else {
            $transaction = Transactions::insertTransaction($_POST['offerID'], $db->getConnection());
            if (!$transaction) {
                $_SESSION['offerEditError'] = 'Chwilowo nie można sprzedać oferty';
            }
            else {
                $_SESSION['offerEditSuccess'] = 'Oferta została sprzedana pomyślnie';
            }
        }
    }
    header('Location: ../../frontend/views/myoffer.php?id='.$_POST['offerID'].'');
?>