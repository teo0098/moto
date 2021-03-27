<?php
    class Verifications {
        
        public static function insertUser($name, $surname, $email, $phone, $password, $hash, $connection) {
            $sqlQuery = "INSERT INTO users (`id`, `name`, `surname`, `email`, `phone`, `password`, `hash`) VALUES (NULL, '$name', '$surname', '$email', '$phone', '$password', '$hash')";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function getUserByHash($hash, $connection) {
            if (!preg_match('/^[A-Za-z0-9]+$/', $hash)) return false;
            $sqlQuery = "SELECT * FROM verifications WHERE `hash`='$hash'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function sendEmail($email, $hash) {
            $to = $email;
            $subject = "Moto.pl - potwierdzenie rejestracji w serwisie";
            $message = "<a style='text-align: center; padding: 20px; font-weight: bold;' href='https://moto-offers.000webhostapp.com/verification?hash=$hash'>Kliknij w ten link aby potwierdzić rejestrację w naszym serwisie :)</a>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: Moto.pl <agnachel0098@gmail.com>" . "\r\n";
            if (mail($to, $subject, $message, $headers)) {
                return true;
            }
            return false;
        }
    }
?>