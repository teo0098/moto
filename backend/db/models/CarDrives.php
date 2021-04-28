<?php
    class CarDrives {

        public static function getDrives($connection) {
            $sqlQuery = "SELECT * FROM car_drives";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
    }
?>