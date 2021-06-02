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
                $sqlQuery = "SELECT * FROM users";
                $result = mysqli_query($db->getConnection(), $sqlQuery);
            }


    ?>

    <div class="container d-flex justify-content-center">
        <div class="row col-md-6 col-md-offset-2 custyle">
            <div class="col d-flex justify-content-center mt-3">
                <h1>Użytkownicy</h1>
            </div>

          
        </div>
    </div>

        <div class="container d-flex justify-content-center">
            <div class="table-responsive p-3">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Email</th>
                            <th>Status użytkownika</th>
                            <th>Edytuj</th>
                            <th>Blokuj</th>
                            <th>Usuń</th>
                        </tr>
                    </thead>
                    <tbody>  
                        <?php while($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['surname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php if($row['active']==1){echo "Aktywny";} else{echo "Zablokowany";} ?></td>
                                <td><a href="./editusers.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edytuj</a> </td>
                                <td>                                
                                <?php 
                                if($row['active']==1)
                                {
                                    echo '<form method="POST" action="../../backend/server/users.php?method=PATCH&id='.$row["id"].'">
                                    <input type="text" hidden name="active" value="0"/><button class="btn btn-warning">Blokuj</button></form>';
                                } 
                                else
                                {
                                    echo '<form method="POST" action="../../backend/server/users.php?method=PATCH&id='.$row["id"].'">
                                    <input type="text" hidden name="active" value="1"/><button class="btn btn-warning">Odblokuj</button>
                                    </form>';
                                }
                                ?>
                                </td>
                                <td>
                                    <form method='POST' action="../../backend/server/deleteUserAccount.php">
                                        <input type="text" hidden name="id" value="<?php echo $row['id']; ?>"/>
                                        <button class="btn btn-danger">Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Email</th>
                            <th>Status użytkownika</th>
                            <th>Edytuj</th>
                            <th>Blokuj</th>
                            <th>Usuń</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() { $('#dataTable').DataTable(); });
    </script>

    <?php include "../templates/footer.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
    <script>$(document).ready( function () { $('#dataTable').DataTable(); } )</script>
</body>

</html>