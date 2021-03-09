<?php

    include realpath(dirname(__FILE__) . '/../db/models/Users.php');

    class Login {

        private $email;
        private $password;

        public function __construct($email, $password) {
            $this->email = $email;
            $this->password = $password;
        }

        private function areDataValid() {
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) || !preg_match('/^[A-Z0-9a-z\!\@\#\$\_]{8,20}$/', $this->password)) {
                return false;
            }
            return true;
        }

        public function login($connection) {
            if (!$this->areDataValid()) {
                echo 'Data are invalid';
            }
            else {
                if (!Users::findUserByEmail($this->email, $connection)) {
                    echo "User does not exist";
                }
                else {
                    $user = Users::getUserByEmail($this->email, $connection);
                    if (!$user) {
                        echo "User does not exist";
                    }
                    else {
                        $user = mysqli_fetch_assoc($user);
                        if (!password_verify($this->password, $user["password"])) {
                            echo "User does not exist";
                        }
                        else {
                            echo 'User logged in';
                        }
                    }
                }
            }
        }
    }
?>