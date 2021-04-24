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
    <link rel="stylesheet" href="../styles/offer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>
<body>

    <header class="sticky-top">
        <?php include "../templates/navigation.php" ?>
    </header>

    <div class="container">
        <div class="row">
            <div class="col mt-2">
                <div id="carouselExampleControls" class="carousel slide imgslid h-auto" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../assets/golfvii1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/golfvii2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/golfvii3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev imgbutton" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next imgbutton" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
                <p class="mt-3"> Data dodania ogłoszenia </p>
            </div>
            <div class="col mt-5 ms-5">
                <h2 class="d-flex justify-content-center mt-5">Golf VII 2.0 TDI</h2>
                <div class="d-flex justify-content-center mt-2">
                    <span class="">Diesel</span>
                    <span class="ms-2">|</span>
                    <span class="ms-2">Rok</span>
                    <span class="ms-2">|</span>
                    <span class="ms-2">Kilometry</span>
                    <span class="ms-2">|</span>
                    <span class="ms-2">Silnik</span>
                </div>
                <div class="d-flex justify-content-left mt-2">
                    <h3 class="">Cena</h3>
                </div>
                <hr>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-lg btn-light border-dark btn-block center mt-3 mb-3" type="submit"><i class="fa fa-phone me-3"></i> Wyświetl numer </button>
                </div>
                <hr>
                <div class="d-flex justify-content-center mt-2">
                    <span class="me-5">Imię sprzedawcy</span>
                    <span class="ms-5">Lokalizacja</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <hr>
                <div class="d-flex justify-content-center">
                    <h4 class="d-flex justify-content-center"> Szczegóły </h4>
                </div>
                <div class="row d-flex justify-content-center mt-3 ms-5">
                    <div class="col text-black-50">
                        <p class="">Marka samochodu</p>
                        <p class="">Model samochodu</p>
                        <p class="">Rok produkcji</p>
                        <p class="">Przebieg</sp>
                        <p class="">Rodzaj paliwa</p>
                        <p class="">Moc</p>
                        <p class="">Skrzynia biegów</p>
                        <p class="">Napęd</p>
                    </div>
                    <div class="col me-5">
                        <p class="">Vw</p>
                        <p class="">Golf</p>
                        <p class="">2017</p>
                        <p class="">67023 km</sp>
                        <p class="">Diesel</p>
                        <p class="">170 km</p>
                        <p class="">Manualna</p>
                        <p class="">Przód</p>
                    </div>
                    <div class="col text-black-50 me-5">
                        <p class="">Pojemnośc skokowa</p>
                        <p class="">Typ samochodu</p>
                        <p class="">Kolor samochodu</p>
                        <p class="">Liczba drzwi</sp>
                        <p class="">Liczba siedzeń</p>
                        <p class="">Pochodzenie</p>
                        <p class="">Stan</p>
                        <p class="">VIN</p>
                    </div>
                    <div class="col me-5">
                        <p class="">1974 cm3</p>
                        <p class="">Hatchback</p>
                        <p class="">Czarny</p>
                        <p class="">4/5</sp>
                        <p class="">5</p>
                        <p class="">Niemcy</p>
                        <p class="">Używany</p>
                        <p class="">ASD123ASD34</p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <h4 class="d-flex justify-content-center"> Opis </h4>
                </div>
                <div class="row d-flex justify-content-center mt-3 ms-5">
                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> 
                </div>
            </div>
        </div>
    </div>

    <?php include "../templates/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>