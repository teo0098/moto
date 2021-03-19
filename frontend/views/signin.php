<!DOCTYPE html>
<html lang="pl">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/navigation.css">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/signin.css">
    <title>Moto.pl</title>
</head>
<body>
    <?php include "../templates/navigation.php" 

//    $emailErr = $pwdErr = $rememberErr = '';
//    $email = $pwd = $remember = '';

//    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){
//        if (empty($_POST['email'])){
//            $emailErr = 'Email is required!';
//        }else{
//            $email = validate($_POST['email']);
            //check if email address is well form
//            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
//                $emailErr = 'Invalid email format!';
//            }
//        }

//        if (empty($_POST['pwd'])){
//            $pwdErr = 'Password is required!';
//        }else{
//            $pwd = validate($_POST['pwd']);
//        }

//        if (empty($_POST['remember'])) {
//            $remember = '';
//        }else{
//            $remember = validate($_POST['remember']);
//        }
//    }

//    function validate($data){
//        $data = trim($data);
//        $data = stripcslashes($data);
//        $data = htmlspecialchars($data);
//        return $data;
//    }
    ?>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="../../backend/server/login.php">
                <span id="reauth-email" class="reauth-email"></span>
                <input name='email' type="email" id="inputEmail" class="form-control" placeholder="Adres Email" required autofocus>
                <input name='password' type="password" id="inputPassword" class="form-control" placeholder="Hasło" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Zapamiętaj mnie
                    </label>
                </div>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Zaloguj się</button>
                <p class="divider-text">
                    <span class="bg-light">Lub</span>
                </p>
                <div class="formFooter">
                    <a>Nie posiadasz jeszcze konta?</a>
                    <a class="underlineHover" href="../views/signup.php">Zarejestuj się tutaj!</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>
</html>