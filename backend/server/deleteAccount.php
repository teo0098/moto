<?php
    session_start();

    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include realpath(dirname(__FILE__) . '/../db/models/Users.php');

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        $_SESSION['changeDataError'] = 'Błąd połączenia z bazą';
        header('Location: ../../frontend/views/userprofile.php');
    }
    else {
        $password = $_POST['password'];
        $updateUser = Users::deleteAccount($password, $db->getConnection());
        if (!$updateUser) {
            $_SESSION['changeDataError'] = 'Nie udało sie usunąć konta... Spróbuj ponownie później';
            header('Location: ../../frontend/views/userprofile.php');
        }
        else if ($updateUser !== false && $updateUser !== true) {
            $_SESSION['changeDataError'] = $updateUser;
            header('Location: ../../frontend/views/userprofile.php');
        }
        else {
            session_destroy();
            header('Location: ../../frontend/views/signin.php');
        }
    }
?>