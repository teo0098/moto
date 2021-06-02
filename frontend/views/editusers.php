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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>

<body>

    <header class="sticky-top">
        <?php include "../templates/navigation.php" ?>
    </header> 

    <?php
      if (isset($_SESSION['changeDataError'])) 
      {
          echo '<div data-test-id="changeDataError" class="alert alert-danger" role="alert">
                              ' . $_SESSION['changeDataError'] . '
                          </div>';
      } 
      else if (isset($_SESSION['changeDataSuccess'])) 
      {
          echo '<div data-test-id="changeDataSuccess" class="alert alert-success" role="alert">
                              ' . $_SESSION['changeDataSuccess'] . '
                          </div>';
      }
      $_SESSION['changeDataError'] = null;
      $_SESSION['changeDataSuccess'] = null;
    ?>

    <?php
        include realpath(dirname(__FILE__) . '/../../backend/db/models/Admins.php');
        include realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
        include realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');

        $db = new DB($host, $user, $password, $database);
        if (!$db->connect() || !isset($_GET['id'])) {
            echo '<div class="alert alert-danger" role="alert">
                        Nie udało się nawiązać połączenia z bazą
                    </div>';
        }
        else {
            $user = Admins::getUserById($_GET['id'], $db->getConnection());
            if (!$user) {
                echo '<div class="alert alert-danger" role="alert">
                        Link aktywacyjny wygasł, prosimy zarejestrować się jeszcze raz
                    </div>';
                    exit(0);
            }
            else {
                $user = mysqli_fetch_assoc($user);
            }
        }
    ?>
    <div class="container d-flex justify-content-center">
        <div class="row col-md-6 col-md-offset-2 custyle">
            <div class="col d-flex justify-content-center mt-3">
                <h1><?php echo $user['name']. ' ' . $user["surname"];?></h1>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="card_container h-auto mt-5">
            <h4 class="text-center mt-3">Zmień dane użytkownika</h4>
            <form method="POST" action="../../backend/server/changeUserPersonalDataAdmin.php">
                <div class="container">
                    <h7> Imię użytkownika: </h7>
                    <input type="text" value="<?php echo $user['name'] ?>" class="d-block w-100" name="newName">
                    <h7> Nazwisko użytkownika: </h7>
                    <input type="text" value="<?php echo $user['surname'] ?>" class="d-block w-100" name="newSurname">
                    <div class="form-group row d-flex justify-content-center mt-3">
                        <button class="btn btn-outline-secondary w-auto d-block center" type='submit'>Zmień dane użytkownika</button>
                    </div>
                    <br>
                </div>
                <input type="text" hidden name="id" value="<?php echo $_GET['id'];?>" />
                </form>
                <form method="POST" action="../../backend/server/changeUserEmailAdmin.php">
                    <div class="container">
                        <h7> Email użytkownika: </h7>
                        <input type="text" value="<?php echo $user['email'] ?>" class="d-block w-100" name="newEmail">
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-secondary w-auto d-block center" type='submit'>Zmień email użytkownika</button>
                        </div>
                        <br>
                    </div>
                    <input type="text" hidden name="id" value="<?php echo $_GET['id'];?>" />
                </form>
                <form method="POST" action="../../backend/server/changeUserPhoneAdmin.php">
                    <div class="container">
                        <h7> Numer telefonu: </h7>
                        <input type="text" value="<?php echo $user['phone'] ?>" class="d-block w-100" name="newPhone">
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-secondary w-auto d-block center" type='submit'>Zmień numer telefonu</button>
                        </div>
                        <br>
                    </div>
                    <input type="text" hidden name="id" value="<?php echo $_GET['id'];?>" />
                </form>
                <form method="POST" action="../../backend/server/changeUserPasswordAdmin.php">
                    <div class="container">
                        <h7> Hasło użytkownika: </h7>
                        <input type="text" value="" class="d-block w-100" name="newPass">
                        <div class="form-group row d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-secondary w-auto d-block center" type='submit'>Zmień hasło użytkownika</button>
                        </div>
                        <br>
                    </div>
                    <input type="text" hidden name="id" value="<?php echo $_GET['id'];?>" />
                </form>
                
            </div>
        </div>

    <?php include "../templates/footer.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>