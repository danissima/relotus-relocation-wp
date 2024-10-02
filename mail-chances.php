<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
$mail->Host = "smtp.beget.com"; // sets beget as the SMTP server
$mail->Port = 465; // set the SMTP port for the beget server
$mail->Username = "admin@relotus-relocation.com"; // beget mail username
$mail->Password = "d4EOX%aK6KsD"; // beget mail password

//form data
$data = [
    'Name' => $_POST['name'],
    'Citizenship' => $_POST['citizenship'],
    'Current location' => $_POST['location'],
    'Age' => $_POST['age'],
    'People' => $_POST['people'],
    'Period' => $_POST['period'],
    'Budget' => $_POST['budget'],
    'Phone' => $_POST['phone'],
    'Email' => $_POST['email'],
];

$body = '';
foreach($data as $key => $value) {
    if ($value) {
        $body = $body . "<p><strong>{$key}: </strong> {$value}</p>";    
    }
}

$body = $body . "-- <br> Relotus Relocation";

//Typical mail data
$mail->AddAddress('admin@relotus-relocation.com', 'Relotus Relocation');
$mail->SetFrom('admin@relotus-relocation.com', 'admin@relotus-relocation.com');
$mail->Sender = 'admin@relotus-relocation.com';
$mail->isHTML(true);
$mail->Subject = "Check chances";
$mail->Body = $body;

try{
    $mail->send();
    echo "ok";
} catch(Exception $e){
    //Something went bad
    echo "error";
}
?>