<?php
    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include "../classes/Login.php";

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        echo 'Error with connecting to database';
    }
    else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login = new Login($email, $password);
        $login->login($db->getConnection());
    }
?>