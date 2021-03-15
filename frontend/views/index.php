<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/navigation.css">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>

<body>
    <?php include "../templates/navigation.php" ?>
    <?php
    /*include "../../backend/db/dbCredentials.php";
    include "../../backend/db/dbConnect.php";
    include "../../backend/classes/Registration.php";
     $db = new DB($host, $user, $password, $database);
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
            <div class="col">
                <a style="text-decoration: none;" href="">
                <div class="card">
                    <img src="../assets/insi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h1 style="color: black;" class="card-title">Opel Insignia Sports Tourer GSi 2.0 BiTurbo 4x4</h1>
                        <p style="color: black;" class="card-text">2020 12750km Benzyna 1979cm3</p>
                        <h5 style="color: red;" class="card-title">159 900 zł</h5>
                    </div>
                </div></a>
            </div>
            <!--div class="col-md-6 col-12" style="border: 4px solid red; height: 600px">
                <div class="thumbnail"><img class="img-fluid">Duże zdjęcie oferty - na otomoto oferta dnia - może nowo dodane?</div>
            </div>-->
            <div class="col-md-6 col-12" style="background-color: white; ">
            <h3 class="card-title">Oferty wyróżnione</h3>
                <div class="row2" style="width: auto; "> <!--Podział na % tzn. Div 1 40% width i height 20% potem nowy div 10% i 10% i drugi div 20% height 40% width-->
                   <!-- <div class="col-md-5 col-11" style="background-color: yellow; height:90%; width:45%; margin-top:17.5px; margin-left:20px">
                        <div class="thumbnail"><img class="img-fluid">Tutaj były wyróżnione na otomoto Może ostatnio dodane? Zdjęcie 1</div>
                    </div>          
                    <div style="height:10%; width:10%"></div>        
                    <div class="col-md-5 col-11" style="background-color: pink; height:90%; width:45%; margin-top:17.5px; margin-left:-40px;">
                        <div class="thumbnail"><img class="img-fluid">Zdjęcie 2</div>
                    </div>-->
                    <div class="row row-cols-4 row-cols-md-2 g-4">
                        <div class="col">
                            <a style="text-decoration: none;" href="">
                            <div class="card">
                            <img src="../assets/audia5.jpg" class="card-img-top-" alt="...">
                                <div class="card-body">
                                    <h5 style="color: black;" class="card-title">Audi A5 2.0 TFSI QUATTRO</h5>
                                    <p style="color: black;" class="card-text">2020 12750km Benzyna 1979cm3</p>
                                    <h5 style="color: red;" class="card-title">200 000 zł</h5>
                                </div>
                            </div></a>
                        </div>
                        <div class="col">
                            <a style="text-decoration: none;" href="">
                            <div class="card">
                            <img src="../assets/bmwm3.jpg" class="card-img-top-" alt="...">
                                <div class="card-body">
                                    <h5 style="color: black;" class="card-title">BMW M3 Competition</h5>
                                    <p style="color: black;" class="card-text">2017 38650km Benzyna 2979cm3</p>
                                    <h5 style="color: red;" class="card-title">299 777 zł</h5>
                                </div>
                            </div></a>
                        </div>
                        <div class="col">
                            <a style="text-decoration: none;" href="">
                            <div class="card">
                            <img src="../assets/alfa2018.jpg" class="card-img-top-" alt="...">
                                <div class="card-body">
                                    <h5 style="color: black;" class="card-title">Alfa Romeo Veloce 2.0 </h5>
                                    <p style="color: black;" class="card-text">2018 121031km Benzyna 1979cm3</p>
                                    <h5 style="color: red;" class="card-title">179 900 zł</h5>
                                </div>
                            </div></a>
                        </div>
                        <div class="col">
                            <a style="text-decoration: none;" href="">
                            <div class="card">
                            <img src="../assets/volvo.jpg" class="card-img-top-" alt="...">
                                <div class="card-body">
                                    <h5 style="color: black;" class="card-title">Volvo V60</h5>
                                    <p style="color: black;" class="card-text">2017 142000km Diesel 1969cm3</p>
                                    <h5 style="color: red;" class="card-title">67 700 zł</h5>
                                </div>
                            </div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <!--<div class="col-md-6 col-12" style="background-color: yellow; height:90%; width:45%; margin-top:10px; margin-left:20px">
                        <div class="thumbnail" style="" ><img src="../assets/insi.jpg" style="max-height: 208px; flex-basis: 208px; width:100%;  border-top-left-radius: 4px; border-top-right-radius: 4px; flex: 2 1 0%;  object-fit:cover;" class="img-fluid">Zdjęcie 3</div>
                    </div>
                    <div style="height:10%; width:10%"></div>    
                    <div class="col-md-6 col-12" style="background-color: pink; height:90%; width:45%; margin-top:10px; margin-left:-40px;">
                        <div class="thumbnail"><img src="../assets/audia5.jpg" class="img-fluid"><p style="">Audi A5</p></div>
                    </div>-->
                    
    <div class="container" style="margin-top:10px">
        <div class="row">
            <div class="col-md-12 col-12" > <!--style="background-color: pink; height: 200px"-->
                <!--<div class="thumbnail"><img class="img-fluid">Duże zdjęcie oferty - na otomoto oferta dnia - może nowo dodane?</div>-->
                <div class="card-group">
                    <div class="card">
                    <a style="text-decoration: none;" href="">
                        <img src="../assets/golf7.jpg" class="card-img-top--" alt="...">
                        <div class="card-body">
                            <h5 style="color: black;" class="card-title">Volkswagen Golf VI</h5>
                            <p style="color: black;" class="card-text">2010 181665km Diesel 1598cm3</p>
                            <h5 style="color: red; " class="card-title">25 600 zł</h5>  
                        </div></a>                          
                    </div>
                    <div class="card">
                    <a style="text-decoration: none;" href="">
                        <img src="../assets/seati.jpg" class="card-img-top--" alt="...">
                        <div class="card-body">
                            <h5 style="color: black;" class="card-title">Seat Ibiza 1.4</h5>
                            <p style="color: black;" class="card-text">2008 145000km Benzyna 1390cm3</p>
                            <h5 style="color: red; " class="card-title">13 500 zł</h5>  
                        </div></a>                          
                    </div>
                    <div class="card">
                    <a style="text-decoration: none;" href="">
                        <img src="../assets/passatb5.jpg" class="card-img-top--" alt="...">
                        <div class="card-body">
                            <h5 style="color: black;" class="card-title">Volkswagen Passat 1.9</h5>
                            <p style="color: black;" class="card-text">1999 275000km Diesel 1896cm3</p>
                            <h5 style="color: red; " class="card-title">6 999 zł</h5>  
                        </div></a>                          
                    </div>
                    <div class="card">
                    <a style="text-decoration: none;" href="">
                        <img src="../assets/audia4.jpg" class="card-img-top--" alt="...">
                        <div class="card-body">
                            <h5 style="color: black;" class="card-title">Audi A4 2.0</h5>
                            <p style="color: black;" class="card-text">2017 118700km Diesel 1968cm3</p>
                            <h5 style="color: red; " class="card-title">134 800 zł</h5>  
                        </div></a>                          
                    </div>
                    <div class="card">
                    <a style="text-decoration: none;" href="">
                        <img src="../assets/fordedge.jpg" class="card-img-top--" alt="...">
                        <div class="card-body">
                            <h5 style="color: black;" class="card-title">Ford EDGE</h5>
                            <p style="color: black;" class="card-text">2018 32000km Benzyna 2000cm3</p>
                            <h5 style="color: red; " class="card-title">99 999 zł</h5>  
                        </div></a>                          
                    </div>
                    <div class="card">
                    <a style="text-decoration: none;" href="">
                        <img src="../assets/toyotarav4.jpg" class="card-img-top--" alt="...">
                        <div class="card-body">
                            <h5 style="color: black;" class="card-title">Toyota RAV4</h5>
                            <p style="color: black;" class="card-text">2018 24200km Benzyna 2498cm3</p>
                            <h5 style="color: red; " class="card-title">94 900 zł</h5>  
                        </div></a>                          
                    </div>
                </div>
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