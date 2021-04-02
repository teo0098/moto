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
  <link rel="stylesheet" href="../styles/postOffer.css">
  <link rel="stylesheet" href="../styles/dropzone.css">
  <title>Moto.pl</title>
</head>

<body>
  <header class="sticky-top">
    <?php include "../templates/navigation.php" ?>
  </header>
  <div class="container">
    <div class="row">
      <div class="card" style="width:1000px">
        <article class="card-body" style="max-width: 1200px;">
          <h4 class="card-title mt-3 text-center">Dodaj swoją ofertę</h4>
          <form class="form-postOffer" method='POST' action="#">
            <?php
            /*if (isset($_SESSION['registerError'])) {
                        echo '<div class="alert alert-danger" role="alert">
                                        ' . $_SESSION['registerError'] . '
                                    </div>';
                    } else if (isset($_SESSION['registerSuccess'])) {
                        echo '<div class="alert alert-success" role="alert">
                                        ' . $_SESSION['registerSuccess'] . '
                                    </div>';
                    }
                    $_SESSION['registerError'] = null;
                    $_SESSION['registerSuccess'] = null;
                    */
            ?>
            <div class="row" style="margin-top: 20px;">
              <div class="col-md-6 col-12">
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Marka samochodu </span>
                  </div>
                  <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Model samochodu </span>
                  </div>
                  <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rok produkcji</span>
                  </div>
                  <input name="productionYear" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Przebieg</span>
                  </div>
                  <input name="mileage" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rodzaj paliwa</span>
                  </div>
                  <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Moc</span>
                  </div>
                  <input name="enginePower" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Skrzynia biegów</span>
                  </div>
                  <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Napęd</span>
                  </div>
                  <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Województwo</span>
                  </div>
                  <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Powiat</span>
                  </div>
                  <input name="county" class="form-control" type="text">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Pojemność skokowa</span>
                  </div>
                  <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Typ samochodu</span>
                  </div>
                  <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Kolor samochodu</span>
                  </div>
                  <input name="productionYear" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Liczba drzwi</span>
                  </div>
                  <input name="mileage" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Liczba siedzeń</span>
                  </div>
                  <input name="fuelType" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Pochodzenie</span>
                  </div>
                  <input name="enginePower" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Stan</span>
                  </div>
                  <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Vin</span>
                  </div>
                  <input name="drivingGear" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Miasto</span>
                  </div>
                  <input name="province" class="form-control" type="text">
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Cena</span>
                  </div>
                  <input name="county" class="form-control" type="text">
                </div>
              </div>

            </div>

            <div class="col-12">
              <div class="row" style="margin-top: 70px;">
                <div class="form-group">
                  <label for="Textarea1">
                    <h4>Opis</h4>
                  </label>
                  <textarea class="form-control" id="Textarea1" rows="7"></textarea>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="row" style="margin-top: 30px;">
                <div class="form-group">
                  <label for="miniature">
                    <h4>Dodaj miniaturkę oferty <i class="fas fa-paperclip"></i></h4>
                  </label>
                  <div style="border: 2px solid red; height:400px " id='addedPh2otos'>
                    <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
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
                  <div style="border: 2px solid red; height:400px " id='addedP3hotos'>
                    <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
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


  <div class="col-12">
    <div class="row" style="margin-top: 30px;">
      <div class="form-group">
        <label for="addedPhotos">
          <h4>Dodaj zdjęcia <i class="fas fa-paperclip"></i></h4>
        </label>
        <div style="border: 2px solid red; height:400px " id='addedPhotos'>
          <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
        </div>
      </div>
    </div>
  </div>

  <?php include "../templates/footer.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
  <script src="../js/dropzone.js"></script>

  <script src="../js/displayImage.js"></script>

</body>

</html>