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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>

<body>

    <header class="sticky-top">
        <?php include "../templates/navigation.php" ?>
    </header> 

    <?php
        include realpath(dirname(__FILE__) . '/../../backend/db/models/Users.php');
        include realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
        include realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');

        $db = new DB($host, $user, $password, $database);
            if (!$db->connect()) 
            {
                echo '<div class="alert alert-danger" role="alert">
                        Nie udało się nawiązać połączenia z bazą
                    </div>';
            } 
            else 
            {
                $sqlQuery = "SELECT * FROM offers";
                $result = mysqli_query($db->getConnection(), $sqlQuery);
            }


    ?>

    <?php
        if (isset($_SESSION['offerDeleteError'])) 
        {
            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['offerDeleteError'] . '</div>';
        }
        $_SESSION['offerDeleteError'] = null;
    ?>

    <div class="container d-flex justify-content-center">
        <div class="row col-md-6 col-md-offset-2 custyle">
            <div class="col d-flex justify-content-center mt-3">
                <h1>Oferty</h1>
            </div>

          
        </div>
    </div>

    <form class="form-userpanel" method="GET" action="../../backend/server/Users.php">
        <div class="container d-flex justify-content-center">
            <div class="table-responsive p-3">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>ID oferty</th>
                            <th>Imię</th>
                            <th>ID Samochodu</th>
                            <th>Status oferty</th>
                            <th>Przeglądaj</th>
                            <th>Edytuj</th>
                            <th>Usuń</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php $i=0; while($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['car_id']; ?></td>
                                <td><?php echo $row['visible']; ?></td>
                                <td><a href="./offer.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Przejdź</a> </td>
                                <td><a href="./myoffer.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edytuj</a> </td>
                                <td><a href="../../backend/server/offers.php?method=DELETE&id=<?php echo $row['id']; ?>" class="btn btn-danger">Usuń</a> </td>
                            </tr>
                        <?php $i++; } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>ID Użytkownika</th>
                            <th>ID Samochodu</th>
                            <th>Status oferty</th>
                            <th>Przeglądaj</th>
                            <th>Edytuj</th>
                            <th>Usuń</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </form>

    <?php include "../templates/footer.php" ?>

    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script> $(document).ready(function() { $('#dataTable').DataTable(); });</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>

</html>