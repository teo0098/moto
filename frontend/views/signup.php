<?php
session_start();
if (isset($_SESSION['adminID'])) {
    header("location: adminprofile.php");
} else if (isset($_SESSION['userID'])) {
    header("location: userprofile.php");
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>

<body>
    <header class="sticky-top">
        <?php include "../templates/navigation.php" ?>
    </header>
    <div class="container">
        <div class="card card-container-">
            <article class="card-body mx-auto">
                <h4 class="card-title mt-3 text-center">Załóż konta</h4>
                <br>

                <form class="form-signup" method='POST' action="../../backend/server/registration.php">
                    <?php
                    if (isset($_SESSION['registerError'])) {
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
                    ?>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i style="height:24px;" class="fa fa-user mt-1"></i> </span>
                        </div>
                        <input name="name" class="form-control" pattern="^[A-Za-z]{2,20}$" required placeholder="Imię" type="text" />
                        <input name="surname" class="form-control" pattern="^[A-Za-z]{2,30}$" required placeholder="Nazwisko" type="text" />
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend" style="width:40px">
                            <span class="input-group-text"> <i style="height:24px;" class="fa fa-envelope mt-1"></i> </span>
                        </div>
                        <input name="email" class="form-control" required placeholder="Adres Email" type="email" />
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend" style="width:40px">
                            <span class="input-group-text"> <i style="height:24px;" class="fa fa-phone mt-1"></i> </span>
                        </div>
                        <input name="phone" class="form-control" pattern="^[0-9]{9}$" required placeholder="Numer Telefonu" type="text" />
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i style="height:24px;" class="fa fa-lock mt-1"></i> </span>
                        </div>
                        <input name='password' pattern="^[A-Z0-9a-z!@#$_]{8,20}$" required class="form-control" placeholder="Hasło" type="password" />
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i style="height:24px;" class="fa fa-lock mt-1"></i> </span>
                        </div>
                        <input required class="form-control" placeholder="Powtórz hasło" type="password" />
                    </div>
                    <br>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="accept"> Akceptuję <a class="underlineHover" href="../views/signin.php">Regulamin</a>
                        </label>
                    </div>
                    <br>
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-block btn-signup w-75"> Załóż konto </button>
                    </div>
                    <div class="formFooter">
                        <p class="divider-text">
                            <span class="bg-light">Lub</span>
                        </p>
                        <p class="text-center">Posiadasz już konto?
                            <br>
                            <a class="underlineHover" href="../views/signin.php">Zaloguj się</a>
                        </p>
                    </div>
                </form>
            </article>
        </div>
    </div>

    <?php include "../templates/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>