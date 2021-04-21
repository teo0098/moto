<?php
    class CarImages {

        public static function insertCarImage($carID, $url, $connection) {
            $sqlQuery = "INSERT INTO car_images VALUES (NULL, ".$carID.", '".$url."')";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function getCarImages($carID, $connection) {
            $sqlQuery = "SELECT `url` FROM car_images WHERE car_id=$carID";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
    }
?>