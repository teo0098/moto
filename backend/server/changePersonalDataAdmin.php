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
        $newAdminName = $_POST['newAdminName'];
        $newAdminSurname = $_POST['newAdminSurname'];
        $updateAdmin = Admins::updatePersonalData($newAdminName, $newAdminSurname, $db->getConnection());
        if (!$updateAdmin) 
        {
            $_SESSION['changeDataError'] = 'Nie udało sie zaktualizować danych osobowych... Spróbuj ponownie później';
            header('Location: ../../frontend/views/adminprofile.php');
        }
        else if ($updateAdmin !== false && $updateAdmin !== true) 
        {
            $_SESSION['changeDataError'] = $updateAdmin;
            header('Location: ../../frontend/views/adminprofile.php');
        }
        else {
            $_SESSION['changeDataSuccess'] = 'Dane osobowe zostały zaktualizowane pomyślnie';
            $_SESSION['adminName'] = $newAdminName;
            $_SESSION['adminSurname'] = $newAdminSurname;
            header('Location: ../../frontend/views/adminprofile.php');
        }
    }
?>