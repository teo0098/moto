<?php
    session_start();

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
                $_SESSION['loginError'] = 'Dane są niepoprawne';
                header('Location: ../../frontend/views/signin.php');
            }
            else {
                if (!Users::findUserByEmail($this->email, $connection)) {
                    $_SESSION['loginError'] = 'Złe dane logowania';
                    header('Location: ../../frontend/views/signin.php');
                }
                else {
                    $user = Users::getUserByEmail($this->email, $connection);
                    if (!$user) {
                        $_SESSION['loginError'] = 'Złe dane logowania';
                        header('Location: ../../frontend/views/signin.php');
                    }
                    else {
                        $user = mysqli_fetch_assoc($user);
                        if (!password_verify($this->password, $user["password"])) {
                            $_SESSION['loginError'] = 'Złe dane logowania';
                            header('Location: ../../frontend/views/signin.php');
                        }
                        else {
                            $_SESSION['userID'] = $user["id"];
                            $_SESSION['userName'] = $user["name"];
                            $_SESSION['userEmail'] = $user["email"];
                            $_SESSION['userPhone'] = $user["phone"];
                            $_SESSION['userSurname'] = $user['surname'];
                            header('Location: ../../frontend/views/userprofile.php');
                        }
                    }
                }
            }
        }
    }
?>