<?php
    session_start();

    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include "../db/models/Offers.php";
    include "../db/models/Cars.php";
    include "../db/models/CarImages.php";

    error_reporting(0);
    header('Content-Type: application/json');

    function validateID($id) {
        if (!isset($id) || $id == null) {
            return 'Missing "id" parameter';
        }
        if (!preg_match('/^[0-9]+$/', $id)) {
            return 'Invalid parameter - id must be unsigned integer';
        }
        return null;
    }

    function getFileName($string) {
        $fileName = explode('/', $string);
        return $fileName[count($fileName) - 1];
    }

    try {
        $db = new DB($host, $user, $password, $database);
        if (!$db->connect()) {
            throw new Exception("Unable to connect to the database");
        }
        $sqlQuery = "CREATE TABLE IF NOT EXISTS `offers` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `price` varchar(40) COLLATE utf8_polish_ci NOT NULL,
            `province` int(10) unsigned NOT NULL,
            `district` varchar(50) COLLATE utf8_polish_ci NOT NULL,
            `city` varchar(50) COLLATE utf8_polish_ci NOT NULL,
            `description` longtext COLLATE utf8_polish_ci NOT NULL,
            `car_id` int(10) unsigned NOT NULL,
            `user_id` int(10) unsigned NOT NULL,
            `date` date NOT NULL,
            `visible` tinyint(3) unsigned NOT NULL DEFAULT 1,
            PRIMARY KEY (`id`),
            KEY `offers_cars` (`car_id`),
            KEY `offers_users` (`user_id`),
            KEY `offers_provinces` (`province`),
            CONSTRAINT `offers_cars` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
            CONSTRAINT `offers_provinces` FOREIGN KEY (`province`) REFERENCES `provinces` (`id`) ON UPDATE NO ACTION,
            CONSTRAINT `offers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci";
        $result = mysqli_query($db->getConnection(), $sqlQuery);
        if (!$result) {
            throw new Exception("Unable to create table offers");
        }
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET': {
                if (isset($_GET['id']) && $_GET['id'] != null) {
                    if (!preg_match('/^[0-9]+$/', $_GET['id'])) {
                        throw new Exception('Invalid parameter - id must be unsigned integer');
                    }
                    $offer = Offers::getOfferById($_GET['id'], $db->getConnection());
                    if (!$offer) {
                        throw new Exception('Unable to retrieve offer');
                    }
                    echo json_encode(mysqli_fetch_assoc($offer));
                }
                else {
                    if (!preg_match('/^[0-9]+$/', $_GET['limit'])
                        || !preg_match('/^[0-9]+$/', $_GET['offset'])) {
                            throw new Exception('Invalid parameters - limit and offset must be unsigned integers');
                    }
                    $offers = Offers::getOffers($_GET['limit'], $_GET['offset'], $db->getConnection());
                    if (!$offers) {
                        throw new Exception('Unable to retrieve offers');
                    }
                    echo json_encode(mysqli_fetch_assoc($offers));
                }
            }
            break;
            case 'POST': {
                if (!isset($_SESSION['userID'])) {
                    throw new Exception('Unauthorized access');
                }
                switch ($_GET['method']) {
                    case 'PUT': {
                        if (!Cars::validate($_POST)) {
                            throw new Exception('Bad data entered');
                        }
                        $validID = validateID($_GET['id']);
                        if ($validID != null) {
                            throw new Exception($validID);
                        }
                        $offer = Offers::getOfferById($_GET['id'], $db->getConnection());
                        if (!$offer) {
                            throw new Exception('Unable to retrieve offer');
                        }
                        $offer = mysqli_fetch_assoc($offer);
                        if (!Offers::updateOffer($_POST, $_GET['id'], $db->getConnection())
                            || !Cars::updateCar($_POST, $offer['car_id'], $db->getConnection())) {
                                throw new Exception('Unable to update offer');
                        }
                        echo json_encode('Offer has been updated successfully');
                    }
                    break;
                    case 'PATCH': {
                        $validID = validateID($_GET['id']);
                        if ($validID != null) {
                            throw new Exception($validID);
                        }
                        $visible = $_POST['visible'];
                        if (!preg_match('/^[0-1]{1}$/', $visible)) {
                            throw new Exception('Bad data entered');
                        }
                        if (!Offers::updateVisibility($_GET['id'], $visible, $db->getConnection())) {
                            throw new Exception('Unable to update offer');
                        }
                        echo json_encode('Offer has been updated successfully');
                    }
                    break;
                    case 'DELETE': {
                        $validID = validateID($_GET['id']);
                        if ($validID != null) {
                            throw new Exception($validID);
                        }
                        $offer = Offers::getOfferById($_GET['id'], $db->getConnection());
                        if (!$offer) {
                            throw new Exception('Unable to retrieve offer');
                        }
                        $offer = mysqli_fetch_assoc($offer);
                        $car = Cars::getCarById($offer['car_id'], $db->getConnection());
                        if (!$car) {
                            throw new Exception('Unable to retrieve offer');
                        }
                        $car = mysqli_fetch_assoc($car);
                        $carImages = CarImages::getCarImages($offer['car_id'], $db->getConnection());
                        if (!$carImages) {
                            throw new Exception('Unable to retrieve car images');
                        }
                        $carImages = mysqli_fetch_all($carImages, MYSQLI_ASSOC);
                        unlink(__DIR__.$FILE_UPLOAD_DESTINATION.getFileName($car['image_url']));
                        for ($i = 0; $i < count($carImages); $i++) {
                            unlink(__DIR__.$FILE_UPLOAD_DESTINATION.getFileName($carImages[$i]['url']));
                        }
                        if (!Cars::deleteCar($offer['car_id'], $db->getConnection())) {
                            throw new Exception('Unable to delete offer');
                        }
                        echo json_encode('Offer has been deleted successfully');
                    }
                    break;
                    default: {
                        if (!Cars::validate($_POST)) {
                            throw new Exception('Bad data entered');
                        }
                        $file = $_FILES["mainImage"];
                        if ($file) {
                            $fileName = time().'_'.$_SESSION['userID'].'_'.$file["name"];
                            $uploadDir = __DIR__.$FILE_UPLOAD_DESTINATION;
                            $uploadFile = $uploadDir.$fileName;
                            if (!move_uploaded_file($file['tmp_name'], $uploadFile)) {
                                throw new Exception("Unable to upload image");
                            }
                            $mainImageURL = $IMAGE_PATH.$fileName;
                            if (!Cars::insertCar($_POST, $mainImageURL, $db->getConnection())) {
                                throw new Exception('Unable to insert offer');
                            }
                            $car = Cars::getCarByVIN($_POST['VIN'], $db->getConnection());
                            if (!$car) {
                                throw new Exception('Unable to retrieve car');
                            }
                            $car = mysqli_fetch_assoc($car);
                            if (!Offers::insertOffer($_POST, $car['id'], $_SESSION['userID'], $db->getConnection())) {
                                throw new Exception('Unable to insert offer');
                            }
                            for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
                                $imageFileName = time().'_'.$_SESSION['userID'].'_'.$_FILES['image']['name'][$i];
                                $uploadImageFile = $uploadDir.$imageFileName;
                                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $uploadImageFile)) {
                                    $imageURL = $IMAGE_PATH.$imageFileName;
                                    CarImages::insertCarImage($car['id'], $imageURL, $db->getConnection());
                                }
                            }
                            echo json_encode('Offer has been uploaded successfully');
                        }
                        else {
                            throw new Exception("Unable to upload image");
                        }
                    }
                }
            }
            break;
            default: {
                throw new Exception('THIS METHOD IS INVALID FOR THAT ROUTE');
            }
        }
    }
    catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
?>