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
            if (!preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{1,30}$/', $data['brand']) || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ0-9\s]{1,30}$/', $data['model'])
            || !preg_match('/^[1-9]{1}[0-9]{3}$/', $data['production_year']) || !preg_match('/^[1-9]{1}[0-9\s]{1,29}$/', $data['run'])
            || !preg_match('/^[0-9]+$/', $data['fuel']) || !preg_match('/^[1-9]{1}[0-9]{1,9}$/', $data['power'])
            || !preg_match('/^[0-9]+$/', $data['gearbox']) || !preg_match('/^[0-9]+$/', $data['drive'])
            || !preg_match('/^[0-9]+$/', $data['type']) || !preg_match('/^[0-9]{1,2}$/', $data['door'])
            || !preg_match('/^[0-9]{1,2}$/', $data['seats']) || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ]{1,30}$/', $data['color'])
            || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ]{1,40}$/', $data['origin']) || !preg_match('/^[0-9]+$/', $data['state'])
            || !preg_match('/^[A-Z0-9]{17}$/', $data['VIN']) || !preg_match('/^[1-9]{1}[0-9\s]{4,19}$/', $data['engine_capacity'])
            || !preg_match('/^[1-9]{1}[0-9\s]{1,39}$/', $data['price']) || !preg_match('/^[0-9]+$/', $data['province'])
            || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\-\s]{1,50}$/', $data['district']) || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\-\s]{1,50}$/', $data['city'])
            || !isset($data['description'])) {
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