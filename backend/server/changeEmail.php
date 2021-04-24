<?php
    session_start();

    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include realpath(dirname(__FILE__) . '/../db/models/Users.php');

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        $_SESSION['changeDataError'] = 'Błąd połączenia z bazą';
        header('Location: ../../frontend/views/userprofile.php');
    }
    else {
        $newEmail = $_POST['newEmail'];
        $updateUser = Users::updateEmail($newEmail, $db->getConnection());
        if (!$updateUser) {
            $_SESSION['changeDataError'] = 'Nie udało sie zaktualizować adresu e-mail... Spróbuj ponownie później';
            header('Location: ../../frontend/views/userprofile.php');
        }
        else if ($updateUser !== false && $updateUser !== true) {
            $_SESSION['changeDataError'] = $updateUser;
            header('Location: ../../frontend/views/userprofile.php');
        }
        else {
            $_SESSION['changeDataSuccess'] = 'Adres e-mail został zaktualizowany pomyślnie';
            $_SESSION['userEmail'] = $newEmail;
            header('Location: ../../frontend/views/userprofile.php');
        }
    }
?>