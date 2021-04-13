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