<?php
session_start();

include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

$delete = $conn->prepare("DELETE FROM `user_login_data` WHERE email='".$_GET["email"]."'");
$delete->execute();

header("Refresh:0; url='http://localhost/php/mysql/icecream_website/admin/users/view_users.php'");

?>