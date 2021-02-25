<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/navigation.css">
    <link rel="stylesheet" href="../styles/global.css">
    <title>Moto.pl</title>
</head>
<body>
    <?php include "../templates/navigation.php" ?>
    <?php
        include "../../backend/db/dbCredentials.php";
        include "../../backend/db/dbConnect.php";
        $db = new DB($host, $user, $password, $database);
        if ($db->connect()) echo "Polaczono";
        else echo 'ERROR';
    ?>
</body>
</html>