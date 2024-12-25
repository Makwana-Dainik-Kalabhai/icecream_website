<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");


// Function to send an email
function send_email($table, $name, $email)
{

    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "dainikmakwana31@gmail.com";
    $mail->Password = "ctak bbgo pkdw npvh";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("dainikmakwana31@gmail.com");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "For One Time Password(OTP)";
    $otp = mt_rand(100000, 999999);


    $msg = "Hey! " . $name . ". Your One Time Password(OTP) is $otp. If you want to reset password, then paste it on forget password form.";


    $mail->Body = $msg;

    if ($mail->send()) {
        $_SESSION["otp"] = $otp;
    }
}


// Check email exist or not

if (isset($_POST["send_otp"]) && isset($_POST["email"])) {
    $email = $_POST["email"];
    $_SESSION["forget_pass_email"] = $_POST["email"];

    $sel_user = $conn->prepare("SELECT * FROM `user_login_data`");
    $sel_user->execute();
    $sel_user = $sel_user->fetchAll();

    foreach ($sel_user as $row_user) {
        if ($email == $row_user["email"]) {

            $_SESSION["user_email"] = $row_user["email"];
            
            if (isset($_SESSION["forget_pass_error"])) {
                unset($_SESSION["forget_pass_error"]);
            }
            
            send_email('user_login_data', $row_user["name"], $email);
            
            $curr_time = time();
            
            $otp_send_time = $conn->prepare("UPDATE `user_login_data` SET otp_limit='$curr_time' WHERE email='$email'");
            $otp_send_time->execute();
            header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php");
            
            return;
            
            //
        } else if ($email != $row_user["email"]) {
            
            
            $sel_admin = $conn->prepare("SELECT * FROM `admin_login_data`");
            $sel_admin->execute();
            $sel_admin = $sel_admin->fetchAll();
            
            
            foreach ($sel_admin as $row_admin) {
                
                if ($email == $row_admin["email"]) {
            
                    $_SESSION["admin_email"] = $row_admin["email"];
                    
                    
                    if (isset($_SESSION["forget_pass_error"])) {
                        unset($_SESSION["forget_pass_error"]);
                    }
                    
                    send_email('admin_login_data', $row_admin["name"], $email);
                    
                    $curr_time = time();
                    
                    $otp_send_time = $conn->prepare("UPDATE `admin_login_data` SET otp_limit='$curr_time' WHERE email='$email'");
                    $otp_send_time->execute();
                    
                    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php");
                    return;
                    
                    //
                } else if ($email != $row_admin["email"]) {


                    if (!isset($_SESSION["forget_pass_error"])) {
                        $_SESSION["forget_pass_error"] = "Email ID is not Exist";
                        header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php");
                    }
                }
            }

            //
        }
    }
}
