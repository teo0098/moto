<?php
    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include "../classes/SearchEngine.php";

    $db = new DB($host, $user, $password, $database);
    if (!$db->connect()) {
        echo 'Error with connecting to database';
    }
    else {
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $priceFrom = $_POST['priceFrom'];
        $priceTo = $_POST['priceTo'];
        $productionYearFrom = $_POST['productionYearFrom'];
        $productionYearTo = $_POST['productionYearTo'];
        $fuel = $_POST['fuel'];
        $runFrom = $_POST['runFrom'];
        $runTo = $_POST['runTo'];
        $origin = $_POST['origin'];
        $powerFrom = $_POST['powerFrom'];
        $powerTo = $_POST['powerTo'];
        $gearbox = $_POST['gearbox'];
        $drive = $_POST['drive'];
        $type = $_POST['type'];
        $state = $_POST['state'];
        $engineCapacity = $_POST['engineCapacity'];
        $province = $_POST['province'];
        $searchEngine = new SearchEngine($brand, $model, $priceFrom, $priceTo, $productionYearFrom, $productionYearTo, $fuel, $runFrom, $runTo, $origin, $powerFrom, $powerTo, $gearbox, $drive, $type, $state, $engineCapacity, $province);
        $searchEngine->searchOffers($db->getConnection());
    }
?>