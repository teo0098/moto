<?php
    session_start();

    include "./CORS.php";
    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include realpath(dirname(__FILE__) . '/../db/models/Admins.php');

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) 
    {
        $_SESSION['changeDataError'] = 'Błąd połączenia z bazą';
        header('Location: ../../frontend/views/editusers.php?id='.$_POST["id"].'');
    }
    else 
    {
        $newPass = $_POST['newPass'];
        $updateUser = Admins::updateUserPassword($newPass, $_POST['id'], $db->getConnection());
        if (!$updateUser) 
        {
            $_SESSION['changeDataError'] = 'Nie udało sie zaktualizować hasła... Spróbuj ponownie później';
            header('Location: ../../frontend/views/editusers.php?id='.$_POST["id"].'');
        }
        else if ($updateUser !== false && $updateUser !== true) 
        {
            $_SESSION['changeDataError'] = $updateUser;
            header('Location: ../../frontend/views/editusers.php?id='.$_POST["id"].'');
        }
        else 
        {
            $_SESSION['changeDataSuccess'] = 'Hasło zostało zaktualizowane pomyślnie';
            $_SESSION['userPassword'] = $newPass;
            header('Location: ../../frontend/views/editusers.php?id='.$_POST["id"].'');
        }
    }
?>