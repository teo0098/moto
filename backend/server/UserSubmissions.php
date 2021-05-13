<?php
session_start();
require_once '../../vendor/autoload.php';
include "../db/dbCredentials.php";


$subject = $_POST['subject'];
$userEmail = $_POST['email'];
$problemDesc = $_POST['problemDesc'];
$name = $_POST['name'];
$surname = $_POST['surname'];

if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\d\s]{5,20}$/', $subject) 
|| !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\d\s]{20,100}$/', $problemDesc) || !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{3,20}$/', $name)
|| !preg_match('/^[A-Za-zęóąśłżźćńĘÓĄŚŁŻŹĆŃ\s]{3,20}$/', $surname)){
    $_SESSION["Submission"] = "Wypełnij wszystkie pola tekstowe";
    header("Location: ../../frontend/views/contactHelp.php");
}else{


$email = new \SendGrid\Mail\Mail();
$email->setFrom("agnachel0098@gmail.com", "Moto.pl");
$email->setSubject($subject);
$email->addTo("maciek.worosz.21@gmail.com", $username);
$email->addContent(
    "text/html",
    "<p>Użytkownik: $name $surname<br><br> E-mail użytkownika: $userEmail <br><br>$problemDesc</p>"
);
$sendgrid = new \SendGrid($GLOBALS['MOTO_PL_SENDGRID_KEY']);

try {
    $response = $sendgrid->send($email);
    if ($response->statusCode() == 202) {
        $_SESSION["Submission"] = "Zgłoszenie zostało wysłane poprawnie";
        header("Location: ../../frontend/views/contactHelp.php");
    }else{
        throw new Exception();
    }
} catch (Exception $e) {
    $_SESSION["Submission"] = "Wystąpił błąd przy wysyłaniu zgłoszenia";
    header("Location: ../../frontend/views/contactHelp.php");
}
}
?>