<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <title>Moto.pl</title>
</head>

<body>
    <header class="sticky-top">
        <?php include "../templates/navigation.php" ?>
    </header>
    <div class="container">
        <br>
        <br>
        <center>
            <h2 class="heading">Formularz zgłoszeniowy</h2>
        </center>
        <?php
                if (isset($_SESSION["Submission"])) {                    
                    echo "<h3 class='text-center' style='color: green'>" . $_SESSION['Submission'] . "</h3>";
                    $_SESSION["Submission"]=null;
                }
                ?>
        <br>
        <div class="row">
            <div class="col-md-6">
                <form action="../../backend/server/UserSubmissions.php" method="POST">
                    <h4 class="">Podaj temat zgłoszenia</h4>
                    <input class="form-control" type="Text" name="subject" id="" placeholder="np. Problem z logowaniem się">
                    <br>
                    <h4 class="">Podaj nazwę użytkownika</h4>
                    <input class="form-control" type="Text" name="username" id="" placeholder="Jarek45">
                    <br>
                    <h4 class="">Podaj adres e-mail</h4>
                    <input class="form-control" type="Email" name="email" id="" placeholder="serwismoto@gmail.com">
                    <br>
                    <h4 class="">Opis posiadanego problemu</h4>
                    <textarea class="form-control" name="problemDesc" id="" rows="6" placeholder="Nie dostaje e-maila potwierdzającego rejestracje"></textarea>
                    <br>
                    <center>
                        <input type="submit" class="btn btn-success text-center" value="Wyślij Zgłoszenie">
                    </center>
                </form>
            </div>

            <div class="col-md-1"></div>
            <div class="col-md-5">
                <br>
                <br>
                <h4 class="text-center">Obsługa klienta</h4>
                <p class="text-center mt-4">Numer kontaktowy: 123456789</p>
                <p class="text-center">Adres zgłoszeniowy: serwismoto@gmail.com</p>              
            </div>
        </div>

    </div>
    <div style="margin-top: 170px;"></div>

    <?php include "../templates/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>