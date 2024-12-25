<?php

include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

$delete = $conn->prepare("DELETE FROM `shopping_items` WHERE item_code='".$_GET["item_code"]."'");
$delete->execute();

$_SESSION["remove_product"] = true;
header("Refresh:0; url='http://localhost/php/mysql/icecream_website/admin/products/view_products.php'");
?>