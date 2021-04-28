<?php
    class CarFuels {

        public static function getFuels($connection) {
            $sqlQuery = "SELECT * FROM car_fuels";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
    }
?>