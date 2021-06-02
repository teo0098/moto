<?php
    class Cars {

        public static function getCarByVIN($VIN, $connection) {
            $sqlQuery = "SELECT * FROM cars WHERE VIN='$VIN'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function getCarById($id, $connection) {
            if (!preg_match('/^[0-9]+$/', $id)) {
                return false;
            }
            $sqlQuery = "SELECT * FROM cars WHERE id=$id";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function validate($data) {
            if (!preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{1,30}$/', $data['brand']) || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ0-9\s]{1,30}$/', $data['model'])
                || !preg_match('/^[1-9]{1}[0-9]{3}$/', $data['production_year']) || !preg_match('/^[1-9]{1}[0-9]{1,29}$/', $data['run'])
                || !preg_match('/^[0-9]+$/', $data['fuel']) || !preg_match('/^[1-9]{1}[0-9]{1,9}$/', $data['power'])
                || !preg_match('/^[0-9]+$/', $data['gearbox']) || !preg_match('/^[0-9]+$/', $data['drive'])
                || !preg_match('/^[0-9]+$/', $data['type']) || !preg_match('/^[0-9]{1,2}$/', $data['door'])
                || !preg_match('/^[0-9]{1,2}$/', $data['seats']) || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ]{1,30}$/', $data['color'])
                || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{1,40}$/', $data['origin']) || !preg_match('/^[0-9]+$/', $data['state'])
                || !preg_match('/^[A-Z0-9]{17}$/', $data['VIN']) || !preg_match('/^[1-9]{1}[0-9]{2,19}$/', $data['engine_capacity'])
                || !preg_match('/^[1-9]{1}[0-9]{1,39}$/', $data['price']) || !preg_match('/^[0-9]+$/', $data['province'])
                || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\-\s]{1,50}$/', $data['district']) || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\-\s]{1,50}$/', $data['city'])
                || !isset($data['description'])) {
                return false;
            }
            return true;
        }

        public static function insertCar($data, $mainImageURL, $connection) {
            $sqlQuery = "INSERT INTO cars VALUES (NULL, '".$data['brand']."', '".$data['model']."',
            '".$data['production_year']."', '".$data['run']."', '".$data['fuel']."', '".$data["power"]."', '".$data['gearbox']."',
            '".$data['drive']."', '".$data["type"]."', '".$data['door']."', '".$data['seats']."', '".$data['color']."',
            '".$data['origin']."', '".$data["state"]."', '".$data['VIN']."', '".$data['engine_capacity']."', '$mainImageURL')";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function updateCar($data, $carID, $connection) {
            if (!preg_match('/^[0-9]+$/', $carID)) {
                return false;
            }
            $sqlQuery = "UPDATE cars SET brand='".$data['brand']."', model='".$data['model']."',
            production_year='".$data['production_year']."', run='".$data['run']."', fuel='".$data['fuel']."', `power`='".$data["power"]."', 
            gearbox='".$data['gearbox']."', drive='".$data['drive']."', `type`='".$data["type"]."', door='".$data['door']."', 
            seats='".$data['seats']."', color='".$data['color']."', origin='".$data['origin']."', `state`='".$data["state"]."', 
            VIN='".$data['VIN']."', engine_capacity='".$data['engine_capacity']."' WHERE id=$carID";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function deleteCar($carID, $connection) {
            if (!preg_match('/^[0-9]+$/', $carID)) {
                return false;
            }
            $sqlQuery = "DELETE FROM cars WHERE id=$carID";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }
    }
?>