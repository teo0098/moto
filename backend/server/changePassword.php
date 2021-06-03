<?php
    session_start();

    include "./CORS.php";
    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include realpath(dirname(__FILE__) . '/../db/models/Users.php');

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        $_SESSION['changeDataError'] = 'Błąd połączenia z bazą';
        header('Location: ../../frontend/views/userprofile.php');
    }
    else {
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $updateUser = Users::updatePassword($oldPass, $newPass, $db->getConnection());
        if (!$updateUser) {
            $_SESSION['changeDataError'] = 'Nie udało sie zaktualizować hasła... Spróbuj ponownie później';
            header('Location: ../../frontend/views/userprofile.php');
        }
        else if ($updateUser !== false && $updateUser !== true) {
            $_SESSION['changeDataError'] = $updateUser;
            header('Location: ../../frontend/views/userprofile.php');
        }
        else {
            $_SESSION['changeDataSuccess'] = 'Hasło zostało zaktualizowane pomyślnie';
            header('Location: ../../frontend/views/userprofile.php');
        }
    }
?>