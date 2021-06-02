<?php
    session_start();

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
        $newEmailAdmin = $_POST['newEmailAdmin'];
        $updateAdmin = Admins::updateEmail($newEmailAdmin, $db->getConnection());
        if (!$updateAdmin) 
        {
            $_SESSION['changeDataError'] = 'Nie udało sie zaktualizować adresu e-mail... Spróbuj ponownie później';
            header('Location: ../../frontend/views/adminprofile.php');
        }
        else if ($updateAdmin !== false && $updateAdmin !== true) 
        {
            $_SESSION['changeDataError'] = $updateAdmin;
            header('Location: ../../frontend/views/adminprofile.php');
        }
        else 
        {
            $_SESSION['changeDataSuccess'] = 'Adres e-mail został zaktualizowany pomyślnie';
            $_SESSION['adminEmail'] = $newEmailAdmin;
            header('Location: ../../frontend/views/adminprofile.php');
        }
    }
?>