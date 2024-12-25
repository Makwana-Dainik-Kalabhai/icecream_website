<?php
session_start();

include ("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");

if (isset($_POST["quantity"]) && isset($_POST["item_code"])) {

    $quantity = $_POST["quantity"];
    $item_code = $_POST["item_code"];

    $update = $conn->prepare("UPDATE `cart` SET `quantity`='$quantity' WHERE email='" . $_SESSION["email"] . "' AND item_code='$item_code'");
    $update->execute();

    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/cart/cart.php");
}

?>