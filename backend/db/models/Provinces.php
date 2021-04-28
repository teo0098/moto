<?php
    class Provinces {

        public static function getProvinces($connection) {
            $sqlQuery = "SELECT * FROM provinces";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
    }
?>