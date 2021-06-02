<?php
    class Users {
        
        public static function findUserByEmail($email, $connection) {
            $sqlQuery = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return true;
            }
            return false;
        }

        public static function findUserByPhone($phone, $connection) {
            $sqlQuery = "SELECT * FROM users WHERE phone='$phone'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return true;
            }
            return false;
        }


        public static function insertUser($name, $surname, $email, $phone, $password, $connection) {
            $sqlQuery = "INSERT INTO users (`id`, `name`, `surname`, `email`, `phone`, `password`) VALUES (NULL, '$name', '$surname', '$email', '$phone', '$password')";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function getUserByEmail($email, $connection) {
            $sqlQuery = "SELECT * FROM users WHERE email='$email' AND active=1";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }


        public static function updatePassword($oldPassword, $newPassword, $connection) {
            if (!preg_match('/^[A-Z0-9a-z!@#$_]{8,20}$/', $oldPassword)
                || !preg_match('/^[A-Z0-9a-z!@#$_]{8,20}$/', $newPassword)) {
                    return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "SELECT * FROM users WHERE id=".$_SESSION['userID']."";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows < 1) {
                return false;
            }
            $user = mysqli_fetch_assoc($result);
            if (!password_verify($oldPassword, $user["password"])) {
                return 'Wprowadzono niepoprawne stare hasło';
            }
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            if (!$hashedPassword) {
                return false;
            }
            $sqlQuery2 = "UPDATE users SET `password`='$hashedPassword'";
            $result2 = mysqli_query($connection, $sqlQuery2);
            if (!$result2) {
                return false;
            }
            return true;
        }

        public static function updateEmail($newEmail, $connection) {
            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "SELECT * FROM users WHERE id<>".$_SESSION['userID']." AND email='$newEmail'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return 'Adres e-mail jest już w użyciu';
            }
            $sqlQuery2 = "UPDATE users SET email='$newEmail' WHERE id=".$_SESSION['userID']."";
            $result2 = mysqli_query($connection, $sqlQuery2);
            if (!$result2) {
                return false;
            }
            return true;
        }

        public static function updatePhone($newPhone, $connection) {
            if (!preg_match('/^[\d]{4,15}$/', $newPhone)) {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "SELECT * FROM users WHERE id<>".$_SESSION['userID']." AND phone='$newPhone'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return 'Numer telefonu jest już w użyciu';
            }
            $sqlQuery2 = "UPDATE users SET phone='$newPhone' WHERE id=".$_SESSION['userID']."";
            $result2 = mysqli_query($connection, $sqlQuery2);
            if (!$result2) {
                return false;
            }
            return true;
        }

        public static function updatePersonalData($newName, $newSurname, $connection) {
            if (!preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{2,20}$/', $newName)
            || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{2,30}$/', $newSurname)) {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "UPDATE users SET `name`='$newName', surname='$newSurname' WHERE id=".$_SESSION['userID']."";
            $result = mysqli_query($connection, $sqlQuery);
            if (!$result) {
                return false;
            }
            return true;
        }

        public static function deleteAccount($password, $connection) {
            if (!preg_match('/^[A-Z0-9a-z!@#$_]{8,20}$/', $password)) {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "SELECT * FROM users WHERE id=".$_SESSION['userID']."";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows < 1) {
                return false;
            }
            $user = mysqli_fetch_assoc($result);
            if (!password_verify($password, $user["password"])) {
                return 'Wprowadzono niepoprawne hasło';
            }
            $sqlQuery2 = "DELETE FROM users WHERE id=".$_SESSION['userID']."";
            $result2 = mysqli_query($connection, $sqlQuery2);
            if (!$result2) {
                return false;
            }
            return true;
        }

        public static function getOffers($limit, $offset, $connection) {
            $sqlQuery = "SELECT offers.id, offers.price, provinces.name, 
            cars.brand, cars.model, cars.production_year, cars.run, car_fuels.fuel,
            cars.engine_capacity, cars.image_url
            FROM offers 
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id
            WHERE offers.visible=1
            AND offers.user_id=".$_SESSION['userID']." ORDER BY offers.date DESC LIMIT $limit OFFSET $offset";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function getOffersAmount($connection) {
            $sqlQuery = "SELECT COUNT(*) AS offersAmount FROM offers 
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id
            WHERE offers.visible=1 
            AND offers.user_id=".$_SESSION['userID']."";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function getOfferById($id, $connection) {
            if (!preg_match('/^[0-9]+$/', $id)) {
                return false;
            }
            $sqlQuery = "SELECT offers.id, offers.visible, offers.price, provinces.name AS province, offers.district, offers.city, offers.description, 
            offers.date, offers.car_id, cars.brand, cars.model, cars.production_year, cars.run, car_fuels.fuel, cars.power, gearbox.type AS gearbox,
            car_drives.drive, car_types.type, cars.door, cars.seats, cars.color, cars.origin, car_states.state, cars.VIN, cars.engine_capacity, cars.image_url, users.name, users.surname, users.phone
            FROM offers 
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id 
            JOIN users ON users.id=offers.user_id
            WHERE offers.user_id=".$_SESSION['userID']." AND offers.id=$id";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function getArchivedOffers($limit, $offset, $connection) {
            $sqlQuery = "SELECT offers.id, offers.price, provinces.name, 
            cars.brand, cars.model, cars.production_year, cars.run, car_fuels.fuel,
            cars.engine_capacity, cars.image_url
            FROM offers 
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id
            WHERE offers.visible=0
            AND offers.user_id=".$_SESSION['userID']." ORDER BY offers.date DESC LIMIT $limit OFFSET $offset";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function getArchivedOffersAmount($connection) {
            $sqlQuery = "SELECT COUNT(*) AS offersAmount FROM offers 
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id
            WHERE offers.visible=0
            AND offers.user_id=".$_SESSION['userID']."";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
       
    }
?>