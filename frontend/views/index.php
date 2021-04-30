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
                <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[0]['id'] ?>">
                    <div class="card">
                        <img class='container__img' src="<?php echo $cars[0]["image_url"] ?>" alt="...">
                        <div class="card-body">
                            <h3 style="color: black;" class="card-title"><?php echo $cars[0]["brand"] . ' ' . $cars[0]["model"]; ?></h3>
                            <p style="color: black;" class="card-text"><?php echo $cars[0]["production_year"] . ' ' . $cars[0]["run"] . 'km ' . $cars[0]["fuel"] . ' ' . $cars[0]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                            <h5 style="color: red;" class="card-title"><?php echo $cars[0]["price"] . ' zł'; ?></h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-12" style="background-color: white; ">
                <h3 class="card-title">Najnowsze oferty</h3>
                <div class="row2" style="width: auto; ">
                    <div class="row row-cols-4 row-cols-md-2 g-4 monill">
                        <?php
                            for ($i = 1; $i < 5; $i++) {?>
                                <div class="col">
                                    <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[$i]['id'] ?>">
                                        <div class="card">
                                            <img src="<?php echo $cars[$i]["image_url"] ?>" class="card-img-top-" alt="...">
                                            <div class="card-body">
                                                <h3 style="color: black;" class="card-title"><?php echo $cars[$i]["brand"] . ' ' . $cars[$i]["model"]; ?></h3>
                                                <p style="color: black;" class="card-text"><?php echo $cars[$i]["production_year"] . ' ' . $cars[$i]["run"] . 'km ' . $cars[$i]["fuel"] . ' ' . $cars[$i]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                                <h5 style="color: red;" class="card-title"><?php echo $cars[$i]["price"] . ' zł'; ?></h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>

            
        <div class="col-md-12 col-12">
            <div class="row2">
                <div class="row row-cols-6 row-cols-md-6 g-2 monill">
                    <?php
                        for ($i = 5; $i < 11; $i++) {?>
                            <div class="card">
                                <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[$i]['id'] ?>">
                                <img src="<?php echo $cars[$i]["image_url"] ?>" class="card-img-top--" alt="...">
                                    <div class="card-body">
                                        <h3 style="color: black;" class="card-title"><?php echo $cars[$i]["brand"] . ' ' . $cars[$i]["model"]; ?></h3>
                                        <p style="color: black;" class="card-text"><?php echo $cars[$i]["production_year"] . ' ' . $cars[$i]["run"] . 'km ' . $cars[$i]["fuel"] . ' ' . $cars[$i]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                        <h5 style="color: red;" class="card-title"><?php echo $cars[$i]["price"] . ' zł'; ?></h5>
                                    </div>
                                </a>
                            </div>
                    <?php } ?>
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