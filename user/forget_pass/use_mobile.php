<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>
    <title>Document</title>
</head>

<style>
    <?php include ("C:/xampp/htdocs/php/mysql/icecream_website/user/forget_pass/forget_pass.css"); ?>
</style>

<body>
    <div id="forget_pass_form">
        <div id="left_div">
            <img src="http://localhost/php/mysql/icecream_website/user/forget_pass/forget_pass.jpg" />
        </div>
        <form>

            <div id="form_head">
                <h1> Forget something? </h1>
                <p> <i class="fa-solid fa-circle-info"></i> Enter your Mobile no. to receive Password reset instrunction
                </p>
            </div>

            <div id="mobile_input">
                <h2>Mobile Number*</h2>
                <input type="text" minlength="10" maxlength="10" name="phone" placeholder="1234567890" required />
            </div>

            <div id="form_footer">
                <p>OR</p>

                <a href="http://localhost/php/mysql/icecream_website/user/forget_pass/use_email.php">Use Email Address</a>
            </div>
            <input type="submit" name="submit" value="Send" />

        </form>
    </div>
</body>

</html>