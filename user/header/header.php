<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>

    <style>
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/header/header.css"); ?>
    </style>
</head>

<script>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/header/header.js"); ?>
</script>

<?php
include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");


if (isset($_SESSION["email"])) {

    // To get how many items are stored in wishlist for this user
    $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE email='" . $_SESSION["email"] . "'");
    $select_wishlist->execute();
    $select_wishlist = $select_wishlist->fetchAll();

    $wishlist_items = 0;

    foreach ($select_wishlist as $row_wishlist) {
        $wishlist_items++;
    }

    // To get how many items are stored in cart for this user
    $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE email='" . $_SESSION["email"] . "'");
    $select_cart->execute();
    $select_cart = $select_cart->fetchAll();

    $cart_items = 0;

    foreach ($select_cart as $row_cart) {
        $cart_items++;
    }
}
?>


<nav id="header">

    <!-- //! when screen size<650px then display left-side menu -->
    <?php
    if (!isset($_SESSION["email"])) { ?>
        <div id="left_menu_block" class="menu_block">
            <i id="hide_menu" class='fa-solid fa-bars'></i>
            <div class="menu_items">
                <div class="menus">
                    <a href="http://localhost/php/mysql/icecream_website/index.php"><i class="fa-solid fa-house"></i>&ensp;HOME</a>
                    <a href="http://localhost/php/mysql/icecream_website/user/about_us/about_us.php"><i class="fa-solid fa-address-card"></i>&ensp;ABOUT US</a>
                    <a href="http://localhost/php/mysql/icecream_website/user/shop/shop.php"><i class="fa-solid fa-bag-shopping"></i>&ensp;SHOP</a>

                    <?php
                    if (isset($_SESSION["email"])) { ?>
                        <a href='order.php'><i class="fa-solid fa-truck-fast"></i>&ensp;ORDER</a>
                    <?php } ?>

                    <a href="http://localhost/php/mysql/icecream_website/user/contact_us/contact.php"><i class="fa-solid fa-phone-volume"></i>&ensp;CONTACT US</a>
                </div>
            </div>
        </div>
    <?php } ?>


    <!-- //! This is main header -->
    <img id="left_logo" src="http://localhost/php/mysql/icecream_website/user/header/coldee.gif" alt="Company Logo">

    <div id="middle_btns">
        <a href="http://localhost/php/mysql/icecream_website/index.php">HOME</a>
        <a href="http://localhost/php/mysql/icecream_website/user/about_us/about_us.php">ABOUT US</a>
        <a href="http://localhost/php/mysql/icecream_website/user/shop/shop.php">SHOP</a>

        <?php
        if (isset($_SESSION["email"])) { ?>
            <a href='order.php'>ORDER</a>
        <?php } ?>

        <a href="http://localhost/php/mysql/icecream_website/user/contact_us/contact.php">CONTACT US</a>
    </div>



    <!-- //! When user is logged in then display right-side menu -->
    <?php
    if (isset($_SESSION["email"])) {

        $name = $_SESSION["name"];
        $email = $_SESSION["email"]; ?>

        <div id="right_menu_block" class="menu_block">
            <i id='menu' class='fa-solid fa-bars'></i>

            <div class='menu_items'>
                <div id='profile'>
                    <div id='user_first_char'>
                        <h1><?php echo substr($name, 0, 1); ?></h1>
                    </div>

                    <div id='profile_details'>
                        <span id="name"><?php echo $name; ?></span>
                        <span id="email"><?php echo $email; ?></span>

                        <form action='' method='post'>
                            <input type='submit' name='logout' value='Logout' />
                        </form>
                    </div>
                    <hr>
                    <div class='menus'>
                        <div id="hide_menus">
                            <a href="http://localhost/php/mysql/icecream_website/index.php"><i class="fa-solid fa-house"></i>&ensp;HOME</a>
                            <a href="http://localhost/php/mysql/icecream_website/user/about_us/about_us.php"><i class="fa-solid fa-address-card"></i>&ensp;ABOUT US</a>
                            <a href="http://localhost/php/mysql/icecream_website/user/shop/shop.php"><i class="fa-solid fa-bag-shopping"></i>&ensp;SHOP</a>

                            <?php
                            if (isset($_SESSION["email"])) { ?>
                                <a href='order.php'><i class="fa-solid fa-truck-fast"></i>&ensp;ORDER</a>
                            <?php } ?>

                            <a href="http://localhost/php/mysql/icecream_website/user/contact_us/contact.php"><i class="fa-solid fa-phone-volume"></i>&ensp;CONTACT US</a>
                        </div>
                        <a href='http://localhost/php/mysql/icecream_website/user/profile_page/profile.php'>
                            <i class='fa-solid fa-user'></i>&ensp;Profile Page
                        </a>
                        <a href='http://localhost/php/mysql/icecream_website/user/wishlist/wishlist.php'>
                            <i class='fa-solid fa-heart'></i>&ensp;My Wishlist&ensp;

                            <?php if ($wishlist_items != 0) { ?>

                                <span id='like_count'><?php echo $wishlist_items; ?></span>

                            <?php } ?>
                        </a>

                        <a href='http://localhost/php/mysql/icecream_website/user/cart/cart.php'><i class='fa-solid fa-cart-shopping'></i>&ensp;My Cart&ensp;

                            <?php if ($cart_items != 0) { ?>
                                <span id='cart_count'><?php echo $cart_items; ?></span>

                            <?php } ?>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    <?php }

    //
    else { ?>
        <!-- header right sign & login btns -->
        <div id='login_btns'>
            <a href='http://localhost/php/mysql/icecream_website/user/form/sign_form.php' id='sign'>signUp<i class='fa-solid fa-user-plus'></i></a>
            <a href='http://localhost/php/mysql/icecream_website/user/form/login_form.php' id='login'>Login<i class='fa-solid fa-right-to-bracket'></i></a>
        </div>

    <?php } ?>




</nav>
<nav id="fake_header"></nav>





<?php
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy(); ?>

    <script>
        var startpt = (window.history.length - 4) * -1;
        window.history.go(startpt);
    </script>

<?php } ?>

</html>