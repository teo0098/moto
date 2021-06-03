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
    }
    else 
    {
        $id = $_POST['id'];
        $updateUser = Admins::deleteAccount($id, $db->getConnection());
        if (!$updateUser) {
            $_SESSION['changeDataError'] = 'Nie udało sie usunąć konta... Spróbuj ponownie później';
        }
        else if ($updateUser !== false && $updateUser !== true) {
            $_SESSION['changeDataError'] = $updateUser;
        }
    }
    header('Location: ../../frontend/views/userpanel.php');
?>