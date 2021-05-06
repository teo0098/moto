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
    include "../templates/searchLong.php";
    ?>


    <div class="container d-flex justify-content-center" style="margin-top:20px; height:100%;">
        <div class="card" style="width: 100%;">

         <?php
    include_once realpath(dirname(__FILE__) . '/../../backend/db/models/Offers.php');
    include_once realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
    include_once realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        echo '<div class="alert alert-danger" role="alert">
                            Nie udało się nawiązać połączenia z bazą
                        </div>';
    } else {
        $page = $_GET['page'];
        if(!isset($page) || $_GET['page'] == null){
            $page=1;
        }
        $cars = Offers::getSearchedOffers(5, ($page*5)-5, $_GET, $db->getConnection());
        if (!$cars) {
            echo '<div data-test-id="error__box" class="alert alert-danger" role="alert">Brak ofert pojazdów</div>';
        }
        else {
            $cars = mysqli_fetch_all($cars, MYSQLI_ASSOC);
        }
    }
    ?>

            <?php if ($cars != false) { for ($i = 0; $i < count($cars); $i++) { ?>
                <div class="row" style="height: 250px; max-height:250px; margin-top:10px">
                    <div class="col col-md-4" style="display:flex; justify-content: flex-end">
                        <a style="text-decoration: none;" href="./offer.php?id=<?php echo $cars[$i]['id'] ?>">
                            <img class="img-offers" src="<?php echo $cars[$i]["image_url"] ?> " alt="...">
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
            <?php }} ?>
        </div>

    </div>

    <div class="container d-flex justify-content-center">
        <nav aria-label="Page navigation example" style="margin-top:10px;">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="./offers.php?brand=<?php echo $_GET['brand']; ?>&priceFrom=<?php echo $_GET['priceFrom']; ?>&priceTo=<?php echo $_GET['priceTo']; ?>&runFrom=<?php echo $_GET['runFrom']; ?>&runTo=<?php echo $_GET['runTo']; ?>&model=<?php echo $_GET['model']; ?>&production_year=<?php echo $_GET['production_year']; ?>&fuel=<?php echo $_GET['fuel']; ?>&power=<?php echo $_GET['power']; ?>&gearbox=<?php echo $_GET['gearbox']; ?>&drive=<?php echo $_GET['drive']; ?>&door=<?php echo $_GET['door']; ?>&seats=<?php echo $_GET['seats']; ?>&origin=<?php echo $_GET['origin']; ?>&state=<?php echo $_GET['state']; ?>&engine_capacity=<?php echo $_GET['engine_capacity']; ?>&type=<?php echo $_GET['type']; ?>&color=<?php echo $_GET['color']; ?>&province=<?php echo $_GET['province']; ?>&district=<?php echo $_GET['district']; ?>&city=<?php echo $_GET['city']; ?>&page=<?php
                      if($_GET['page']==1){ 
                        echo $_GET['page'];
                    } else{ 
                        echo $_GET['page']-1;
                    }  ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>

                <?php
                $offersAmount = Offers::getOffersAmount($_GET, $db->getConnection());
                $offersAmount = mysqli_fetch_assoc($offersAmount);               
                $count =  $offersAmount['offersAmount'];
                $count = ceil(intval($count)/5);                
                for($i=0; $i<$count; $i++){
                    echo ' <li class="page-item"><a class="page-link" href="./offers.php?brand='.$_GET['brand'].'&priceFrom='.$_GET['priceFrom'].'&priceTo='.$_GET['priceTo'].'&runFrom='.$_GET['runFrom'].'&runTo='.$_GET['runTo'].'&model='.$_GET['model'].'&production_year='.$_GET['production_year'].'&fuel='.$_GET['fuel'].'&power='.$_GET['power'].'&gearbox='.$_GET['gearbox'].'&drive='.$_GET['drive'].'&door='.$_GET['door'].'&seats='.$_GET['seats'].'&origin='.$_GET['origin'].'&state='.$_GET['state'].'&engine_capacity='.$_GET['engine_capacity'].'&type='.$_GET['type'].'&color='.$_GET['color'].'&province='.$_GET['province'].'&district='.$_GET['district'].'&city='.$_GET['city'].'&page='.($i+1).'">'.($i+1).'</a></li>';
                }
                
                ?>
               
                <li class="page-item">
                    <a class="page-link" href="./offers.php?brand=<?php echo $_GET['brand']; ?>&priceFrom=<?php echo $_GET['priceFrom']; ?>&priceTo=<?php echo $_GET['priceTo']; ?>&runFrom=<?php echo $_GET['runFrom']; ?>&runTo=<?php echo $_GET['runTo']; ?>&model=<?php echo $_GET['model']; ?>&production_year=<?php echo $_GET['production_year']; ?>&fuel=<?php echo $_GET['fuel']; ?>&power=<?php echo $_GET['power']; ?>&gearbox=<?php echo $_GET['gearbox']; ?>&drive=<?php echo $_GET['drive']; ?>&door=<?php echo $_GET['door']; ?>&seats=<?php echo $_GET['seats']; ?>&origin=<?php echo $_GET['origin']; ?>&state=<?php echo $_GET['state']; ?>&engine_capacity=<?php echo $_GET['engine_capacity']; ?>&type=<?php echo $_GET['type']; ?>&color=<?php echo $_GET['color']; ?>&province=<?php echo $_GET['province']; ?>&district=<?php echo $_GET['district']; ?>&city=<?php echo $_GET['city']; ?>&page=<?php 
                    if($_GET['page']==$count){ 
                        echo $_GET['page'];
                    } else{ 
                        echo $_GET['page']+1;
                    } 
                     ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>


    <?php include "../templates/footer.php" ?>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>