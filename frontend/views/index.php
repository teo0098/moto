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
                        <img src="<?php echo $cars[0]["image_url"] ?>" alt="...">
                        <div class="card-body">
                            <h3 style="color: black;" class="card-title"><?php echo $cars[0]["brand"] . ' ' . $cars[0]["model"]; ?></h3>
                            <p style="color: black;" class="card-text"><?php echo $cars[0]["production_year"] . ' ' . $cars[0]["run"] . 'km ' . $cars[0]["fuel"] . ' ' . $cars[0]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                            <h5 style="color: red;" class="card-title"><?php echo $cars[0]["price"] . ' zł'; ?></h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-12" style="background-color: white; ">
                <h3 class="card-title">Oferty wyróżnione</h3>
                <div class="row2" style="width: auto; ">
                    <div class="row row-cols-4 row-cols-md-2 g-4">
                        <div class="col">
                            <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[1]['id'] ?>">
                                <div class="card">
                                    <img src="<?php echo $cars[1]["image_url"] ?>" class="card-img-top-" alt="...">
                                    <div class="card-body">
                                        <h3 style="color: black;" class="card-title"><?php echo $cars[1]["brand"] . ' ' . $cars[1]["model"]; ?></h3>
                                        <p style="color: black;" class="card-text"><?php echo $cars[1]["production_year"] . ' ' . $cars[1]["run"] . 'km ' . $cars[1]["fuel"] . ' ' . $cars[1]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                        <h5 style="color: red;" class="card-title"><?php echo $cars[1]["price"] . ' zł'; ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[2]['id'] ?>">
                                <div class="card">
                                    <img src="<?php echo $cars[2]["image_url"] ?>" class="card-img-top-" alt="...">
                                    <div class="card-body">
                                        <h3 style="color: black;" class="card-title"><?php echo $cars[2]["brand"] . ' ' . $cars[2]["model"]; ?></h3>
                                        <p style="color: black;" class="card-text"><?php echo $cars[2]["production_year"] . ' ' . $cars[2]["run"] . 'km ' . $cars[2]["fuel"] . ' ' . $cars[2]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                        <h5 style="color: red;" class="card-title"><?php echo $cars[2]["price"] . ' zł'; ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[3]['id'] ?>">
                                <div class="card">
                                    <img src="<?php echo $cars[3]["image_url"] ?>" class="card-img-top--" alt="...">
                                    <div class="card-body">
                                        <h3 style="color: black;" class="card-title"><?php echo $cars[3]["brand"] . ' ' . $cars[3]["model"]; ?></h3>
                                        <p style="color: black;" class="card-text"><?php echo $cars[3]["production_year"] . ' ' . $cars[3]["run"] . 'km ' . $cars[3]["fuel"] . ' ' . $cars[3]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                        <h5 style="color: red;" class="card-title"><?php echo $cars[3]["price"] . ' zł'; ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[4]['id'] ?>">
                                <div class="card">
                                    <img src="<?php echo $cars[4]["image_url"] ?>" class="card-img-top--" alt="...">
                                    <div class="card-body">
                                        <h3 style="color: black;" class="card-title"><?php echo $cars[4]["brand"] . ' ' . $cars[4]["model"]; ?></h3>
                                        <p style="color: black;" class="card-text"><?php echo $cars[4]["production_year"] . ' ' . $cars[4]["run"] . 'km ' . $cars[4]["fuel"] . ' ' . $cars[4]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                        <h5 style="color: red;" class="card-title"><?php echo $cars[4]["price"] . ' zł'; ?></h5>
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
                            <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[5]['id'] ?>">
                                <img src="<?php echo $cars[5]["image_url"] ?>" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h3 style="color: black;" class="card-title"><?php echo $cars[5]["brand"] . ' ' . $cars[5]["model"]; ?></h3>
                                    <p style="color: black;" class="card-text"><?php echo $cars[5]["production_year"] . ' ' . $cars[5]["run"] . 'km ' . $cars[5]["fuel"] . ' ' . $cars[5]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                    <h5 style="color: red;" class="card-title"><?php echo $cars[5]["price"] . ' zł'; ?></h5>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[6]['id'] ?>">
                                <img src="<?php echo $cars[6]["image_url"] ?>" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h3 style="color: black;" class="card-title"><?php echo $cars[6]["brand"] . ' ' . $cars[6]["model"]; ?></h3>
                                    <p style="color: black;" class="card-text"><?php echo $cars[6]["production_year"] . ' ' . $cars[6]["run"] . 'km ' . $cars[6]["fuel"] . ' ' . $cars[6]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                    <h5 style="color: red;" class="card-title"><?php echo $cars[6]["price"] . ' zł'; ?></h5>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[7]['id'] ?>">
                                <img src="<?php echo $cars[7]["image_url"] ?>" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h3 style="color: black;" class="card-title"><?php echo $cars[7]["brand"] . ' ' . $cars[7]["model"]; ?></h3>
                                    <p style="color: black;" class="card-text"><?php echo $cars[7]["production_year"] . ' ' . $cars[7]["run"] . 'km ' . $cars[7]["fuel"] . ' ' . $cars[7]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                    <h5 style="color: red;" class="card-title"><?php echo $cars[7]["price"] . ' zł'; ?></h5>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[8]['id'] ?>">
                                <img src="<?php echo $cars[8]["image_url"] ?>" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h3 style="color: black;" class="card-title"><?php echo $cars[8]["brand"] . ' ' . $cars[8]["model"]; ?></h3>
                                    <p style="color: black;" class="card-text"><?php echo $cars[8]["production_year"] . ' ' . $cars[8]["run"] . 'km ' . $cars[8]["fuel"] . ' ' . $cars[8]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                    <h5 style="color: red;" class="card-title"><?php echo $cars[8]["price"] . ' zł'; ?></h5>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[9]['id'] ?>">
                                <img src="<?php echo $cars[9]["image_url"] ?>" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h3 style="color: black;" class="card-title"><?php echo $cars[9]["brand"] . ' ' . $cars[9]["model"]; ?></h3>
                                    <p style="color: black;" class="card-text"><?php echo $cars[9]["production_year"] . ' ' . $cars[9]["run"] . 'km ' . $cars[9]["fuel"] . ' ' . $cars[9]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                    <h5 style="color: red;" class="card-title"><?php echo $cars[9]["price"] . ' zł'; ?></h5>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[10]['id'] ?>">
                                <img src="<?php echo $cars[10]["image_url"] ?>" class="card-img-top--" alt="...">
                                <div class="card-body">
                                    <h3 style="color: black;" class="card-title"><?php echo $cars[10]["brand"] . ' ' . $cars[10]["model"]; ?></h3>
                                    <p style="color: black;" class="card-text"><?php echo $cars[10]["production_year"] . ' ' . $cars[10]["run"] . 'km ' . $cars[10]["fuel"] . ' ' . $cars[10]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                                    <h5 style="color: red;" class="card-title"><?php echo $cars[10]["price"] . ' zł'; ?></h5>
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