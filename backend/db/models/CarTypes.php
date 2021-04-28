<?php
    class CarTypes {

        public static function getTypes($connection) {
            $sqlQuery = "SELECT * FROM car_types";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
    }
?>