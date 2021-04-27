<?php
session_start();
error_reporting(0);
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
    include "../templates/searchLong.php";
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
        $page = $_GET['page'];
        if(!isset($page)){
            $page=1;
        }
        $cars = Offers::getOffers(5, ($page*5)-5, $db->getConnection());
        $cars = mysqli_fetch_all($cars, MYSQLI_ASSOC);
    }
    ?>


    <div class="container d-flex justify-content-center" style="margin-top:20px; height:100%;">
        <div class="card" style="width: 100%;">

            <?php for ($i = 0; $i < count($cars); $i++) { ?>
                <div class="row" style="height: 250px; max-height:250px; margin-top:10px">
                    <div class="col col-md-4" style="display:flex; justify-content: flex-end">
                        <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[0]['id'] ?>">
                            <img style='height:250px; width:100%' src="<?php echo $cars[$i]["image_url"] ?> " alt="...">
                        </a>
                    </div>


                    <div class="col col-md-8">
                        <div class="card-body">
                            <h1 style="color: black;" class="card-title"><?php echo $cars[$i]["brand"] . ' ' . $cars[$i]["model"]; ?></h1>
                            <p style="color: black; font-size: 20px" class="card-text"><?php echo $cars[$i]["production_year"] . ' ' . $cars[$i]["run"] . 'km ' . $cars[$i]["fuel"] . ' ' . $cars[$i]["engine_capacity"] . 'cm<sup>3</sup>'; ?></p>
                            <p style="color: black; font-size: 20px" class="card-text"><?php echo $cars[$i]["name"] ?></p>
                            <h4 style="color: red;" class="card-title"><?php echo $cars[$i]["price"] . ' zł'; ?></h4>
                            <p style="color: black; font-size: 20px; text-align:end" class="card-text"><i class="fas fa-star"></i> Obserwuj</p>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>

    </div>

    <div class="container" style="text-align: center;">
        <nav aria-label="Page navigation example" style="margin-top: 100px;">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="./offers.php?page=1">1</a></li>
                <li class="page-item"><a class="page-link" href="./offers.php?page=2">2</a></li>
                <li class="page-item"><a class="page-link" href="./offers.php?page=3">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>