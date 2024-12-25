<?php session_start(); ?>

<?php
include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");


$select = $conn->prepare("SELECT item_code FROM `wishlist` WHERE email='" . $_SESSION["email"] . "'");
$select->execute();
$select = $select->fetchAll();

$contain_item_code = "";
foreach ($select as $row) {

    if ($_SESSION["item_code"] == $row["item_code"]) {
        $contain_item_code = $row["item_code"];
        break;
    }
}


$sel_shop = $conn->prepare("SELECT * FROM `shopping_items` WHERE item_code='" . $_SESSION["item_code"] . "'");
$sel_shop->execute();
$sel_shop = $sel_shop->fetchAll();

foreach ($sel_shop as $row_shop) {

    if ($contain_item_code != $_SESSION["item_code"]) {
        $insert = $conn->prepare('INSERT INTO `wishlist` VALUES ("' . $_SESSION['email'] . '","' . $_SESSION["item_code"] . '", "' . $row_shop["item_img"] . '", "' . $row_shop["product"] . '", "' . $row_shop["price"] . '", "' . $row_shop["weight"] . '", "' . $row_shop["description"] . '")');
        $insert->execute();

        header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php");
        $_SESSION["task"] = "Product is inserted successfully into the wishlist";

        //
    } else {
        $delete = $conn->prepare("DELETE FROM `wishlist` WHERE email='" . $_SESSION['email'] . "' AND item_code='" . $_SESSION['item_code'] . "'");
        $delete->execute();

        header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php");
        $_SESSION["task"] = "Product is removed successfully from the wishlist";
    }
}

?>