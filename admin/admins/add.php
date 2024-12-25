<?php
session_start();

include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

if (isset($_POST["admin_name"]) && isset($_POST["admin_email"]) && isset($_POST["admin_pass"]) && isset($_POST["admin_phone"])) {
    $name = $_POST["admin_name"];
    $email = $_POST["admin_email"];
    $pass = $_POST["admin_pass"];
    $phone = $_POST["admin_phone"];


    $select = $conn->prepare("SELECT * FROM `admin_login_data`");
    $select->execute();
    $select = $select->fetchAll();

    foreach ($select as $row) {

        if ($email == $row["email"]) {

            $select_email = $conn->prepare("SELECT * FROM `admin_login_data` WHERE email='$email'");
            $select_email->execute();
            $select_email = $select_email->fetchAll();

            foreach ($select_email as $row_email) {

                $_SESSION["name"] = $row_email["name"];
                $_SESSION["email"] = $row_email["email"];
                $_SESSION["pass"] = $row_email["pass"];
                $_SESSION["phone"] = $row_email["phone"];
            }

            $_SESSION["form_error"] = "This Admin is already Exist";

            header("Refresh:0; url='http://localhost/php/mysql/icecream_website/admin/admins/add_admin.php'");
            return;
            //
        }
    }

    foreach ($select as $row) {

        $insert = $conn->prepare("INSERT INTO `admin_login_data` VALUES ('$name','$email','$pass','$phone','')");
        $insert->execute();

        $_SESSION["form_success"] = "Admin added Successfully";
        header("Refresh:0; url=http://localhost/php/mysql/icecream_website/admin/admins/add_admin.php");
        return;
    }
}
