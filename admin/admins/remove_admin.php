<?php
session_start();

include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

$delete = $conn->prepare("DELETE FROM `admin_login_data` WHERE email='".$_GET["email"]."'");
$delete->execute();

$_SESSION["remove_admin"] = true;
header("Refresh:0; url='http://localhost/php/mysql/icecream_website/admin/admins/view_admins.php'");

?>