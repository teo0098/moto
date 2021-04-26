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
    <link rel="stylesheet" href="../styles/signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>

<body>
    <header class="sticky-top">
        <?php include "../templates/navigation.php" ?>
    </header>

    <?php
    include realpath(dirname(__FILE__) . '/../../backend/db/models/Offers.php');
    include realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
    include realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        echo '<div class="alert alert-danger" role="alert">
                            Nie udało się nawiązać połączenia z bazą
                        </div>';
    } else {
        $cars = Offers::getOffers(11, 0, $db->getConnection());
        $cars = mysqli_fetch_all($cars, MYSQLI_ASSOC);
    }
    ?>

    <div class="container" style="margin-top:20px; height:100%">
        <div class="row">
            <div class="col">
                <img src="../assets/insi.jpg" class="card-img-top" alt="...">
                <div style="margin-top: 3%; margin-left: 2%;">Data dodania </div>
            </div>
            <div class="col text-center">
                <h1 style="color: black; margin-top: 5%">Opel Insignia Sports Tourer GSi 2.0 BiTurbo 4x4</h1>
                <p style="color: black; margin-top:3%; font-size: 20px">Benzyna Rok Kilometry Silnik</p>
                <h3 style="color: red;">Cena</h3>
                <button type="button" class="btn btn-light" style="border: 1px solid black; height: auto; margin-top:3%">
                    <h3><i class="fas fa-phone-alt"></i>Wyświetl numer</h3>
                </button>
                <div class="row" style="margin-top: 3%;">
                    <div class="col">
                        <h4>Imię</h4>
                    </div>
                    <div class="col">
                        <h4>Lokalizacja</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 2%;">
            <h4 style="text-align: center;">Szczegóły</h4>
            <div class="col col-md-3 col-6" style="margin-top:3%">
                <div>Marka samochodu</div>
                <div style="margin-top: 1%">Model samochodu</div>
                <div style="margin-top: 1%">Rok produkcji</div>
                <div style="margin-top: 1%">Przebieg</div>
                <div style="margin-top: 1%">Rodzaj paliwa</div>
                <div style="margin-top: 1%">Moc</div>
                <div style="margin-top: 1%">Skrzynia biegów</div>
                <div style="margin-top: 1%">Napęd</div>
            </div>
            <div class="col col-md-3 col-6" style="margin-top:3%">
                <div>
                    <div>Audi</div>
                    <div style="margin-top: 1%">A5</div>
                    <div style="margin-top: 1%">2020</div>
                    <div style="margin-top: 1%">1200km</div>
                    <div style="margin-top: 1%">Benzyna</div>
                    <div style="margin-top: 1%">200km</div>
                    <div style="margin-top: 1%">Automatyczna</div>
                    <div style="margin-top: 1%">4x4</div>
                </div>
            </div>
            <div class="col col-md-3 col-6" style="margin-top:3%">
                <div>Pojemność skokowa</div>
                <div style="margin-top: 1%">Typ samochodu</div>
                <div style="margin-top: 1%">Kolor samochodu</div>
                <div style="margin-top: 1%">Liczba drzwi</div>
                <div style="margin-top: 1%">Liczba siedzeń</div>
                <div style="margin-top: 1%">Pochodzenie</div>
                <div style="margin-top: 1%">Stan</div>
                <div style="margin-top: 1%">Vin</div>
            </div>
            <div class="col col-md-3 col-6" style="margin-top:3%">
                <div>1969cm3</div>
                <div style="margin-top: 1%">Sedan</div>
                <div style="margin-top: 1%">Biały</div>
                <div style="margin-top: 1%">4/5</div>
                <div style="margin-top: 1%">5</div>
                <div style="margin-top: 1%">Niemcy</div>
                <div style="margin-top: 1%">Używany</div>
                <div style="margin-top: 1%">dsadasvs13489</div>
            </div>
        </div>

        <div style="margin-top: 2%;">
            <h4 style="text-align: center;">Opis</h4>
            <div style="margin-left: 10%; margin-right: 10%">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae tempora quis veniam maiores, odit quia aliquid error maxime voluptates. Nihil, quasi temporibus. Temporibus magni perferendis fugit ea vero! Officia iure repudiandae voluptates saepe animi ea quod quibusdam fugiat consectetur culpa accusantium eos exercitationem veritatis accusamus voluptas necessitatibus, dignissimos totam ipsam. Veritatis tempore quasi corporis dolore ab inventore. Quod alias doloribus expedita voluptate eaque vero velit similique modi blanditiis at tempora distinctio quo, quas, repudiandae corrupti vel maiores unde reprehenderit commodi magni molestiae, ratione atque rerum? Tenetur, tempora omnis aspernatur, consequuntur deserunt necessitatibus, maiores voluptates vitae earum qui incidunt. Veniam, hic.
            </div>
        </div>

    </div>

    <?php include "../templates/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>