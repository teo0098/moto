<?php
    session_start();

    include "../db/dbCredentials.php";
    include "../db/dbConnect.php";
    include "../db/models/Offers.php";
    include "../db/models/Cars.php";

    header('Content-Type: application/json');

    try {
        $db = new DB($host, $user, $password, $database);
        if (!$db->connect()) {
            throw new Exception("Unable to connect to the database");
        }
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET': {
                if (isset($_GET['id']) && $_GET['id'] != null) {
                    echo json_encode('GET OFFER');
                }
                else {
                    echo json_encode('GET OFFERS');
                }
            }
            break;
            case 'POST': {
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
            break;
            case 'PATCH': {
                echo json_encode('PATCH');
            }
            break;
            case 'DELETE': {
                echo json_encode('DELETE');
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