<?php
session_start();

include ("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");

$delete = $conn->prepare("DELETE FROM `cart` WHERE email='" . $_SESSION["email"] . "'");
$delete->execute();

header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/cart/cart.php");

?>