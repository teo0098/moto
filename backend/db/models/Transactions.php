<?php
    class Transactions {

        public static function getTransactions($offerID, $connection) {
            $sqlQuery = "SELECT * FROM transactions WHERE offer_id = $offerID";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function insertTransaction($offerID, $connection) {
            $date = date('Y-m-d');
            mysqli_autocommit($connection, FALSE);
            $sqlQuery = "INSERT INTO transactions VALUES (NULL, $offerID, '$date')";
            $sqlQuery2 = "UPDATE offers SET visible=0 WHERE id = $offerID";
            mysqli_query($connection, $sqlQuery);
            mysqli_query($connection, $sqlQuery2);
            if (!mysqli_commit($connection)) {
                return false;
            }
            return true;
        }

        public static function deleteTransaction($offerID, $connection) {
            $sqlQuery = "DELETE FROM transactions WHERE offer_id = $offerID";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }
    }
?>