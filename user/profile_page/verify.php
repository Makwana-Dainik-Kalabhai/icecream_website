<?php
session_start();

include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");

// Click on logout btn to logout from the website
if (isset($_POST["logout"])) {
    echo "<script>alert('Logout Successfully');</script>";
    session_unset();
    session_destroy();

    echo "<script>
        var startpt = ( window.history.length - 4) * -1;
        window.history.go(startpt);
        </script>";
}


// Edit Profile Details
if (isset($_POST["update_name"]) && isset($_POST["update_phone"]) && isset($_POST["update_pass"]) && isset($_POST["update_address"])) {

    $update_name = $_POST["update_name"];
    $update_phone = $_POST["update_phone"];
    $update_pass = $_POST["update_pass"];
    $update_address = $_POST["update_address"];


    $update = $conn->prepare("UPDATE `user_login_data` SET `name`='$update_name',`phone`='$update_phone',`pass`='$update_pass',`address`='$update_address' WHERE email='" . $_SESSION["email"] . "'");
    $update->execute();

    echo "<script> alert('Updated Successfully');</script>";

    $select = $conn->prepare("SELECT * FROM `user_login_data` WHERE email='" . $_SESSION["email"] . "'");
    $select->execute();
    $select = $select->fetchAll();

    foreach ($select as $row) {
        $_SESSION["profile_img"] = $row["profile_img"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["phone"] = $row["phone"];
        $_SESSION["pass"] = $row["pass"];
        $_SESSION["address"] = $row["address"];
    }

    header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/profile_page/profile.php");
}


// Update Profile Picture
if (isset($_POST["update_img_btn"])) {

    if (isset($_FILES["update_img"])) {
        $update_img = $_FILES["update_img"]["name"];
        $update = $conn->prepare("UPDATE user_login_data SET profile_img='$update_img' WHERE email='" . $_SESSION["email"] . "'");
        $update->execute();
    }


    $tmp_name = $_FILES["update_img"]["tmp_name"];
    move_uploaded_file($tmp_name, "C:/xampp/htdocs/php/mysql/icecream_website/user/profile_page/$update_img");
}

$select_img = $conn->prepare("SELECT profile_img FROM `user_login_data` WHERE email='" . $_SESSION["email"] . "'");
$select_img->execute();
$select_img = $select_img->fetchAll();

foreach ($select_img as $row) {
    $_SESSION["profile_img"] = $profile_img = $row["profile_img"];
}

header("Refresh:0; url=http://localhost/php/mysql/icecream_website/user/profile_page/profile.php");
