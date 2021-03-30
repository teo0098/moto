<?php
    include realpath(dirname(__FILE__) . './../../../vendor/autoload.php');
    include '../dbCredentials.php';

    class Verifications {

        public static function findUserByEmailOrPhone($email, $phone, $connection) {
            $sqlQuery = "SELECT * FROM verifications WHERE email='$email' OR phone='$phone'";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return true;
            }
            return false;
        }
        
        public static function insertUser($name, $surname, $email, $phone, $password, $hash, $connection) {
            $sqlQuery = "INSERT INTO verifications (`id`, `name`, `surname`, `email`, `phone`, `password`, `hash`) VALUES (NULL, '$name', '$surname', '$email', '$phone', '$password', '$hash')";
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

        public static function sendEmail($userEmail, $hash) {
            $email = new SendGrid\Mail\Mail(); 
            $email->setFrom("agnachel0098@gmail.com", "Moto.pl");
            $email->setSubject("Moto.pl - potwierdzenie rejestracji w serwisie");
            $email->addTo($userEmail);
            $email->addContent(
                "text/html", "<a style='text-align: center; padding: 20px; font-weight: bold;' href='https://moto-offers.000webhostapp.com/frontend/views/verification.php?hash=$hash'>Kliknij w ten link aby potwierdzić rejestrację w naszym serwisie :)</a>"
            );
            $sendgrid = new SendGrid($GLOBALS['MOTO_PL_SENDGRID_KEY']);
            try {
                $response = $sendgrid->send($email);
                if ($response->statusCode() == 202) {
                    return true;
                }
                return false;
            } catch (Exception $e) {
                return false;
            }
        }

        public static function deleteUser($id, $connection) {
            $sqlQuery = "DELETE FROM verifications WHERE id=$id";
            mysqli_query($connection, $sqlQuery);
        }
    }
?>