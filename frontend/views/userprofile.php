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
    <link rel="stylesheet" href="../styles/userprofile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>

<body>

    <header class="sticky-top">
        <?php include "../templates/navigation.php" ?>
    </header>
    <div class="container">

        <h2 class="d-flex justify-content-center mt-3"> Ustawienia konta </h2>

        <?php
        if (isset($_SESSION['changeDataError'])) {
            echo '<div data-test-id="changeDataError" class="alert alert-danger" role="alert">
                                ' . $_SESSION['changeDataError'] . '
                            </div>';
        } else if (isset($_SESSION['changeDataSuccess'])) {
            echo '<div data-test-id="changeDataSuccess" class="alert alert-success" role="alert">
                                ' . $_SESSION['changeDataSuccess'] . '
                            </div>';
        }
        $_SESSION['changeDataError'] = null;
        $_SESSION['changeDataSuccess'] = null;
        ?>

        <div class="row">
            <div class="col col-md-4 col-12">
                <form class="form-inline row d-flex justify-content-center mt-3" action="../views/postOffer.php">
                    <button class="btn shadow border-dark" style="width: 90%;" type='submit'><i class="fas fa-plus me-3 butmy"></i>Dodaj ofertę</button>
                </form>
            </div>
            <div class="col col-md-4 col-12">
                <form class="form-inline row d-flex justify-content-center mt-3" action="../views/myoffers.php">
                    <input type='text' hidden name='page' value='1' />
                    <button class="btn shadow border-dark" style="width: 90%;" type='submit'><i class="fa fa-car me-3 butmy"></i>Moje ogłoszenia</button>
                </form>
            </div>
            <div class="col col-md-4 col-12">
                <form class="form-inline row d-flex justify-content-center mt-3" action="#">
                    <button class="btn shadow border-dark" style="width: 90%;" type='submit'><i class="fa fa-paperclip me-3 butmy"></i>Moje zarchiwizowane</button>
                </form>
            </div>
        </div>

        <div class="container d-flex justify-content-center">
            <div class="card_container w-50 h-auto mt-5" style="min-width: 500px;">
                <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1">
                    <span class="fa fa-lock mt-2"> </span>
                </div>
                <h4 class="text-center mt-3">Zmiana hasła</h4>
                <form method="POST" action="../../backend/server/changePassword.php">
                    <div class="container">
                        <h7> Stare hasło: </h7>
                        <input type="password" class="d-block w-100" name="oldPass">
                        <h7> Nowe hasło: </h7>
                        <input type="password" class="d-block w-100" name="newPass">
                        <h7> Powtórz nowe hasło: </h7>
                        <input type="password" class="d-block w-100" name="repeatnewpass">
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-success w-25 d-block center" type='submit'>Zmień hasło</button>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>


        <div class="container d-flex justify-content-center">
            <div class="card_container w-50 h-auto mt-5" style="min-width: 500px;">
                <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1">
                    <span class="fa fa-at mt-3"> </span>
                </div>
                <h4 class="text-center mt-3">Zmiana e-maila</h4>
                <form method="POST" action="../../backend/server/changeEmail.php">
                    <?php
                    if (isset($_SESSION['changeEmailError'])) {
                        echo '<div class="alert alert-danger" role="alert">
                                            ' . $_SESSION['changeEmailError'] . '
                                        </div>';
                    } else if (isset($_SESSION['changeEmailSuccess'])) {
                        echo '<div class="alert alert-success" role="alert">
                                            ' . $_SESSION['changeEmailSuccess'] . '
                                        </div>';
                    }
                    $_SESSION['changeEmailError'] = null;
                    $_SESSION['changeEmailSuccess'] = null;
                    ?>
                    <div class="container">
                        <h7> E-mail: </h7>
                        <input type="text" value="<?php echo $_SESSION['userEmail']; ?>" class="d-block w-100" name="newEmail" />
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-success w-25 d-block center" type='submit'>Zmień e-maila</button>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>

        <div class="container d-flex justify-content-center">
            <div class="card_container w-50 h-auto mt-5" style="min-width: 500px;">
                <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1">
                    <span class="fa fa-phone mt-3"> </span>
                </div>
                <h4 class="text-center mt-3">Zmień numer telefonu</h4>
                <form method="POST" action="../../backend/server/changePhone.php">
                    <div class="container">
                        <h7> Numer telefonu: </h7>
                        <input type="text" value="<?php echo $_SESSION['userPhone'] ?>" class="d-block w-100" name="newPhone">
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-success w-25 d-block center" type='submit'>Zmień numer telefonu</button>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>

        <div class="container d-flex justify-content-center">
            <div class="card_container w-50 h-auto mt-5" style="min-width: 500px;">
                <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1">
                    <span class="fa fa-user-secret mt-2"> </span>
                </div>
                <h4 class="text-center mt-3">Zmień dane osobowe</h4>
                <form method="POST" action="../../backend/server/changePersonalData.php">
                    <div class="container">
                        <h7> Imię: </h7>
                        <input type="text" value="<?php echo $_SESSION['userName'] ?>" class="d-block w-100" name="newName">
                        <h7> Nazwisko: </h7>
                        <input type="text" value="<?php echo $_SESSION['userSurname'] ?>" class="d-block w-100" name="newSurname">
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-success w-25 d-block center" type='submit'>Zmień dane</button>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>

        <div class="container d-flex justify-content-center">
            <div class="card_container w-50 h-auto mt-5" style="min-width: 500px;">
                <div class="rounded-circle text-center mt-2 bg-danger ms-auto me-auto circ2">
                    <span class="fa fa-minus-circle mt-3"> </span>
                </div>
                <h4 class="text-center mt-3">Usuń konto</h4>
                <form method="POST" action="../../backend/server/deleteAccount.php">
                    <div class="container">
                        <h7> Aktualne hasło: </h7>
                        <input type="password" class="d-block w-100" name="password">
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-danger w-25 d-block center" type='submit'>Usuń konto</button>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include "../templates/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>