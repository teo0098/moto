<?php
session_start();
if(!isset($_SESSION['adminID'])) { 
    header("location: index.php");
}
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

        <div class="row d-flex justify-content-center">
            <div class="col col-md-4 col-12">
                <form class="form-inline row d-flex justify-content-center mt-3" action="../views/userpanel.php">
                    <button class="btn shadow border-dark" style="width: 90%;" type='submit'><i class="fas fa-users me-3 butmy"></i>Zarządzaj użytkownikami</button>
                </form>
            </div>
            <div class="col col-md-4 col-12">
                <form class="form-inline row d-flex justify-content-center mt-3" action="../views/offerspanel.php">
                    <button class="btn shadow border-dark" style="width: 90%;" type='submit'><i class="fa fa-car me-3 butmy"></i>Zarządzaj ofertami</button>
                </form>
            </div>
        </div>

        <div class="container d-flex justify-content-center">
            <div class="card_container h-auto mt-5">
                <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1">
                    <span class="fa fa-lock mt-2"> </span>
                </div>
                <h4 class="text-center mt-3">Zmiana hasła</h4>
                <form method="POST" action="../../backend/server/changePasswordAdmin.php">
                    <div class="container">
                        <h7> Stare hasło: </h7>
                        <input type="password" class="d-block w-100" name="oldAdminPass">
                        <h7> Nowe hasło: </h7>
                        <input type="password" class="d-block w-100" name="newAdminPass">
                        <h7> Powtórz nowe hasło: </h7>
                        <input type="password" class="d-block w-100" name="repeatnewpass">
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-success w-auto d-block center" type='submit'>Zmień hasło</button>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>


        <div class="container d-flex justify-content-center">
            <div class="card_container h-auto mt-5">
                <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1">
                    <span class="fa fa-at mt-3"> </span>
                </div>
                <h4 class="text-center mt-3">Zmiana e-maila</h4>
                <form method="POST" action="../../backend/server/changeEmailAdmin.php">
                    <div class="container">
                        <h7> E-mail: </h7>
                        <input type="text" value="<?php echo $_SESSION['adminEmail']; ?>" class="d-block w-100" name="newEmailAdmin" />
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-success w-auto d-block center" type='submit'>Zmień e-maila</button>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>

        <div class="container d-flex justify-content-center">
            <div class="card_container h-auto mt-5">
                <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1">
                    <span class="fa fa-phone mt-3"> </span>
                </div>
                <h4 class="text-center mt-3">Zmień numer telefonu</h4>
                <form method="POST" action="../../backend/server/changePhoneAdmin.php">
                    <div class="container">
                        <h7> Numer telefonu: </h7>
                        <input type="text" value="<?php echo $_SESSION['adminPhone'] ?>" class="d-block w-100" name="newPhoneAdmin">
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-success w-auto d-block center" type='submit'>Zmień numer telefonu</button>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>

        <div class="container d-flex justify-content-center">
            <div class="card_container h-auto mt-5">
                <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1">
                    <span class="fa fa-user-secret mt-2"> </span>
                </div>
                <h4 class="text-center mt-3">Zmień dane osobowe</h4>
                <form method="POST" action="../../backend/server/changePersonalDataAdmin.php">
                    <div class="container">
                        <h7> Imię: </h7>
                        <input type="text" value="<?php echo $_SESSION['adminName'] ?>" class="d-block w-100" name="newAdminName">
                        <h7> Nazwisko: </h7>
                        <input type="text" value="<?php echo $_SESSION['adminSurname'] ?>" class="d-block w-100" name="newAdminSurname">
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-success w-auto d-block center" type='submit'>Zmień dane</button>
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