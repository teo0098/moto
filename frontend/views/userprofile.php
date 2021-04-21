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

        <div class="form-group row d-flex justify-content-center mt-3">
            <button class="btn shadow border-dark w-25 d-block center me-5" type='submit'><i class="fa fa-car me-3 butmy"></i>Moje ogłoszenia</button>
            <button class="btn shadow border-dark w-25 d-block center" type='submit'><i class="fa fa-paperclip me-3 butmy"></i>Moje zarchiwizowane</button>
        </div>

        <div class="card_container h-auto mt-5">
            <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1" >
                <span class="fa fa-lock mt-2"> </span>
            </div>
            <h4 class="text-center mt-3">Zamiana hasła</h4>
            <div class="container">
                <h7> Stare hasło: </h7>
                <input type="text" class="d-block w-100" name="oldpass">
                <h7> Nowe hasło: </h7>
                <input type="text" class="d-block w-100" name="newpass">
                <h7> Powtórz nowe hasło: </h7>
                <input type="text" class="d-block w-100" name="repeatnewpass">
                <div class="form-group row d-flex justify-content-center mt-3">
                    <button class="btn btn-outline-success w-25 d-block center" type='submit'>Zmień hasło</button>
                </div>   
                <br>   
            </div>
        </div>

        <div class="card_container h-auto mt-5">
            <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1" >
                <span class="fa fa-at mt-3"> </span>
            </div>
            <h4 class="text-center mt-3">Zamiana e-maila</h4>
            <div class="container">
                <h7> Nowe e-mail: </h7>
                <input type="text" class="d-block w-100" name="newmail">
                <h7> Powtórz nowy e-mail: </h7>
                <input type="text" class="d-block w-100" name="repeatnewmail">
                <div class="form-group row d-flex justify-content-center mt-3">
                    <button class="btn btn-outline-success w-25 d-block center" type='submit'>Zmień e-maila</button>
                </div>   
                <br>   
            </div>
        </div>

        <div class="card_container h-auto mt-5">
            <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1" >
                <span class="fa fa-phone mt-3"> </span>
            </div>
            <h4 class="text-center mt-3">Zmień numer telefonu</h4>
            <div class="container">
                <h7> Nowy numer telefonu: </h7>
                <input type="text" class="d-block w-100" name="newphone">
                <h7> Powtórz nowy numer: </h7>
                <input type="text" class="d-block w-100" name="repeatnewphone">
                <div class="form-group row d-flex justify-content-center mt-3">
                    <button class="btn btn-outline-success w-25 d-block center" type='submit'>Zmień numer telefonu</button>
                </div>   
                <br>   
            </div>
        </div>

        <div class="card_container h-auto mt-5">
            <div class="rounded-circle text-center mt-2 ms-auto me-auto circ1" >
                <span class="fa fa-user-secret mt-2"> </span>
            </div>
            <h4 class="text-center mt-3">Zmień dane osobowe</h4>
            <div class="container">
                <h7> Podaj imię: </h7>
                <input type="text" class="d-block w-100" name="firstname">
                <h7> Podaj nazwisko: </h7>
                <input type="text" class="d-block w-100" name="surname">
                <div class="form-group row d-flex justify-content-center mt-3">
                    <button class="btn btn-outline-success w-25 d-block center" type='submit'>Zmień dane</button>
                </div>   
                <br>   
            </div>
        </div>

        <div class="card_container h-auto mt-5">
            <div class="rounded-circle text-center mt-2 bg-danger ms-auto me-auto circ2" >
                <span class="fa fa-minus-circle mt-3"> </span>
            </div>
            <h4 class="text-center mt-3">Usuń konto</h4>
            <div class="container">
                <h7> Podaj aktualne hasło: </h7>
                <input type="text" class="d-block w-100" name="surname">
                <div class="form-group row d-flex justify-content-center mt-3">
                    <button class="btn btn-outline-danger w-25 d-block center" type='submit'>Usuń konto</button>
                </div>   
                <br>   
            </div>
        </div>

    </div>

    <?php include "../templates/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>