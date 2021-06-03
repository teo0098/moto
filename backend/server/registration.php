<?php
    include "./CORS.php";
    require_once "../../vendor/autoload.php";
    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include "../classes/Registration.php";

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        $_SESSION['registerError'] = 'Błąd połączenia z bazą';
        header('Location: ../../frontend/views/signup.php');
    }
    else {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $registration = new Registration($name, $surname, $email, $phone, $password);
        $registration->register($db->getConnection());
    }
?>