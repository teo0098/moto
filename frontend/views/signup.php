<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/navigation.css">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Moto.pl</title>
</head>
<body>
    <?php include "../templates/navigation.php" 

     //  $nameErr = $emailErr = $pwdErr = $pwdcErr = $genderErr = $websiteErr = $acceptErr = '';
     //  $name = $email = $pwd = $pwdc = $gender = $website = $accept = '';
   
     //  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])){
     //      if (empty($name)){
     //          $nameErr = 'name is required!';
     //      }else{
     //          $name = validate($_POST['name']);
               //check if name format is correct
     //          if (!preg_match("/^[a-zA-Z ]*$/",$name)){
     //              $nameErr = 'only letters and white space allowed!';
     //          }
     //      }
   
     //      if (empty($email)){
     //          $emailErr = 'email is required!';
     //      }else{
     //          $email = validate($_POST['email']);
               //check if the email format is correct
     //          if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
     //              $emailErr = 'email format is not correct!';
     //          }
     //      }
   
     //      if (empty($pwd)){
     //          $pwdErr = 'password is required!';
     //      }else{
     //          $pwd = validate($_POST['pwd']);
               //check if the password format is correct
      //     }
   
      //     if (empty($pwdc)){
     //          $pwdcErr = 'password is not confirmed!';
     //      }else{
     //          $pwdc = validate($_POST['pwdc']);
               //check if the password is matched or not
     //      }
   
     //      if (empty($gender)) {
     //          $genderErr = 'gender is required!';
     //      }else{
   //            $gender = validate($_POST['gender']);
    //       }
    //       
    //       if (empty($website)) {
            //   $websiteErr = '';
          // }else{
             //  $website = validate($_POST['website']);
               //check if URL address syntax is valid (this regular expression also allows dashes in the URL)
           //    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
         //          $websiteErr = "Invalid URL";
       //        }
     //      }
   //
       //    if (empty($accept)) {
     //          $acceptErr = 'you must accept the terms and conditions!';
    //       }else{
     //          $accept = validate($_POST['accept']);
    //       }
    //   }
     
   //  function validate($data) {
   //    $data = trim($data);
   //    $data = stripslashes($data);
   //    $data = htmlspecialchars($data);
   //    return $data;
  // }
    ?>
    <div class="container">
            <div class="card card-container-">
                <article class="card-body mx-auto" style="max-width: 400px;">
	            <h4 class="card-title mt-3 text-center">Tworzenie konta</h4>
	            <p class="text-center">Załóż darmowe konto!</p>
	            <form class="form-signup">
	                <div class="form-group input-group">
		                <div class="input-group-prepend">
		                    <span class="input-group-text"> <i style="height:24px;" class="fa fa-user"></i> </span>
		                </div>
                        <input name="" class="form-control" placeholder="Imię" type="text">
                        <input name="" class="form-control" placeholder="Nazwisko" type="text">
                    </div>
                    <div class="form-group input-group">
    	                <div class="input-group-prepend">
		                    <span class="input-group-text"> <i style="height:24px;" class="fa fa-envelope"></i> </span>
		                </div>
                        <input name="" class="form-control" placeholder="Adres Email" type="email">
                    </div>
                    <div class="form-group input-group">
    	                <div class="input-group-prepend">
		                    <span class="input-group-text"> <i style="height:24px;" class="fa fa-phone"></i> </span>
		                </div>
    	                <input name="" class="form-control" placeholder="Numer Telefonu" type="text">
                    </div>
                    <div class="form-group input-group">
    	                <div class="input-group-prepend">
		                    <span class="input-group-text"> <i style="height:24px;" class="fa fa-lock"></i> </span>
		                </div>
                        <input class="form-control" placeholder="Hasło" type="password">
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i style="height:24px;"class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" placeholder="Powtórz hasło" type="password">
                    </div>   
                    <br>                                  
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-signup"> Stwórz konto </button>
                    </div> 
                    <div class="formFooter">
                        <p class="divider-text">
                            <span class="bg-light">Lub</span>
                         </p>     
                        <p class="text-center">Posiadasz już konto?
                            <br> 
                            <a class="underlineHover" href="../views/signin.php">Zaloguj się</a> 
                        </p> 
                    </div>
                </form>
                </article>
            </div> 
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3810206ae2.js" crossorigin="anonymous"></script>
</body>
</html>