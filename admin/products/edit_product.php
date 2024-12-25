<?php
session_start();

include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

if (isset($_FILES["item_img"]) && isset($_POST["product"]) && isset($_POST["price"]) && isset($_POST["weight"]) && isset($_POST["description"])) {

    $category = $_POST["category"];
    $item_img = $_FILES["item_img"]["name"];

    
    $product = $_POST["product"];
    $price = $_POST["price"];
    $weight = $_POST["weight"];
    $description = $_POST["description"];

    $item_code = $_SESSION["item_code"];

    $update = $conn->prepare('UPDATE `shopping_items` SET `category`="' . $category . '", `item_img`="' . $item_img . '", `product`="' . $product . '",`price`="' . $price . '", `weight`="' . $weight . '", `description`="' . $description . '" WHERE `item_code`="' . $item_code . '"');
    $update->execute();

    $_SESSION["update_description"] = true;

    header("Refresh:0; url='http://localhost/php/mysql/icecream_website/admin/products/product_details.php'");
}
