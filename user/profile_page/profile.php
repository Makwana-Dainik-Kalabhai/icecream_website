<?php
session_start();

$profile_img = $_SESSION["profile_img"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$phone = $_SESSION["phone"];
$pass = $_SESSION["pass"];
$address = $_SESSION["address"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>
</head>

<style>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/profile_page/profile.css"); ?>
</style>

<script>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/profile_page/profile.js"); ?>
</script>


<body>
    <header>
        <img id="user_img" src="<?php echo $profile_img; ?>" />
        <h1>Hello! <?php echo $name; ?></h1>
    </header>

    <div id="fake_header"></div>

    <div id="profile_page">
        <div id="profile_img">
            <img src="<?php echo $profile_img; ?>" alt="" />
            <div id="name">
                <h1><?php echo $name; ?></h1>
                <span><?php echo $email; ?></span>
            </div>
        </div>

        <div id="profile_form">
            <div id="profile_operation">
                <button id="show_profile_btn"><i class="fa-regular fa-user"></i> Profile</button>
                <button id="edit_profile_btn"><i class="fa-regular fa-pen-to-square"></i> Edit Profile</button>
                <div id="underline"></div>
            </div>

            <form action="verify.php" method="post" id="show_profile" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Name </td>
                        <td>:</td>
                        <td><?php echo $name; ?></td>
                    </tr>
                    <tr>
                        <td>Email ID </td>
                        <td>:</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td>Phone no. </td>
                        <td>:</td>
                        <td><?php echo $phone; ?></td>
                    </tr>
                    <tr>
                        <td>Password </td>
                        <td>:</td>
                        <td>**********</td>
                    </tr>
                    <tr>
                        <td>Address </td>
                        <td>:</td>
                        <td><?php echo $address; ?></td>
                    </tr>
                </table>
                <div id="btns">
                    <button name="logout">Logout</button>
                    <a type="button" href="http://localhost/php/mysql/icecream_website/index.php">Next</a>
                </div>
            </form>
            <form action="verify.php" method="post" id="edit_profile">
                <table>
                    <tr>
                        <td>Name </td>
                        <td>:</td>
                        <td><input type="text" name="update_name" value="<?php echo $name; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Email ID </td>
                        <td>:</td>
                        <td><input type="email" name="email" value="<?php echo $email; ?>" disabled /></td>
                    </tr>
                    <tr>
                        <td>Phone no. </td>
                        <td>:</td>
                        <td><input type="text" pattern="*[0-9]" minlength="10" maxlength="10" name="update_phone" value="<?php echo $phone; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Password </td>
                        <td>:</td>
                        <td><input type="text" name="update_pass" value="<?php echo $pass; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td><textarea name="update_address" placeholder="Enter the Address"><?php echo $address; ?></textarea></td>
                    </tr>
                </table>
                <div id="btns">
                    <input type="submit" name="update_details" value="Update" />
                    <a href="#">Update profile picture</a>
                </div>
            </form>

            <div id="update_pic">
                <form action="verify.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Profile Picture Picture</legend>
                        <input type="file" name="update_img" required />
                    </fieldset>
                    <div id="btns">
                        <button name="update_img_btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>