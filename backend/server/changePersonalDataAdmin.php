<?php
    session_start();

    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include realpath(dirname(__FILE__) . '/../db/models/Admins.php');

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        $_SESSION['changeDataError'] = 'Błąd połączenia z bazą';
        header('Location: ../../frontend/views/userpanel.php');
    }
    else 
    {
        $newName = $_POST['newName'];
        $newSurname = $_POST['newSurname'];
        $updateUser = Admins::updateUserPersonalData($newName, $newSurname, $_POST['id'], $db->getConnection());
        if (!$updateUser) {
            $_SESSION['changeDataError'] = 'Nie udało sie zaktualizować danych osobowych... Spróbuj ponownie później';
            header('Location: ../../frontend/views/userpanel.php');
        }
        else if ($updateUser !== false && $updateUser !== true) {
            $_SESSION['changeDataError'] = $updateUser;
            header('Location: ../../frontend/views/userpanel.php');
        }
        else {
            $_SESSION['changeDataSuccess'] = 'Dane osobowe zostały zaktualizowane pomyślnie';
            $_SESSION['userName'] = $newName;
            $_SESSION['userSurname'] = $newSurname;
            header('Location: ../../frontend/views/userpanel.php');
        }
    }
?>