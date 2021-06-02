<?php
    class Admins 
    {
        public static function findAdminByEmail($email, $connection) 
        {
            $sqlQuery = "SELECT * FROM admins WHERE email='$email'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return true;
            }
            return false;
        }

        public static function findAdminByPhone($phone, $connection) 
        {
            $sqlQuery = "SELECT * FROM admins WHERE phone='$phone'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return true;
            }
            return false;
        }


        public static function insertAdmin($name, $surname, $email, $phone, $password, $connection) 
        {
            $sqlQuery = "INSERT INTO admins (`id`, `name`, `surname`, `email`, `phone`, `password`) VALUES (NULL, '$name', '$surname', '$email', '$phone', '$password')";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) 
            {
                return true;
            }
            return false;
        }

        public static function getAdminByEmail($email, $connection) 
        {
            $sqlQuery = "SELECT * FROM admins WHERE email='$email'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return $result;
            }
            return false;
        }


        public static function updatePassword($oldPassword, $newPassword, $connection) 
        {
            if (!preg_match('/^[A-Z0-9a-z!@#$_]{8,20}$/', $oldPassword) || !preg_match('/^[A-Z0-9a-z!@#$_]{8,20}$/', $newPassword)) 
            {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "SELECT * FROM admins WHERE id=".$_SESSION['adminID']."";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows < 1) 
            {
                return false;
            }
            $admin = mysqli_fetch_assoc($result);
            if (!password_verify($oldPassword, $admin["password"])) 
            {
                return 'Wprowadzono niepoprawne stare hasło';
            }
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            if (!$hashedPassword) 
            {
                return false;
            }
            $sqlQuery2 = "UPDATE admins SET `password`='$hashedPassword'";
            $result2 = mysqli_query($connection, $sqlQuery2);
            if (!$result2) 
            {
                return false;
            }
            return true;
        }

        public static function updateEmail($newEmail, $connection) 
        {
            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) 
            {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "SELECT * FROM admins WHERE id<>".$_SESSION['adminID']." AND email='$newEmail'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return 'Adres e-mail jest już w użyciu';
            }
            $sqlQuery2 = "UPDATE admins SET email='$newEmail' WHERE id=".$_SESSION['adminID']."";
            $result2 = mysqli_query($connection, $sqlQuery2);
            if (!$result2) 
            {
                return false;
            }
            return true;
        }

        public static function updatePhone($newPhone, $connection) 
        {
            if (!preg_match('/^[\d]{4,15}$/', $newPhone)) 
            {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "SELECT * FROM admins WHERE id<>".$_SESSION['adminID']." AND phone='$newPhone'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return 'Numer telefonu jest już w użyciu';
            }
            $sqlQuery2 = "UPDATE admins SET phone='$newPhone' WHERE id=".$_SESSION['adminID']."";
            $result2 = mysqli_query($connection, $sqlQuery2);
            if (!$result2) 
            {
                return false;
            }
            return true;
        }

        public static function updatePersonalData($newName, $newSurname, $connection) 
        {
            if (!preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{2,20}$/', $newName)
            || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{2,30}$/', $newSurname)) 
            {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "UPDATE admins SET `name`='$newName', surname='$newSurname' WHERE id=".$_SESSION['adminID']."";
            $result = mysqli_query($connection, $sqlQuery);
            if (!$result) 
            {
                return false;
            }
            return true;
        }

        public static function deleteAccount($id, $connection) 
        {
            $sqlQuery = "DELETE FROM users WHERE id=$id";
            $result = mysqli_query($connection, $sqlQuery);
            if (!$result) 
            {
                return false;
            }
            return true;
        }

        public static function getOffers($limit, $offset, $connection) 
        {
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
            ORDER BY offers.date DESC LIMIT $limit OFFSET $offset";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return $result;
            }
            return false;
        }

        public static function getOffersAmount($connection) 
        {
            $sqlQuery = "SELECT COUNT(*) AS offersAmount FROM offers 
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return $result;
            }
            return false;
        }

        public static function getOfferByIdAdmin($id, $connection) 
        {
            if (!preg_match('/^[0-9]+$/', $id)) {
                return false;
            }
            $sqlQuery = "SELECT offers.id, offers.price, provinces.name AS province, offers.district, offers.city, offers.description, 
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
            WHERE offers.id=$id";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return $result;
            }
            return false;
        }
        

        public static function getUserById($id, $connection)
        {
            if (!preg_match('/^[0-9]+$/', $id)) {
                return false;
            }
            $sqlQuery = "SELECT * FROM users WHERE id=$id";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return $result;
            }
            return false;
        }

        public static function updateUserPersonalData($newName, $newSurname, $id ,$connection) {
            if (!preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{2,20}$/', $newName)
            || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{2,30}$/', $newSurname)) {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "UPDATE users SET `name`='$newName', surname='$newSurname' WHERE id=$id";
            $result = mysqli_query($connection, $sqlQuery);
            if (!$result) {
                return false;
            }
            return true;
        }

        public static function updateUserEmail($newEmail, $id, $connection) 
        {
            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) 
            {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "SELECT * FROM users WHERE id<>$id AND email='$newEmail'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return 'Adres e-mail jest już w użyciu';
            }
            $sqlQuery2 = "UPDATE users SET email='$newEmail' WHERE id=$id";
            $result2 = mysqli_query($connection, $sqlQuery2);
            if (!$result2) 
            {
                return false;
            }
            return true;
        }

        public static function updateUserPhone($newPhone, $id, $connection) 
        {
            if (!preg_match('/^[\d]{4,15}$/', $newPhone)) 
            {
                return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "SELECT * FROM users WHERE id<>$id AND phone='$newPhone'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) 
            {
                return 'Numer telefonu jest już w użyciu';
            }
            $sqlQuery2 = "UPDATE users SET phone='$newPhone' WHERE id=$id";
            $result2 = mysqli_query($connection, $sqlQuery2);
            if (!$result2) 
            {
                return false;
            }
            return true;
        }

        public static function updateUserPassword($newPassword, $id, $connection) {
            if (!preg_match('/^[A-Z0-9a-z!@#$_]{8,20}$/', $newPassword)) {
                    return 'Wprowadzono niepoprawne dane';
            }
            $sqlQuery = "SELECT * FROM users WHERE id=$id";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows < 1) {
                return false;
            }
            $user = mysqli_fetch_assoc($result);
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
        public static function updateActivity($id, $active, $connection) {
            $sqlQuery = "UPDATE users SET active=$active WHERE id=$id";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        

    }
?>