<?php
    session_start();

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
        $newEmail = $_POST['newEmail'];
        $updateUser = Admins::updateUserEmail($newEmail, $_POST['id'], $db->getConnection());
        if (!$updateUser) 
        {
            $_SESSION['changeDataError'] = 'Nie udało sie zaktualizować adresu e-mail... Spróbuj ponownie później';
            header('Location: ../../frontend/views/editusers.php?id='.$_POST["id"].'');
        }
        else if ($updateUser !== false && $updateUser !== true) 
        {
            $_SESSION['changeDataError'] = $updateUser;
            header('Location: ../../frontend/views/editusers.php?id='.$_POST["id"].'');
        }
        else 
        {
            $_SESSION['changeDataSuccess'] = 'Adres e-mail został zaktualizowany pomyślnie';
            $_SESSION['userEmail'] = $newEmail;
            header('Location: ../../frontend/views/editusers.php?id='.$_POST["id"].'');
        }
    }
?>