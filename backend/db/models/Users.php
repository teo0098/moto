<?php
    class Users {
        
        public static function findUserByEmail($email, $connection) {
            $sqlQuery = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return true;
            }
            return false;
        }

        public static function findUserByPhone($phone, $connection) {
            $sqlQuery = "SELECT * FROM users WHERE phone='$phone'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return true;
            }
            return false;
        }

        public static function insertUser($name, $surname, $email, $phone, $password, $connection) {
            $sqlQuery = "INSERT INTO users (`id`, `name`, `surname`, `email`, `phone`, `password`) VALUES (NULL, '$name', '$surname', '$email', '$phone', '$password')";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function getUserByEmail($email, $connection) {
            $sqlQuery = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
    }
?>