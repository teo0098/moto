<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/global.css">
  <link rel="stylesheet" href="../styles/signin.css">
  <link rel="stylesheet" href="../styles/editOffer.css">
  <title>Moto.pl</title>
</head>

<body>
  <header class="sticky-top">
    <?php 
      include "../templates/navigation.php";
      include realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
      include realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');
      include realpath(dirname(__FILE__) . '/../../backend/db/models/CarFuels.php');
      include realpath(dirname(__FILE__) . '/../../backend/db/models/Gearboxes.php');
      include realpath(dirname(__FILE__) . '/../../backend/db/models/CarDrives.php');
      include realpath(dirname(__FILE__) . '/../../backend/db/models/Provinces.php');
      include realpath(dirname(__FILE__) . '/../../backend/db/models/CarTypes.php');
      include realpath(dirname(__FILE__) . '/../../backend/db/models/CarStates.php');
      include realpath(dirname(__FILE__) . '/../../backend/db/models/Users.php');
      include realpath(dirname(__FILE__) . '/../../backend/db/models/Transactions.php');

      $db = new DB($host, $user, $password, $database);
      if (!$db->connect()) {
          echo '<div class="alert alert-danger" role="alert">
                              Nie udało się nawiązać połączenia z bazą
                          </div>';
      } else {
          $carFuels = CarFuels::getFuels($db->getConnection());
          $carFuels = mysqli_fetch_all($carFuels, MYSQLI_ASSOC);  
          $gearboxes = Gearboxes::getGearboxes($db->getConnection());
          $gearboxes = mysqli_fetch_all($gearboxes, MYSQLI_ASSOC);  
          $carDrives = CarDrives::getDrives($db->getConnection());
          $carDrives = mysqli_fetch_all($carDrives, MYSQLI_ASSOC);  
          $provinces = Provinces::getProvinces($db->getConnection());
          $provinces = mysqli_fetch_all($provinces, MYSQLI_ASSOC);  
          $carTypes = CarTypes::getTypes($db->getConnection());
          $carTypes = mysqli_fetch_all($carTypes, MYSQLI_ASSOC);  
          $carStates = CarStates::getStates($db->getConnection());
          $carStates = mysqli_fetch_all($carStates, MYSQLI_ASSOC);
          $offer = Users::getOfferById($_GET['id'], $db->getConnection());
          if (!$offer) exit(0);
          $offer = mysqli_fetch_assoc($offer);
      }
    ?>
  </header>
  <div class="container spanMasterEdit">
    <div class="row">
      <div class="card" style="width:1000px">
      <?php
        if (isset($_SESSION['offerEditError'])) {
            echo '<div data-test-id="offerEditError" class="alert alert-danger" role="alert">
                                ' . $_SESSION['offerEditError'] . '
                            </div>';
        } else if (isset($_SESSION['offerEditSuccess'])) {
            echo '<div data-test-id="offerEditSuccess" class="alert alert-success" role="alert">
                                ' . $_SESSION['offerEditSuccess'] . '
                            </div>';
        }
        $_SESSION['offerEditError'] = null;
        $_SESSION['offerEditSuccess'] = null;
        ?>
        <article class="card-body" style="max-width: 1200px;">
          <h4 class="card-title mt-3 text-center">Edytuj swoją ofertę</h4>
          <form class="form-postOffer" method='POST' action="../../backend/server/offers.php?method=PUT&id=<?php echo $offer['id']; ?>">           
            <div class="row" style="margin-top: 20px;">
              <div class="col-md-6 col-12">
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Marka samochodu </span>
                  </div>
                  <input value="<?php echo $offer['brand']; ?>" name="brand" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Model samochodu </span>
                  </div>
                  <input value="<?php echo $offer['model']; ?>" name="model" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rok produkcji</span>
                  </div>
                  <input value="<?php echo $offer['production_year']; ?>" name="production_year" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Przebieg</span>
                  </div>
                  <input value="<?php echo $offer['run']; ?>" name="run" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rodzaj paliwa</span>
                  </div>
                  <select name="fuel" class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <?php
                      for ($i = 0; $i < count($carFuels); $i++) {
                          if ($offer['fuel'] == $carFuels[$i]['fuel']) {
                            echo '<option selected value="'.$carFuels[$i]['id'].'">'.$carFuels[$i]['fuel'].'</option>';
                          }
                          else {
                            echo '<option value="'.$carFuels[$i]['id'].'">'.$carFuels[$i]['fuel'].'</option>';
                          }
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Moc</span>
                  </div>
                  <input value="<?php echo $offer['power']; ?>" name="power" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Skrzynia biegów</span>
                  </div>
                  <select name="gearbox" class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <?php
                      for ($i = 0; $i < count($gearboxes); $i++) {
                          if ($offer['gearbox'] == $gearboxes[$i]['type']) {
                            echo '<option selected value="'.$gearboxes[$i]['id'].'">'.$gearboxes[$i]['type'].'</option>';
                          }
                          else {
                            echo '<option value="'.$gearboxes[$i]['id'].'">'.$gearboxes[$i]['type'].'</option>';
                          }
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Napęd</span>
                  </div>
                  <select name="drive" class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <?php
                      for ($i = 0; $i < count($carDrives); $i++) {
                          if ($offer['drive'] == $carDrives[$i]['drive']) {
                            echo '<option selected value="'.$carDrives[$i]['id'].'">'.$carDrives[$i]['drive'].'</option>';
                          }
                          else {
                            echo '<option value="'.$carDrives[$i]['id'].'">'.$carDrives[$i]['drive'].'</option>';
                          }
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Województwo</span>
                  </div>
                  <select name="province" class="form-select" aria-label="Default select example">
                    <option selected></option>
                   <?php
                      for ($i = 0; $i < count($provinces); $i++) {
                          if ($offer['province'] == $provinces[$i]['name']) {
                            echo '<option selected value="'.$provinces[$i]['id'].'">'.$provinces[$i]['name'].'</option>';
                          }
                          else {
                            echo '<option value="'.$provinces[$i]['id'].'">'.$provinces[$i]['name'].'</option>';
                          }
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Powiat</span>
                  </div>
                  <input value="<?php echo $offer['district']; ?>" name="district" class="form-control" type="text">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Pojemność skokowa</span>
                  </div>
                  <input value="<?php echo $offer['engine_capacity']; ?>" name="engine_capacity" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Typ samochodu</span>
                  </div>
                  <select name="type" class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <?php
                      for ($i = 0; $i < count($carTypes); $i++) {
                          if ($offer['type'] == $carTypes[$i]['type']) {
                            echo '<option selected value="'.$carTypes[$i]['id'].'">'.$carTypes[$i]['type'].'</option>';
                          }
                          else {
                            echo '<option value="'.$carTypes[$i]['id'].'">'.$carTypes[$i]['type'].'</option>';
                          }
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Kolor samochodu</span>
                  </div>
                  <input value="<?php echo $offer['color']; ?>" name="color" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Liczba drzwi</span>
                  </div>
                  <input value="<?php echo $offer['door']; ?>" name="door" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Liczba siedzeń</span>
                  </div>
                  <input value="<?php echo $offer['seats']; ?>" name="seats" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Pochodzenie</span>
                  </div>
                  <input value="<?php echo $offer['origin']; ?>" name="origin" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Stan</span>
                  </div>
                  <select name="state" class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <?php
                      for ($i = 0; $i < count($carStates); $i++) {
                          if ($offer['state'] == $carStates[$i]['state']) {
                            echo '<option selected value="'.$carStates[$i]['id'].'">'.$carStates[$i]['state'].'</option>';
                          }
                          else {
                            echo '<option value="'.$carStates[$i]['id'].'">'.$carStates[$i]['state'].'</option>';
                          }
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Vin</span>
                  </div>
                  <input value="<?php echo $offer['VIN']; ?>" name="VIN" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Miasto</span>
                  </div>
                  <input value="<?php echo $offer['city']; ?>" name="city" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Cena</span>
                  </div>
                  <input value="<?php echo $offer['price']; ?>" name="price" class="form-control" type="text">
                </div>
              </div>

            </div>

            <div class="col-12">
              <div class="row" style="margin-top: 70px;">
                <div class="form-group">
                  <label for="Textarea1">
                    <h4>Opis</h4>
                  </label>
                  <textarea name="description" class="form-control" id="Textarea1" rows="7"><?php echo $offer['description']; ?></textarea>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="row justify-content-center" style="margin-top: 50px;">
                <input data-test-id='editOffer' type="submit" value="Edytuj aukcje" style="width: 300px; font-size: 33px; background-color: red; color:white; border: none; text-align:center">
              </div>
            </div>

          </form>
          <div style="margin-top: 50px;">
            <?php 
              $transaction = Transactions::getTransactions($_GET['id'], $db->getConnection());
              if (!$transaction) {
                if($offer['visible']==1)
                {
                    echo '<form method="POST" action="../../backend/server/offers.php?method=PATCH&id='.$offer["id"].'">
                    <input type="text" hidden name="visible" value="0"/><button class="btn btn-warning">Zablokuj widoczność oferty w serwisie</button></form>';
                } 
                else
                {
                    echo '<form method="POST" action="../../backend/server/offers.php?method=PATCH&id='.$offer["id"].'">
                    <input type="text" hidden name="visible" value="1"/><button class="btn btn-warning">Odblokuj widoczność oferty w serwisie</button>
                    </form>';
                }
              }
            ?>
          </div>
          <div style="margin-top: 10px;">
            <?php 
              if (!$transaction) {
                echo '<form method="POST" action="../../backend/server/sellCar.php">
                  <input type="text" hidden name="offerID" value="'.$offer["id"].'"/><button class="btn btn-success">Oznacz tę ofertę jako sprzedaną</button></form>';
              }
              else {
                $transaction = mysqli_fetch_assoc($transaction);
                echo '<form method="POST" action="../../backend/server/sellCar.php?method=DELETE">
                <p>Oferta została sprzedana w dniu: '.$transaction['date'].'</p>
                  <input type="text" hidden name="offerID" value="'.$offer["id"].'"/><button class="btn btn-success">Anuluj sprzedaż tej oferty</button></form>';
              }
            ?>
          </div>
        </article>
      </div>
    </div>
  </div>
  <div style="margin-top: 30px;"></div>



  <?php include "../templates/footer.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
  

  <script src="../js/displayImage.js"></script>

</body>

</html>