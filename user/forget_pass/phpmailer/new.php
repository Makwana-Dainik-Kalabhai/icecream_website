<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <form action="" method="post">
        <!-- Mobile: <input type="text" name="mobile" /> -->
        Email: <input type="email" name="email" />
        <input type="submit" name="submit" value="Submit" />
    </form>
</body>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./src/Exception.php";
require "./src/PHPMailer.php";
require "./src/SMTP.php";

if (isset($_POST["submit"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "dainikmakwana31@gmail.com";
    $mail->Password = "ctak bbgo pkdw npvh";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("dainikmakwana31@gmail.com");
    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);
    $mail->Subject = "To send an Email";
    $otp = mt_rand(100000, 999999);
    $mail->Body = "Hey! D K Makwana, your OTP is ".$otp;

    if($mail->send())
    {
        echo "Email send successfully";
    }
    else {
        echo "Error";
    }
}


?>

</html>