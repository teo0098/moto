<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/navigation.css">
    <link rel="stylesheet" href="../styles/global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>

<body>
    <?php include "../templates/navigation.php" ?>
    <?php
    include "../../backend/db/dbCredentials.php";
    include "../../backend/db/dbConnect.php";
    include "../../backend/classes/Registration.php";
    /* $db = new DB($host, $user, $password, $database);
    if ($db->connect()) echo "Polaczono";
    else echo 'ERROR';
    $reg = new Registration("Janusz", "Kowalski", "janek@wp.pl", "345897154", "haslo12345");
    $reg->register($db->getConnection());
    */
    ?>
    <div class="container-fluid" style="border: 10px solid yellow; background-image: url('../assets/cars-gora-prawa.jpg'); height: 400px; background-size: cover; background-position:center">
        <div class="row">
            <div class="col-md-2 col-12" style="border: 4px solid red">
                <div class="thumbnail">
                    <>
                </div>
            </div>
            <div class="col-md-4 col-12" style="border: 4px solid blue">
                Tutaj wyszukiwarka
            </div>
            <div class="col-md-6 col-12" style="border: 4px solid yellow">
                <div class="thumbnail">
                    <>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:10px; height:100%">
        <div class="row">
            <div class="col-md-6 col-12" style="border: 4px solid red; height: 600px">
                <div class="thumbnail"><img class="img-fluid">Duże zdjęcie oferty - na otomoto oferta dnia - może nowo dodane?</div>
            </div>
            <div class="col-md-6 col-12" style="background-color: blue; border:6px solid green">
                <div class="row" style="height: 50%;"> <!--Podział na % tzn. Div 1 40% width i height 20% potem nowy div 10% i 10% i drugi div 20% height 40% width-->
                    <div class="col-md-5 col-11" style="background-color: yellow; height:90%; width:45%">
                        <div class="thumbnail"><img class="img-fluid">Tutaj były wyróżnione na otomoto Może ostatnio dodane? Zdjęcie 1</div>
                    </div>          
                    <div style="height:10%; width:10%"></div>        
                    <div class="col-md-5 col-11" style="background-color: pink; height:90%; width:45%">
                        <div class="thumbnail"><img class="img-fluid">Zdjęcie 2</div>
                    </div>
                </div>
                <div class="row" style="height: 50%;">
                    <div class="col-md-6 col-12" style="background-color: yellow">
                        <div class="thumbnail"><img class="img-fluid">Zdjęcie 3</div>
                    </div>
                    <div class="col-md-6 col-12" style="background-color: pink">
                        <div class="thumbnail"><img class="img-fluid">Zdjęcie 4</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top:10px">
        <div class="row">
            <div class="col-md-12 col-12" style="background-color: pink; height: 200px">
                <div class="thumbnail"><img class="img-fluid">Duże zdjęcie oferty - na otomoto oferta dnia - może nowo dodane?</div>
            </div>

        </div>
    </div>

    <div class="container" style="margin-top:10px; height: auto; border: 4px solid green">
        <div class="row align-items-center content" style="height:100%;">
            <div class="col-12">
                <img src="../assets/1.jpg" class="img-thumbnail" style="height: auto; max-width: 100%">
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12 col-12" style="background-color: pink; height: 100px">
                <div>Kontakt z nami</div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>