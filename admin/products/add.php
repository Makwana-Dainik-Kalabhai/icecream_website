<?php
session_start();

include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

if (isset($_FILES["item_img"]) && isset($_POST["category"]) && isset($_POST["item_code"]) && isset($_POST["company"]) && isset($_POST["product"]) && isset($_POST["price"]) && isset($_POST["weight"]) && isset($_POST["description"])) {

    $category = $_POST["category"];
    $item_img = $_FILES["item_img"]["name"];
    $company = $_POST["company"];
    $product = $_POST["product"];
    $price = $_POST["price"];
    $weight = $_POST["weight"];
    $description = $_POST["description"];
    $item_code = $_POST["item_code"];


    $select = $conn->prepare("SELECT * FROM `shopping_items`");
    $select->execute();
    $select = $select->fetchAll();

    foreach ($select as $row) {

        if ($item_code == $row["item_code"]) {
            $_SESSION["form_error"] = "This Item Code is already exist.";

            header("Refresh:0; url=http://localhost/php/mysql/icecream_website/admin/products/add_product.php");
            return;
        }
    }

    foreach ($select as $row) {

        $insert = $conn->prepare("INSERT INTO `shopping_items` VALUES ('','$category','$item_img','$company','$product','$price','$weight','$description','$item_code')");
        $insert->execute();
        
        $_SESSION["form_success"] = "Product added Successfully";
        header("Refresh:0; url=http://localhost/php/mysql/icecream_website/admin/products/add_product.php");
        return;
    }
}
