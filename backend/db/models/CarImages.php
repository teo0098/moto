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
    }
?>