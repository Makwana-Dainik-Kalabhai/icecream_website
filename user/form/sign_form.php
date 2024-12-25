<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>
    <title>signUp Now</title>
</head>

<style>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/form/form.css"); ?>
</style>

<script>
    var app = angular.module("myApp", []);

    app.controller("myCon", function($scope) {

    });

    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/form/form.js"); ?>
</script>


<body ng-app="">
    <img id="login_bg" src="http://localhost/php/mysql/icecream_website/user/form/login_bg.jpg" alt="">

    <!-- signUp Form -->
    <div id="sign_form" class="regi_form">
        <h1 id="form_heading">SIGNUP NOW</h1>

        <?php
        if (isset($_SESSION["form_error"])) {
            echo "<div id='form_error'><i class='fa-solid fa-circle-info'></i>";
            echo $_SESSION["form_error"];
            echo "</div>";
        } ?>

        <form action="http://localhost/php/mysql/icecream_website/user/form/verify.php" method="post" name="sign_form" enctype="multipart/form-data">
            <fieldset>
                <legend>Profile Image</legend>
                <input type="file" name="profile_img" required />
            </fieldset>

            <div class="form_values">
                <label for="sign_name">Name: </label>
                <input type="text" name="sign_name" placeholder="Enter name" pattern="[A-Za-z ]*" required />
            </div>

            <div class="form_values">
                <label for="sign_email">Email: </label>
                <input type="email" name="sign_email" placeholder="Enter email" required />
            </div>


            <div class="form_values">
                <label for="sign_pass">Password: </label>

                <div>
                    <input type="password" class="pass" name="sign_pass" ng-model="pass" placeholder="Enter the password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                    <i class="show_pass pass_icon fa-regular fa-eye"></i><i class="hide_pass pass_icon fa-regular fa-eye-slash"></i>

                    <ul id="pass_description">
                        <li>Minimum 8 digits</li>
                        <li>One uppercase letter</li>
                        <li>One lowercase letter</li>
                    </ul>
                </div>
            </div>


            <div class="form_values">
                <label for="sign_cpass">Confirm Pass: </label>

                <div>
                    <input type="password" id="cpass" name="sign_cpass" ng-model="cpass" placeholder="Enter the confirm password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                    <i class="show_cpass pass_icon fa-regular fa-eye"></i><i class="hide_cpass pass_icon fa-regular fa-eye-slash"></i>
                    <p ng-show="pass!=null && cpass!=null && pass!=cpass"><i class='fa-solid fa-circle-info'></i>
                        Password & Confirm password is not same</p>
                </div>
            </div>

            <div class="form_btns">
                <input type="submit" value="signUp" name="sign_btn" ng-disabled="pass!=cpass" />
                <input type="reset" value="Reset" id="reset_btn" name="reset" />
                <a href="http://localhost/php/mysql/icecream_website/user/form/login_form.php" id="have_acc">Have a
                    account?</a>
            </div>
        </form>
    </div>
</body>

</html>

<?php
session_unset();
session_destroy();
?>