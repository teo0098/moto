<?php
    class CarStates {

        public static function getStates($connection) {
            $sqlQuery = "SELECT * FROM car_states";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
    }
?>