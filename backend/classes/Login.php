<?php
    session_start();

    include realpath(dirname(__FILE__) . '/../db/models/Users.php');
    include realpath(dirname(__FILE__) . '/../db/models/Admins.php');

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
                $user = Users::findUserByEmail($this->email, $connection);
                $admin = Admins::findAdminByEmail($this->email, $connection);
                if (!$user && !$admin) {
                    $_SESSION['loginError'] = 'Złe dane logowania';
                    header('Location: ../../frontend/views/signin.php');
                }
                else {
                    $user = Users::getUserByEmail($this->email, $connection);
                    $admin = Admins::getAdminByEmail($this->email, $connection);
                    if (!$user && !$admin) {
                        $_SESSION['loginError'] = 'Złe dane logowania';
                        header('Location: ../../frontend/views/signin.php');
                    }
                    else {
                        if ($user !== false) $user = mysqli_fetch_assoc($user);
                        if ($admin !== false) $admin = mysqli_fetch_assoc($admin);
                        if ($user !== false && !password_verify($this->password, $user["password"])) {
                            $_SESSION['loginError'] = 'Złe dane logowania';
                            header('Location: ../../frontend/views/signin.php');
                        }
                        else if ($admin !== false && !password_verify($this->password, $admin["password"])) {
                            $_SESSION['loginError'] = 'Złe dane logowania';
                            header('Location: ../../frontend/views/signin.php');
                        }
                        else {
                            if($user)
                            {
                                $_SESSION['userID'] = $user["id"];
                                $_SESSION['userName'] = $user["name"];
                                $_SESSION['userEmail'] = $user["email"];
                                $_SESSION['userPhone'] = $user["phone"];
                                $_SESSION['userSurname'] = $user['surname'];
                                $_SESSION['mode'] = 'user';
                                header('Location: ../../frontend/views/userprofile.php');
                            }
                            else
                            {
                                $_SESSION['adminID'] = $admin["id"];
                                $_SESSION['adminName'] = $admin["name"];
                                $_SESSION['adminEmail'] = $admin["email"];
                                $_SESSION['adminPhone'] = $admin["phone"];
                                $_SESSION['adminSurname'] = $admin['surname'];
                                $_SESSION['mode'] = 'admin';
                                header('Location: ../../frontend/views/adminprofile.php');
                            }
                        }
                    }
                }
            }
        }
    }
?>