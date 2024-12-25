<?php session_start(); ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>
    <title>Forget Password</title>

</head>

<style>
    <?php include('C:/xampp/htdocs/php/mysql/icecream_website/user/forget_pass/forget_pass.css'); ?>
</style>

<body>

    <main>
        <div id='left_div'>
            <img src='http://localhost/php/mysql/icecream_website/user/forget_pass/forget_pass.jpg' />
        </div>
        <div id='forget_pass_form'>

            <?php

            //This is for Form Error
            if (isset($_SESSION["forget_pass_error"])) { ?>

                <div id='form_error'><i class='fa-solid fa-circle-info'></i><?php echo $_SESSION["forget_pass_error"] ?></div>

            <?php }
            unset($_SESSION["forget_pass_error"]); ?>

            <!-- Main Form to Forget Password  -->
            <?php if (!isset($_SESSION["set_pass"])) { ?>

                <div id='form_head'>
                    <h1> Forget something? </h1>
                    <p> <i class='fa-solid fa-circle-info'></i> Enter your Email to receive Password reset instrunction </p>
                </div>

                <!-- Form Body to Enter the Email Address -->
                <form action='send_otp.php' method='post'>
                    <div id='form_body'>
                        <h2>Email*</h2>
                        <input type='email' name='email' placeholder='example123@gmail.com' required />


                        <?php if (!isset($_SESSION["otp"])) { ?>
                            <input type='submit' name='send_otp' id='send_otp' value='Send OTP' />

                        <?php } ?>


                        <?php if (isset($_SESSION["otp"])) { ?>
                            <p id='otp_sent_successfully'>OTP sent successfully</p>

                        <?php } ?>
                    </div>
                </form>

                <!-- Form Footer to Enter OTP -->
                <form action='submit_form.php' method='post'>
                    <div id='form_footer'>


                        <?php if (!isset($_SESSION["otp"])) { ?>
                            <a href='http://localhost/php/mysql/icecream_website/user/forget_pass/use_mobile.php' id='another_way'>Use Mobile number</a>

                        <?php } ?>


                        <?php if (isset($_SESSION["otp"])) { ?>
                            <div id='verify_otp'>
                                <input type='text' name='otp' placeholder='Enter OTP' />
                            </div>
                    </div>
                    <input type='submit' name='submit_form' id='submit_form' value='Send' />
                </form>
            <?php } ?>
        <?php } ?>








        <!-- This is Form-2 to set the password -->
        <?php
        // After OTP sent to the User, Set new password
        if (isset($_SESSION["set_pass"])) { ?>

            <form action='update_pass.php' method='post'>
                <div id='set_pass'>
                    <h1>Set your Password</h1>

                    <h3>Current Password</h3>
                    <input type='text' name='curr_pass' placeholder='Old Password' />

                    <h3>New Password</h3>
                    <input type='text' name='new_pass' placeholder='New Password' />

                    <input type='submit' name='update_pass' value='Update' />
                </div>
                <input type='submit' id='go_back_btn' name='go_back_btn' value='Go Back' />
            </form>


        <?php } ?>
        </div>
    </main>
</body>

</html>