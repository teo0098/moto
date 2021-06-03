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
        header('Location: ../../frontend/views/adminprofile.php');
    }
    else 
    {
        $oldAdminPass = $_POST['oldAdminPass'];
        $newAdminPass = $_POST['newAdminPass'];
        $updateAdmin = Admins::updatePassword($oldAdminPass, $newAdminPass, $db->getConnection());
        if (!$updateAdmin) 
        {
            $_SESSION['changeDataError'] = 'Nie udało sie zaktualizować hasła... Spróbuj ponownie później';
            header('Location: ../../frontend/views/adminprofile.php');
        }
        else if ($updateAdmin !== false && $updateAdmin !== true) 
        {
            $_SESSION['changeDataError'] = $updateAdmin;
            header('Location: ../../frontend/views/adminprofile.php');
        }
        else 
        {
            $_SESSION['changeDataSuccess'] = 'Hasło zostało zaktualizowane pomyślnie';
            header('Location: ../../frontend/views/adminprofile.php');
        }
    }
?>