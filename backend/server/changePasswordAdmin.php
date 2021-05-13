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
        $newPass = $_POST['newPass'];
        $updateUser = Admins::updateUserPassword($newPass, $_POST['id'], $db->getConnection());
        if (!$updateUser) 
        {
            $_SESSION['changeDataError'] = 'Nie udało sie zaktualizować hasła... Spróbuj ponownie później';
            header('Location: ../../frontend/views/userpanel.php');
        }
        else if ($updateUser !== false && $updateUser !== true) 
        {
            $_SESSION['changeDataError'] = $updateUser;
            header('Location: ../../frontend/views/userpanel.php');
        }
        else 
        {
            $_SESSION['changeDataSuccess'] = 'Hasło zostało zaktualizowane pomyślnie';
            header('Location: ../../frontend/views/userpanel.php');
        }
    }
?>