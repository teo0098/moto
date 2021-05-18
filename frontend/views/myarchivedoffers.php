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
                <span class="fa fa-car mt-4"> </span>
            </div>
            <h1 class="text-center mt-3">Moje zarchiwizowane ogłoszenia</h1>
        </div>
        <?php
            include_once realpath(dirname(__FILE__) . '/../../backend/db/models/Users.php');
            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');

            $db = new DB($host, $user, $password, $database);
            if (!$db->connect()) 
            {
                echo '<div class="alert alert-danger" role="alert">
                        Nie udało się nawiązać połączenia z bazą
                    </div>';
            } 
            else 
            {
                $page = $_GET['page'];
                if(!isset($page) || $_GET['page'] == null)
                {
                    $page=1;
                }
                $cars = Users::getArchivedOffers(9, ($page*9)-9, $db->getConnection());
                $carsAmount = Users::getArchivedOffersAmount($db->getConnection());
                if (!$cars || !$carsAmount) 
                {
                    echo '<div data-test-id="error__box" class="alert alert-danger" role="alert">Brak zarchiwizowanych pojazdów</div>';
                }
                else 
                {
                    $carsAmount = mysqli_fetch_assoc($carsAmount);
                    $count = $carsAmount['offersAmount'];
                    $count = intval($count);   
                    if ($count < 1) 
                    {
                        echo '<div data-test-id="error__box" class="alert alert-danger" role="alert">Brak zarchiwizowanych pojazdów</div>';
                    }
                    else 
                    {
                        $cars = mysqli_fetch_all($cars, MYSQLI_ASSOC);
                    }
                }
            }
        ?>

        <?php
            if (isset($_SESSION['offerDeleteError'])) 
            {
                echo '<div class="alert alert-danger" role="alert">
                                    ' . $_SESSION['offerDeleteError'] . '
                                </div>';
            }
            $_SESSION['offerDeleteError'] = null;
        ?>


        <div class="row mt-2" id="ads">  
            <?php if ($cars != false && $carsAmount != false) { for ($i = 0; $i < count($cars); $i++) { ?>
                <div class="col-md-4 mt-4">          
                    <a href="./offer.php?id=<?php echo $cars[$i]['id']; ?>">
                        <div class="card rounded">
                            <div class="card-image">
                                <object><a data-test-id="offer<?php echo $i; ?>" href="./myoffer.php?id=<?php echo $cars[$i]['id']; ?>"><span class="card-notify-edit fa fa-edit"></span></a></object>
                                <object>
                                    <form style=" height:0px;" method='POST' action="../../backend/server/offers.php?method=DELETE&id=<?php echo $cars[$i]['id']; ?>&page=<?php echo $_GET['page']; ?>">
                                        <button type="submit"><span class="card-notify-trash fa fa-trash"></span></button>
                                    </form>
                                </object>
                                <img class="img-fluid" src="<?php echo $cars[$i]['image_url']; ?>" alt="offer" />
                            </div>
                            <div class="card-image-overlay m-auto mt-2 mb-4">
                                <span class="card-detail-badge"><?php echo $cars[$i]['fuel']; ?></span>
                                <span class="card-detail-badge"><?php echo $cars[$i]['production_year']; ?></span>
                                <span class="card-detail-badge"><?php echo $cars[$i]['run']; ?> km</span>
                                <span class="card-detail-badge"><?php echo $cars[$i]['engine_capacity']; ?> cm<sup>3</sup></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php }} ?>
        </div>
        
    </div>

    <div class="container d-flex justify-content-center">
        <nav aria-label="Page navigation example" style="margin-top:10px;">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="./myarchivedoffers.php?page=<?php
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
                if ($cars != false && $carsAmount != false) {
                    $count = ceil(intval($count)/9);                
                    for($i=0; $i<$count; $i++){
                        echo ' <li class="page-item"><a class="page-link" href="./myarchivedoffers.php?page='.($i+1).'">'.($i+1).'</a></li>';
                    }
                }
                
                ?>
               
                <li class="page-item">
                    <a class="page-link" href="./myarchivedoffers.php?page=<?php 
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