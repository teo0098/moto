<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>

<body>
    <header class="sticky-top">
        <?php include "../templates/navigation.php" ?>
    </header>
    <?php
    include "../templates/searchShort.php";
    ?>

    <div class="container" style="margin-top:20px; height:100%">
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
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-12" style="background-color: white; ">
                <h3 class="card-title">Oferty wyróżnione</h3>
                <div class="row2" style="width: auto; ">
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
                                </div>
                            </a>
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
                                </div>
                            </a>
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
                                </div>
                            </a>
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
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:10px">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card-group">
                        <div class="card">
                            <a style="text-decoration: none;" href="">
                                <img src="../assets/golf7.jpg" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h5 style="color: black;" class="card-title">Volkswagen Golf VI</h5>
                                    <p style="color: black;" class="card-text">2010 181665km Diesel 1598cm3</p>
                                    <h5 style="color: red; " class="card-title">25 600 zł</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a style="text-decoration: none;" href="">
                                <img src="../assets/seati.jpg" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h5 style="color: black;" class="card-title">Seat Ibiza 1.4</h5>
                                    <p style="color: black;" class="card-text">2008 145000km Benzyna 1390cm3</p>
                                    <h5 style="color: red; " class="card-title">13 500 zł</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a style="text-decoration: none;" href="">
                                <img src="../assets/passatb5.jpg" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h5 style="color: black;" class="card-title">Volkswagen Passat 1.9</h5>
                                    <p style="color: black;" class="card-text">1999 275000km Diesel 1896cm3</p>
                                    <h5 style="color: red; " class="card-title">6 999 zł</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a style="text-decoration: none;" href="">
                                <img src="../assets/audia4.jpg" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h5 style="color: black;" class="card-title">Audi A4 2.0</h5>
                                    <p style="color: black;" class="card-text">2017 118700km Diesel 1968cm3</p>
                                    <h5 style="color: red; " class="card-title">134 800 zł</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a style="text-decoration: none;" href="">
                                <img src="../assets/fordedge.jpg" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h5 style="color: black;" class="card-title">Ford EDGE</h5>
                                    <p style="color: black;" class="card-text">2018 32000km Benzyna 2000cm3</p>
                                    <h5 style="color: red; " class="card-title">99 999 zł</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a style="text-decoration: none;" href="">
                                <img src="../assets/toyotarav4.jpg" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h5 style="color: black;" class="card-title">Toyota RAV4</h5>
                                    <p style="color: black;" class="card-text">2018 24200km Benzyna 2498cm3</p>
                                    <h5 style="color: red; " class="card-title">94 900 zł</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:10px; height: auto">
            <div class="row align-items-center content" style="height:100%;">
                <div class="col-12">
                    <img src="../assets/1.jpg" class="img-thumbnail" style="height: auto; max-width: 100%">
                </div>
            </div>
        </div>

        <?php include "../templates/footer.php" ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>