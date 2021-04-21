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
    <link rel="stylesheet" href="../styles/watched.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>

<body>
    <header class="sticky-top">
        <?php include "../templates/navigation.php" ?>
    </header>
    <div class="container">
        <br>
        <div class="card_container shadow">
            <div class="material-button rounded-circle text-center mt-3 ms-auto me-auto">
                <span class="fa fa-star-o mt-4"> </span>
            </div>
            <h1 class="text-center mt-3">Moje obserwowane ogłoszenia</h1>
        </div>
        <div class="row" id="ads">
            
            <div class="col-md-4">
                <div class="card rounded">
                    <div class="card-image">
                        <span class="card-notify-badge">CENA</span>
                        <a href="../views/signin.php"><span class="card-notify-trash fa fa-trash"></span></a>
                        <img class="img-fluid" src="../assets/insi.jpg" alt="" />
                    </div>
                    <div class="card-image-overlay m-auto mt-1 mb-2">
                        <span class="card-detail-badge">Benzyna/Diesel</span>
                        <span class="card-detail-badge">Rok</span>
                        <span class="card-detail-badge">Kilometry</span>
                        <span class="card-detail-badge">Silnik</span>
                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-4">
                <div class="card rounded">
                    <div class="card-image">
                        <span class="card-notify-badge">CENA</span>
                        <a href="../views/signin.php"><span class="card-notify-trash fa fa-trash"></span></a>
                        <img class="img-fluid" src="../assets/insi.jpg" alt="" />
                    </div>
                    <div class="card-image-overlay m-auto mt-1 mb-2">
                        <span class="card-detail-badge">Benzyna/Diesel</span>
                        <span class="card-detail-badge">Rok</span>
                        <span class="card-detail-badge">Kilometry</span>
                        <span class="card-detail-badge">Silnik</span>
                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-4">
                <div class="card rounded">
                    <div class="card-image">
                        <span class="card-notify-badge">CENA</span>
                        <a href="../views/signin.php"><span class="card-notify-trash fa fa-trash"></span></a>
                        <img class="img-fluid" src="../assets/insi.jpg" alt="" />
                    </div>
                    <div class="card-image-overlay m-auto mt-1 mb-2">
                        <span class="card-detail-badge">Benzyna/Diesel</span>
                        <span class="card-detail-badge">Rok</span>
                        <span class="card-detail-badge">Kilometry</span>
                        <span class="card-detail-badge">Silnik</span>
                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-4">
                <div class="card rounded">
                    <div class="card-image">
                        <span class="card-notify-badge">CENA</span>
                        <a href="../views/signin.php"><span class="card-notify-trash fa fa-trash"></span></a>
                        <img class="img-fluid" src="../assets/insi.jpg" alt="" />
                    </div>
                    <div class="card-image-overlay m-auto mt-1 mb-2">
                        <span class="card-detail-badge">Benzyna/Diesel</span>
                        <span class="card-detail-badge">Rok</span>
                        <span class="card-detail-badge">Kilometry</span>
                        <span class="card-detail-badge">Silnik</span>
                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-4">
                <div class="card rounded">
                    <div class="card-image">
                        <span class="card-notify-badge">CENA</span>
                        <a href="../views/signin.php"><span class="card-notify-trash fa fa-trash"></span></a>
                        <img class="img-fluid" src="../assets/insi.jpg" alt="" />
                    </div>
                    <div class="card-image-overlay m-auto mt-1 mb-2">
                        <span class="card-detail-badge">Benzyna/Diesel</span>
                        <span class="card-detail-badge">Rok</span>
                        <span class="card-detail-badge">Kilometry</span>
                        <span class="card-detail-badge">Silnik</span>
                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-4">
                <div class="card rounded">
                    <div class="card-image">
                        <span class="card-notify-badge">CENA</span>
                        <a href="../views/signin.php"><span class="card-notify-trash fa fa-trash"></span></a>
                        <img class="img-fluid" src="../assets/insi.jpg" alt="" />
                    </div>
                    <div class="card-image-overlay m-auto mt-1 mb-2">
                        <span class="card-detail-badge">Benzyna/Diesel</span>
                        <span class="card-detail-badge">Rok</span>
                        <span class="card-detail-badge">Kilometry</span>
                        <span class="card-detail-badge">Silnik</span>
                    </div>
                </div>
                <br>
            </div>

        </div>
        
    </div>

    <?php include "../templates/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>