<?php
session_start();

include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");

if (isset($_POST["curr_pass"]) && isset($_POST["new_pass"]) && isset($_POST["update_pass"])) {

    $curr_pass = $_POST["curr_pass"];
    $new_pass = $_POST["new_pass"];


    // Get user email
    if (isset($_SESSION["user_email"])) {

        $sel_user = $conn->prepare("SELECT pass FROM `user_login_data` WHERE email='" . $_SESSION["forget_pass_email"] . "'");
        $sel_user->execute();
        $sel_user = $sel_user->fetchAll();

        if ($curr_pass == null || $new_pass == null) {
            $_SESSION["forget_pass_error"] = "Please! Fill the fields";
            header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php");

            //
        } else {
            foreach ($sel_user as $row_user) {

                if ($curr_pass != null && $new_pass != null && $curr_pass == $new_pass) {
                    $_SESSION["forget_pass_error"] = "Current password & New password is same";
                    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php");
                } else if ($curr_pass == $row_user["pass"]) {

                    $update_user = $conn->prepare("UPDATE `user_login_data` SET `pass`='$new_pass' WHERE email='" . $_SESSION["forget_pass_email"] . "'");
                    $update_user->execute();

                    echo "<script> alert('Password updated Successfully');</script>";

                    unset($_SESSION["forget_pass_email"]);
                    unset($_SESSION["set_pass"]);
                    unset($_SESSION["forget_pass_error"]);

                    header("Refresh:0; url='http://localhost/php/mysql/icecream_website/user/form/login_form.php'");

                    //
                } else {
                    $_SESSION["forget_pass_error"] = "Current password is invalid";
                    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php");
                }
            }
        }
    }




    // Get Admin email
    if (isset($_SESSION["admin_email"])) {

        $sel_admin = $conn->prepare("SELECT pass FROM `admin_login_data` WHERE email='" . $_SESSION["forget_pass_email"] . "'");
        $sel_admin->execute();
        $sel_admin = $sel_admin->fetchAll();


        if ($curr_pass == null || $new_pass == null) {
            $_SESSION["forget_pass_error"] = "Please! Fill the fields";
            header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php");

            //
        } else {
            foreach ($sel_admin as $row_admin) {

                if ($curr_pass != null && $new_pass != null && $curr_pass == $new_pass) {
                    $_SESSION["forget_pass_error"] = "Current password & New password is same";
                    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php");
                } else if ($curr_pass == $row_admin["pass"]) {

                    $update_admin = $conn->prepare("UPDATE `admin_login_data` SET `pass`='$new_pass' WHERE email='" . $_SESSION["forget_pass_email"] . "'");
                    $update_admin->execute();

                    echo "<script> alert('Password updated Successfully');</script>";

                    unset($_SESSION["forget_pass_email"]);
                    unset($_SESSION["set_pass"]);
                    unset($_SESSION["forget_pass_error"]);

                    header("Refresh:0; url='http://localhost/php/mysql/icecream_website/user/form/login_form.php'");

                    //
                } else {
                    $_SESSION["forget_pass_error"] = "Current password is invalid";
                    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php");
                }
            }
        }
    }
}

if (isset($_POST["go_back_btn"])) {
    unset($_SESSION["set_pass"]);
    unset($_SESSION["form_error"]);
    unset($_SESSION["forget_pass_email"]);

    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php");
}
