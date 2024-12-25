<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>
    <title>Login Now</title>
</head>

<style>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/form/form.css"); ?>
</style>

<script>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/form/form.js"); ?>
</script>


<body>
    <img id="login_bg" src="http://localhost/php/mysql/icecream_website/user/form/login_bg.jpg" alt="">

    <?php if (isset($_SESSION["admin_user"])) { ?>
        <div id="admin_user">
            <h1>Your email is exist in Admin & User so,</h1>
            <span>Go to : </span>
            <a href="verify.php?admin_email=<?php echo $_SESSION["email"]; ?>">Admin Panel</a>
            <a href="verify.php?user_email=<?php echo $_SESSION["email"]; ?>"">User Panel</a>
        </div>
    <?php } ?>



    <?php if (!isset($_SESSION["admin_user"])) { ?>
        <!-- Login Form -->
        <div id="login_form" class="regi_form">
            <h1 id="form_heading">LOGIN NOW</h1>

            <?php
            if (isset($_SESSION["form_error"])) { ?>
                <div id='form_error'><i class='fa-solid fa-circle-info'></i>
                    <?php echo $_SESSION["form_error"]; ?>
                </div>
            <?php } ?>

            <form action="http://localhost/php/mysql/icecream_website/user/form/verify.php" method="post" enctype="multipart/form-data">
                <div class="form_values">
                    <label for="login_email">Email ID: </label>
                    <input type="email" name="login_email" placeholder="Enter Email ID" required />
                </div>

                <div class="form_values">
                    <label for="login_pass">Password: </label>

                    <div>
                        <input type="password" class="pass" name="login_pass" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter the password" required />
                        <i class="show_pass pass_icon fa-regular fa-eye"></i><i class="hide_pass pass_icon fa-regular fa-eye-slash"></i>
                        <a href="http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php" id="forget_pass">Forgot Password</a>
                    </div>
                </div>

                <div class="form_btns">
                    <input type="submit" value="Login" name="login" id="login_btn" />
                    <input type="reset" value="Reset" id="reset_btn" name="reset" />
                    <a href="http://localhost/php/mysql/icecream_website/user/form/sign_form.php" id="not_acc">Create
                        account.</a>
                </div>
            </form>
        </div>

    <?php } ?>
</body>

</html>

<?php
session_unset();
session_destroy();
?>