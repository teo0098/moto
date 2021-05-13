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

    <?php
    include realpath(dirname(__FILE__) . '/../../backend/db/models/Offers.php');
    include realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
    include realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');
    include realpath(dirname(__FILE__) . '/../../backend/db/models/CarImages.php');



    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        echo '<div class="alert alert-danger" role="alert">
                            Nie udało się nawiązać połączenia z bazą
                        </div>';
    } else {
        $car = Offers::getOfferById($_GET['id'], $db->getConnection());
        if(!$car)
        {
            echo '<div class="alert alert-danger" role="alert">
                            Oferta została zablokowana
                        </div>';
            exit(0);
        }
        $car = mysqli_fetch_assoc($car);
        $carImages = CarImages::getCarImages($car["car_id"], $db->getConnection());
        $carImages = mysqli_fetch_all($carImages, MYSQLI_ASSOC);       
    }
    ?>


    <div class="container">
        <div class="row">
            <div class="col mt-2 col-md-6 col-12 d-flex justify-content-center">
                <div id="carouselExampleControls" class="carousel slide imgslid h-auto" data-bs-ride="carousel">
                    <div class="carousel-inner" style="max-height: 400px; height:400px">
                        <?php 
                            for($i=0; $i<count($carImages); $i++){
                                $image=$carImages[$i]['url'];
                                if($i==0){
                                    echo '<div class="carousel-item active">
                                    <img src="'.$image.'" class="d-block w-100" alt="..."/>
                                </div>';  
                                }else{
                                    echo '<div class="carousel-item">
                                <img src="'.$image.'" class="d-block w-100" alt="..."/>
                            </div>';  
                                }
                                  
                            }
                        ?>                                                                                                    
                            
                        
                        
                    </div>

                 
                    <button class="carousel-control-prev imgbutton" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next imgbutton" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                    <p class="mt-3"> Data dodania ogłoszenia: <?php echo $car["date"] ?> </p>
                </div>
            </div>
            
            <div class="col mt-5 ms-5">
                <h2 class="d-flex justify-content-center mt-5"><?php echo $car["brand"] . ' ' . $car["model"] ?></h2>
                <div class="d-flex justify-content-center mt-2">
                    <span class=""><?php echo $car["fuel"] ?></span>
                    <span class="ms-2">|</span>
                    <span class="ms-2"><?php echo $car["production_year"] ?></span>
                    <span class="ms-2">|</span>
                    <span class="ms-2"><?php echo $car["run"] . ' km'; ?></span>
                    <span class="ms-2">|</span>
                    <span class="ms-2"><?php echo $car["engine_capacity"] . 'cm<sup>3</sup>'; ?></span>
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <h3><?php echo 'Cena: ' . $car["price"] . ' zł'; ?></h3>
                </div>
                <hr>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-lg btn-light border-dark btn-block center mt-3 mb-3" type="submit"><i class="fa fa-phone me-3"></i> Wyświetl numer </button>
                </div>
                <hr>
                <div class="d-flex justify-content-center mt-2">
                    <span class="me-5"><?php echo $car["name"] . ' ' . $car["surname"] ?></span>
                    <span class="ms-5"><?php echo $car["province"] ?></span>
                </div>
            </div>
        </div>

        <hr>

        <h4 class="d-flex justify-content-center mt-5">Szczegóły</h4>
        <div class="container d-flex justify-content-center">
            <div class="row col-md-8" style="margin-left: 5%; margin-right: 5%">
                <div class="col col-md-3 col-6 mt-3 text-black-50">
                    <p class="">Marka samochodu</p>
                    <p class="">Model samochodu</p>
                    <p class="">Rok produkcji</p>
                    <p class="">Przebieg</sp>
                    <p class="">Rodzaj paliwa</p>
                    <p class="">Moc</p>
                    <p class="">Skrzynia biegów</p>
                    <p class="">Napęd</p>
                </div>
                <div class="col col-md-3 col-6 mt-3">
                    <p class=""><?php echo $car["brand"] ?></p>
                    <p class=""><?php echo $car["model"] ?></p>
                    <p class=""><?php echo $car["production_year"] ?></p>
                    <p class=""><?php echo $car["run"] ?></sp>
                    <p class=""><?php echo $car["fuel"] ?></p>
                    <p class=""><?php echo $car["power"] ?></p>
                    <p class=""><?php echo $car["gearbox"] ?></p>
                    <p class=""><?php echo $car["drive"] ?></p>
                </div>
                <div class="col col-md-3 col-6 mt-3 text-black-50">
                    <p class="">Pojemnośc skokowa</p>
                    <p class="">Typ samochodu</p>
                    <p class="">Kolor samochodu</p>
                    <p class="">Liczba drzwi</sp>
                    <p class="">Liczba siedzeń</p>
                    <p class="">Pochodzenie</p>
                    <p class="">Stan</p>
                    <p class="">VIN</p>
                </div>
                <div class="col col-md-3 col-6 mt-3">
                    <p class=""><?php echo $car["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                    <p class=""><?php echo $car["type"] ?></p>
                    <p class=""><?php echo $car["color"] ?></p>
                    <p class=""><?php echo $car["door"] ?></sp>
                    <p class=""><?php echo $car["seats"] ?></p>
                    <p class=""><?php echo $car["origin"] ?></p>
                    <p class=""><?php echo $car["state"] ?></p>
                    <p class=""><?php echo $car["VIN"] ?></p>
                </div>
            </div>
        </div>
        <hr>
        <h4 class="d-flex justify-content-center" style="margin-top: 3%;">Opis</h4>
        <div class="justify-content-center px-5 text-break">
            <p><?php echo $car["description"] ?></p>
        </div>


    </div>

    <?php include "../templates/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>