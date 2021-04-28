<?php
    class Gearboxes {

        public static function getGearboxes($connection) {
            $sqlQuery = "SELECT * FROM gearbox";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
    }
?>