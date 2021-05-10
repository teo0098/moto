<?php
session_start();
require_once '../../vendor/autoload.php';
include "../db/dbCredentials.php";


$subject = $_POST['subject'];
$userEmail = $_POST['email'];
$problemDesc = $_POST['problemDesc'];
$username = $_POST['username'];

$email = new \SendGrid\Mail\Mail();
$email->setFrom("agnachel0098@gmail.com", "Moto.pl");
$email->setSubject($subject);
$email->addTo($userEmail, $username);
$email->addContent(
    "text/html",
    "<p>Użytkownik: $username <br><br> $problemDesc </p>"
);
$sendgrid = new \SendGrid($GLOBALS['MOTO_PL_SENDGRID_KEY']);

try {
    $response = $sendgrid->send($email);
    if ($response->statusCode() == 202) {
        $_SESSION["Submission"] = "Zgłoszenie zostało wysłane poprawnie";
        header("Location: ../../frontend/views/contactHelp.php");
    }else{
        $_SESSION["Submission"] = "Wystąpił błąd przy wysyłaniu zgłoszenia";
    }
} catch (Exception $e) {
    return false;
}

?>