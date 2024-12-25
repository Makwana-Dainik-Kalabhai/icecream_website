<?php
session_start();

include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

if (isset($_POST["name"]) && isset($_POST["pass"]) && isset($_POST["phone"])) {

$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$phone = $_POST["phone"];

$update = $conn->prepare("UPDATE `admin_login_data` SET `name`='$name',`pass`='$pass',`phone`='$phone' WHERE email='$email'");
$update->execute();

$_SESSION["update_admin"] = $email;
header("Refresh:0; url='http://localhost/php/mysql/icecream_website/admin/admins/view_admins.php'");

}