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

        public static function insertCar($data, $mainImageURL, $connection) {
            if (!preg_match('/^[A-Za-z0-9]+$/', $data['brand']) || !preg_match('/^[A-Za-z0-9]+$/', $data['model'])
            || !preg_match('/^[A-Za-z0-9]+$/', $data['production_year']) || !preg_match('/^[A-Za-z0-9]+$/', $data['run'])
            || !preg_match('/^[A-Za-z0-9]+$/', $data['fuel']) || !preg_match('/^[A-Za-z0-9]+$/', $data['power'])
            || !preg_match('/^[A-Za-z0-9]+$/', $data['gearbox']) || !preg_match('/^[A-Za-z0-9]+$/', $data['drive'])
            || !preg_match('/^[A-Za-z0-9]+$/', $data['type']) || !preg_match('/^[A-Za-z0-9]+$/', $data['door'])
            || !preg_match('/^[A-Za-z0-9]+$/', $data['seats']) || !preg_match('/^[A-Za-z0-9]+$/', $data['color'])
            || !preg_match('/^[A-Za-z0-9]+$/', $data['origin']) || !preg_match('/^[A-Za-z0-9]+$/', $data['state'])
            || !preg_match('/^[A-Za-z0-9]+$/', $data['VIN']) || !preg_match('/^[A-Za-z0-9]+$/', $data['engine_capacity'])
            || !preg_match('/^[A-Za-z0-9]+$/', $data['price']) || !preg_match('/^[A-Za-z0-9]+$/', $data['province'])
            || !preg_match('/^[A-Za-z0-9]+$/', $data['district']) || !preg_match('/^[A-Za-z0-9]+$/', $data['city'])
            || !preg_match('/^[A-Za-z0-9]+$/', $data['description'])) {
                return false;
            }
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
    }
?>