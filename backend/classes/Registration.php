<?php

    include realpath(dirname(__FILE__) . '/../db/models/Users.php');

    class Registration {

        private $name;
        private $surname;
        private $email;
        private $phone;
        private $password;

        public function __construct($name, $surname, $email, $phone, $password) {
            $this->name = $name;
            $this->surname = $surname;
            $this->email = $email;
            $this->phone = $phone;
            $this->password = $password;
        }

        private function areDataValid() {
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{2,20}$/', $this->name)
            || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{2,30}$/', $this->surname) || !preg_match('/^[\d]{4,15}$/', $this->phone)
            || !preg_match('/^[A-Z0-9a-z\!\@\#\$\_]{8,20}$/', $this->password)) {
                return false;
            }
            return true;
        }

        public function register($connection) {
            if (!$this->areDataValid()) {
                echo 'Data are invalid';
            }
            else {
                if (Users::findUserByEmail($this->email, $connection)) {
                    echo "Email exists";
                }
                else if (Users::findUserByPhone($this->phone, $connection)) {
                    echo "Phone exists";
                }
                else {
                    $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
                    if (!Users::insertUser($this->name, $this->surname, $this->email, $this->phone, $hashedPassword, $connection)) {
                        echo "Error with inserting user";
                    }
                    else {
                        echo "User inserted";
                    }
                }
            }
        }
    }
?>