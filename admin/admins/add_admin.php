<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Coldee Admin Panel</title>

    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/links.php"); ?>
</head>

<style>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/admins/add_admin.css"); ?>
</style>

<script>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/admins/add_admin.js"); ?>
</script>

<body>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/header/header.php"); ?>

    <div id="layoutSidenav">
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/sidenav/sidenav.php"); ?>


        <div id="layoutSidenav_content">
                <form action="add.php" method="post" class="row g-4 rounded-2 shadow bg-light" id="add_admin_form">
                    <?php if (isset($_SESSION["form_error"])) { ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION["form_error"]; ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (isset($_SESSION["form_success"])) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_SESSION["form_success"]; ?>
                        </div>
                    <?php } ?>


                    <div class="col-md-12 mt-0">
                        <label for="name" class="form-label text-danger">User Name</label>
                        <input type="text" name="admin_name" class="form-control" id="name" placeholder="Enter your Name" required />
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label text-danger">Email</label>
                        <input type="email" name="admin_email" class="form-control" id="email" placeholder="Enter your Email" required />
                    </div>
                    <div class="col-md-6">
                        <label for="pass" class="form-label text-danger">Password</label>
                        <input type="password" name="admin_pass" class="form-control" id="pass" placeholder="Enter 8 digit Password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                        <li>Minimum 8 digits</li>
                        <li>One uppercase letter</li>
                        <li>One lowercase letter</li>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label text-danger">Phone no.</label>
                        <input type="password" name="admin_phone" class="form-control" id="phone" placeholder="Enter your Password" minlength="10" maxlength="10" />
                    </div>

                    <div class="col-12 mb-3 mt-4">
                        <input type="submit" value="ADD" class="bg-danger" />
                    </div>
                </form>

            <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/footer/footer.php"); ?>
        </div>
    </div>
</body>

</html>


<?php
if (isset($_SESSION["form_error"]) || isset($_SESSION["form_success"])) {
    unset($_SESSION["form_error"]);
    unset($_SESSION["form_success"]);
?>
    <script>
        setTimeout(() => {
            location.reload();
        }, 3000);
    </script>
<?php } ?>