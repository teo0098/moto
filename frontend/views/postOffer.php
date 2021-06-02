<?php
session_start();
if(!isset($_SESSION['userID'])) { 
  header("location: index.php");
} 
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
  <link rel="stylesheet" href="../styles/postOffer.css">
  <title>Moto.pl</title>
</head>

<style>
  .padding-0 {
    padding-right: 0;
    padding-left: 0;
  }
</style>

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
    }
    ?>
  </header>
  <div class="container spanMaster">
    <div class="row">
      <div class="card" style="max-width:1000px">
        <?php
        if (isset($_SESSION['offerPostError'])) {
          echo '<div class="alert alert-danger" role="alert">
                                ' . $_SESSION['offerPostError'] . '
                            </div>';
        } else if (isset($_SESSION['offerPostSuccess'])) {
          echo '<div class="alert alert-success" role="alert">
                                ' . $_SESSION['offerPostSuccess'] . '
                            </div>';
        }
        $_SESSION['offerPostError'] = null;
        $_SESSION['offerPostSuccess'] = null;
        ?>
        <article class="card-body" style="max-width: 1200px;">
          <h4 class="card-title mt-3 text-center">Dodaj swoją ofertę</h4>
          <form class="form-postOffer" method='POST' action="../../backend/server/offers.php" enctype="multipart/form-data">
            <div class="row" style="margin-top: 20px;">
              <div class="col-md-6 col-12">
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Marka samochodu</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="brand" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Model samochodu</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="model" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rok produkcji</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="production_year" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Przebieg</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="run" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rodzaj paliwa</span>
                      </div>
                    </div>
                    <div class="col-md-6 col-12 padding-0">
                      <select name="fuel" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <?php
                        for ($i = 0; $i < count($carFuels); $i++) {
                          echo '<option value="' . $carFuels[$i]['id'] . '">' . $carFuels[$i]['fuel'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Moc</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="power" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Skrzynia biegów</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <select name="gearbox" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <?php
                        for ($i = 0; $i < count($gearboxes); $i++) {
                          echo '<option value="' . $gearboxes[$i]['id'] . '">' . $gearboxes[$i]['type'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Napęd</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <select name="drive" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <?php
                        for ($i = 0; $i < count($carDrives); $i++) {
                          echo '<option value="' . $carDrives[$i]['id'] . '">' . $carDrives[$i]['drive'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Województwo</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <select name="province" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <?php
                        for ($i = 0; $i < count($provinces); $i++) {
                          echo '<option value="' . $provinces[$i]['id'] . '">' . $provinces[$i]['name'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Powiat</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="district" class="form-control" type="text">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Pojemność skokowa</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="engine_capacity" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Typ samochodu</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <select name="type" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <?php
                        for ($i = 0; $i < count($carTypes); $i++) {
                          echo '<option value="' . $carTypes[$i]['id'] . '">' . $carTypes[$i]['type'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Kolor samochodu</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="color" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Liczba drzwi</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="door" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Liczba siedzeń</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="seats" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Pochodzenie</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="origin" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Stan</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <select name="state" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <?php
                        for ($i = 0; $i < count($carStates); $i++) {
                          echo '<option value="' . $carStates[$i]['id'] . '">' . $carStates[$i]['state'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Vin</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="VIN" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Miasto</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="city" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group input-group d-flex justify-content-center">
                  <div class="row">
                    <div class="col-md-6 padding-0">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Cena</span>
                      </div>
                    </div>
                    <div class="col-md-6 padding-0">
                      <input name="price" class="form-control" type="text">
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-12">
              <div class="row" style="margin-top: 70px;">
                <div class="form-group">
                  <label for="Textarea1">
                    <h4>Opis</h4>
                  </label>
                  <textarea name="description" class="form-control" id="Textarea1" rows="7"></textarea>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="row" style="margin-top: 30px;">
                <div class="form-group">
                  <label for="miniature">
                    <h4>Dodaj miniaturkę oferty <i class="fas fa-paperclip"></i></h4>
                  </label>
                  <div id='singleImage'>
                    <input type="file" name="mainImage">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="row" style="margin-top: 30px;">
                <div class="form-group">
                  <label for="addedPhotos">
                    <h4>Dodaj zdjęcia <i class="fas fa-paperclip"></i></h4>
                  </label>
                  <div id='multipleImages'>
                    <input name="image[]" type="file" multiple>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="row" style="margin-top: 30px;">
                <div class="form-group">
                  <label for="radio1">
                    <h4>Opłata za wystawienie aukcji:</h4>
                  </label>
                  <div class="form-check" id="radio1">
                    <input class="form-check-input" type="radio" name="flexRadio" id="flexRadioBlik" checked>
                    <label class="form-check-label" for="flexRadioBlik">
                      <h5>Blik</h5>
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadio" id="flexRadioPayPal">
                    <label class="form-check-label" for="flexRadioPayPal">
                      <h5>PayPal</h5>
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadio" id="flexRadioPayU">
                    <label class="form-check-label" for="flexRadioPayU">
                      <h5>PayU</h5>
                    </label>
                  </div>
                </div>
              </div>
              <div style="font-size: 13px; color:grey">
                Wystawienie pojedyńczej oferty - 20zł
              </div>
            </div>

            <div class="col-12">
              <div class="row justify-content-center" style="margin-top: 50px;">
                <input type="submit" value="Wystaw aukcje" style="width: 300px; font-size: 33px; background-color: red; color:white; border: none; text-align:center">
              </div>
            </div>

          </form>
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