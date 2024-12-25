<?php
session_start();

include ("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");

if (isset($_POST["new_address"])) {

    $update = $conn->prepare("UPDATE `user_login_data` SET `address`='" . $_POST["new_address"] . "' WHERE email='" . $_SESSION["email"] . "'");
    $update->execute();

    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/order/buy_cart.php");
}

?>