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
        $newPhoneAdmin = $_POST['newPhoneAdmin'];
        $updateAdmin = Admins::updatePhone($newPhoneAdmin, $db->getConnection());
        if (!$updateAdmin) 
        {
            $_SESSION['changeDataError'] = 'Nie udało sie zaktualizować numeru telefonu... Spróbuj ponownie później';
            header('Location: ../../frontend/views/adminprofile.php');
        }
        else if ($updateAdmin !== false && $updateAdmin !== true) 
        {
            $_SESSION['changeDataError'] = $updateAdmin;
            header('Location: ../../frontend/views/adminprofile.php');
        }
        else 
        {
            $_SESSION['changeDataSuccess'] = 'Numer telefonu został zaktualizowany pomyślnie';
            $_SESSION['adminPhone'] = $newPhoneAdmin;
            header('Location: ../../frontend/views/adminprofile.php');
        }
    }
?>