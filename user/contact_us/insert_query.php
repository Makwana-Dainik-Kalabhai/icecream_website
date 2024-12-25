<?php
session_start();

include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["state"]) && isset($_POST["city"]) && isset($_POST["occupation"]) && isset($_POST["message"])) {

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$state = $_POST["state"];
$city = $_POST["city"];
$occupation = $_POST["occupation"];
$message = $_POST["message"];

$insert = $conn->prepare("INSERT INTO `user_query` VALUES ('$name','$email','$phone','$state','$city', NOW() ,'$occupation','$message')");
$insert->execute();

$_SESSION["task"] = "Query sent successfully";

header("Refresh:0; url=http://localhost/php/mysql/icecream_website/index.php");
}

?>