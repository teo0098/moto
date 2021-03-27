<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>

<header class="sticky-top">
    <?php include "../templates/navigation.php" ?>
</header>

<body>
    <div style='padding: 10px;'>
        <?php
            include realpath(dirname(__FILE__) . '/../../backend/db/models/Verifications.php');
            include realpath(dirname(__FILE__) . '/../../backend/db/models/Users.php');
            include realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
            include realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');

            $db = new DB($host, $user, $password, $database);
            if (!$db->connect() || !isset($_GET['hash'])) {
                echo '<div class="alert alert-danger" role="alert">
                            Nie udało się nawiązać połączenia z bazą
                        </div>';
            }
            else {
                $user = Verifications::getUserByHash($_GET['hash'], $db->getConnection());
                if (!$user) {
                    echo '<div class="alert alert-danger" role="alert">
                            Link aktywacyjny wygasł, prosimy zarejestrować się jeszcze raz
                        </div>';
                }
                else {
                    if (!Users::insertUser($user['name'], $user['surname'], $user['email'], $user['phone'], $user['password'], $db->getConnection())) {
                        echo '<div class="alert alert-danger" role="alert">
                                    Proces weryfikacji nie powiódł się, prosimy spróbować później
                                </div>';
                    }
                    else {
                        echo '<div class="alert alert-success" role="alert">
                                    Proces weryfikacji przebiegł pomyślnie, możesz się teraz zalogować na swoje konto
                                </div>';
                    }
                }
            }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>