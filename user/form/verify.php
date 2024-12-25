<?php
session_start();

include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");

// This is for signUp Form
if (isset($_FILES["profile_img"]) && isset($_POST["sign_name"]) && isset($_POST["sign_email"]) && isset($_POST["sign_pass"])) {

    $profile_img = $_FILES["profile_img"]["name"];
    $sign_name = $_POST["sign_name"];
    $sign_email = $_POST["sign_email"];
    $sign_pass = $_POST["sign_pass"];


    $select_email = $conn->prepare("SELECT email FROM `user_login_data` WHERE email='$sign_email'");
    $select_email->execute();
    $select_email = $select_email->fetchAll();

    foreach ($select_email as $row) {
        $contain_email = $row["email"];
    }

    if ($contain_email != $_POST["sign_email"]) {

        $insert = $conn->prepare("INSERT INTO `user_login_data`(`profile_img`, `name`, `email`, `pass`) VALUES ('$profile_img','$sign_name','$sign_email','$sign_pass')");
        $insert->execute();

        $tmp_name = $_FILES["profile_img"]["tmp_name"];
        move_uploaded_file($tmp_name, "C:/xampp/htdocs/php/mysql/icecream_website/user/profile_page/$profile_img");

        $select = $conn->prepare("SELECT * FROM `user_login_data` WHERE email='$sign_email'");
        $select->execute();
        $select = $select->fetchAll();

        foreach ($select as $row) {
            $_SESSION["profile_img"] = $row["profile_img"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["phone"] = $row["phone"];
            $_SESSION["pass"] = $row["pass"];
            $_SESSION["address"] = $row["address"];
        }

        header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/profile_page/profile.php");

        //
    } else {
        $_SESSION["form_error"] = "Email Id is already Exist";
        header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/form/sign_form.php");

        //
    }
}













// This is for Login Form
if (isset($_POST["login_email"]) && isset($_POST["login_pass"])) {

    $login_email = $_POST["login_email"];
    $login_pass = $_POST["login_pass"];


    $sel_user = $conn->prepare("SELECT * FROM `user_login_data`");
    $sel_user->execute();
    $sel_user = $sel_user->fetchAll();


    foreach ($sel_user as $row_user) {
        if ($login_email == $row_user["email"] && $login_pass == $row_user["pass"]) {

            $_SESSION["email"] = $row_user["email"];

            $contain_user = true;
        }
    }

    $sel_admin = $conn->prepare("SELECT * FROM `admin_login_data`");
    $sel_admin->execute();
    $sel_admin = $sel_admin->fetchAll();


    foreach ($sel_admin as $row_admin) {
        if ($login_email == $row_admin["email"] && $login_pass == $row_admin["pass"]) {

            $_SESSION["email"] = $row_admin["email"];
            $contain_admin = true;
        }
    }

    if (isset($contain_admin) && isset($contain_user)) {
        $_SESSION["admin_user"] = true;
        header("Refresh:0; url='http://localhost/php/mysql/icecream_website/user/form/login_form.php'");
        return;
    }


    foreach ($sel_user as $row_user) {

        if ($login_email == $row_user["email"] && $login_pass == $row_user["pass"]) {

            $sel_user_email = $conn->prepare("SELECT * FROM `user_login_data` WHERE email='$login_email'");
            $sel_user_email->execute();
            $sel_user_email = $sel_user_email->fetchAll();

            foreach ($sel_user_email as $row_user_email) {

                $_SESSION["profile_img"] = $row_user_email["profile_img"];
                $_SESSION["name"] = $row_user_email["name"];
                $_SESSION["email"] = $row_user_email["email"];
                $_SESSION["phone"] = $row_user_email["phone"];
                $_SESSION["pass"] = $row_user_email["pass"];
                $_SESSION["address"] = $row_user_email["address"];
            }

            header("Refresh:0; url='http://localhost/php/mysql/icecream_website/user/profile_page/profile.php'");
            return;

            //
        } else if ($login_email == $row_user["email"] && $login_pass != $row_user["pass"]) {

            $_SESSION["form_error"] = "Invalid Password";
            header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/form/login_form.php");
            return;

            //
        } else if ($login_email != $row_user["email"]) {


            $sel_admin = $conn->prepare("SELECT * FROM `admin_login_data`");
            $sel_admin->execute();
            $sel_admin = $sel_admin->fetchAll();

            foreach ($sel_admin as $row_admin) {

                if ($login_email == $row_admin["email"] && $login_pass == $row_admin["pass"]) {

                    $sel_admin_email = $conn->prepare("SELECT * FROM `admin_login_data` WHERE email='$login_email'");
                    $sel_admin_email->execute();
                    $sel_admin_email = $sel_admin_email->fetchAll();

                    foreach ($sel_admin_email as $row_admin_email) {
                        $_SESSION["name"] = $row_admin_email["name"];
                        $_SESSION["email"] = $row_admin_email["email"];
                        $_SESSION["pass"] = $row_admin_email["pass"];
                        $_SESSION["phone"] = $row_admin_email["phone"];
                    }

                    header("Refresh:0; url='http://localhost/php/mysql/icecream_website/admin/index.php'");
                    return;

                    //
                } else if ($login_email == $row_admin["email"] && $login_pass != $row_admin["pass"]) {

                    $_SESSION["form_error"] = "Invalid Password";
                    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/form/login_form.php");
                    return;

                    //
                } else if ($login_email != $row_admin["email"]) {

                    $_SESSION["form_error"] = "Invalid Email ID";
                    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/form/login_form.php");

                    //
                }
            }
        } else {

            $_SESSION["form_error"] = "Invalid Email ID";
            header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/form/login_form.php");
            return;

            //
        }
    }
}


//! If email is exist in admin & user
if (isset($_GET["admin_email"])) {
    $sel_admin_email = $conn->prepare("SELECT * FROM `admin_login_data` WHERE email='".$_GET["admin_email"]."'");
    $sel_admin_email->execute();
    $sel_admin_email = $sel_admin_email->fetchAll();

    foreach ($sel_admin_email as $row_admin_email) {
        $_SESSION["name"] = $row_admin_email["name"];
        $_SESSION["email"] = $row_admin_email["email"];
        $_SESSION["pass"] = $row_admin_email["pass"];
        $_SESSION["phone"] = $row_admin_email["phone"];
    }

    header("Refresh:0; url='http://localhost/php/mysql/icecream_website/admin/index.php'");
    return;
}

//
if (isset($_GET["user_email"])) {
    $sel_user_email = $conn->prepare("SELECT * FROM `user_login_data` WHERE email='".$_GET["user_email"]."'");
            $sel_user_email->execute();
            $sel_user_email = $sel_user_email->fetchAll();

            foreach ($sel_user_email as $row_user_email) {

                $_SESSION["profile_img"] = $row_user_email["profile_img"];
                $_SESSION["name"] = $row_user_email["name"];
                $_SESSION["email"] = $row_user_email["email"];
                $_SESSION["phone"] = $row_user_email["phone"];
                $_SESSION["pass"] = $row_user_email["pass"];
                $_SESSION["address"] = $row_user_email["address"];
            }

            header("Refresh:0; url='http://localhost/php/mysql/icecream_website/user/profile_page/profile.php'");
            return;
}
