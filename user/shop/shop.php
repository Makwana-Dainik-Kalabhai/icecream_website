<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>
    <title>Shop Now</title>
</head>

<style>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/shop/shop.css"); ?>
</style>

<script>
    <?php
    include("C:/xampp/htdocs/php/mysql/icecream_website/user/shop/shop.js");
    ?>
</script>


<body>
    <header>
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/header/header.php"); ?>
    </header>

    <main>
        <i class="fa-solid fa-arrow-right" id="display_cat"></i>
        <!-- Shopping Category -->
        <div id="left_category">
            <div id="category">
                <form action="" method="post" enctype="multipart/form-data">
                    <h1>Categories</h1>
                    
                    <div id="category_btns">
                        <a href="shop.php?cat=all" id="all_btn">All</a>
                        <a href="shop.php?cat=cone" id="cone_btn">Cone</a>
                        <a href="shop.php?cat=ice_cream" id="ice_cream_btn">Ice-cream</a>
                        <a href="shop.php?cat=kulfi" id="kulfi_btn">Kulfi</a>
                        <a href="shop.php?cat=candy" id="candy_btn">Candy</a>
                        <a href="shop.php?cat=family_pack" id="family_pack_btn">Family Pack</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Shopping Items -->
        <div id="shopping_items">
            <div id="items">

                <?php
                if (!isset($_GET["cat"])) {
                    $_GET["cat"] = "all";
                }

                include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");


                // This is for All
                if (isset($_GET["cat"]) && $_GET["cat"] == "all") { ?>

                    <script>
                        $(document).ready(function() {
                            $('#all_btn').css({
                                fontWeight: '600',
                                textDecoration: 'underline'
                            });
                        });
                    </script>

                    <?php
                    $getData = $conn->prepare("SELECT * FROM `shopping_items` ORDER BY sr_no DESC ");
                    $getData->execute();
                    $getData = $getData->fetchAll();

                    foreach ($getData as $row) { ?>

                        <a href='http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php?item_code=<?php echo $row['item_code']; ?>' id='box'>
                            <img src='http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row['item_img']; ?>' />

                            <div id='product_details'>
                                <span id="company"><?php echo $row['company']; ?></span>
                                <span id="name"><?php echo $row['product']; ?></span>
                                <span id="price">
                                    <span>Price: </span>&#8377;<?php echo $row['price']; ?> (<?php echo $row['weight']; ?>)
                                </span>
                            </div>
                        </a>
                    <?php }
                }

                // This is for cone
                if (isset($_GET["cat"]) && $_GET["cat"] == "cone") { ?>

                    <script>
                        $(document).ready(function() {
                            $('#cone_btn').css({
                                fontWeight: '600',
                                textDecoration: 'underline'
                            });
                        });
                    </script>

                    <?php
                    $getData = $conn->prepare("SELECT * FROM shopping_items WHERE category='cone'");
                    $getData->execute();
                    $getData = $getData->fetchAll();

                    foreach ($getData as $row) { ?>

                        <a href='http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php?item_code=<?php echo $row[' item_code']; ?></a>' id='box'>
                            <img src='http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row['item_img']; ?>' />

                            <div id='product_details'>
                                <span id="company"><?php echo $row['company']; ?></span>
                                <span id="name"><?php echo $row['product']; ?></span>
                                <span id="price">
                                    <span>Price: </span>&#8377;<?php echo $row['price']; ?> (<?php echo $row['weight']; ?>)
                                </span>
                            </div>
                        </a>
                    <?php }
                }

                if (isset($_GET["cat"]) && $_GET["cat"] == "ice_cream") { ?>

                    <script>
                        $(document).ready(function() {
                            $('#ice_cream_btn').css({
                                fontWeight: '600',
                                textDecoration: 'underline'
                            });
                        });
                    </script>

                    <?php
                    $getData = $conn->prepare("SELECT * FROM shopping_items WHERE category='ice-cream'");
                    $getData->execute();
                    $getData = $getData->fetchAll();

                    foreach ($getData as $row) { ?>
                        <a href='http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php?item_code=<?php echo $row[' item_code']; ?>' id='box'>

                            <img src='http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row['item_img']; ?>' />

                            <div id='product_details'>
                                <span id="company"><?php echo $row['company']; ?></span>
                                <span id="name"><?php echo $row['product']; ?></span>
                                <span id="price">
                                    <span>Price: </span>&#8377;<?php echo $row['price']; ?> (<?php echo $row['weight']; ?>)
                                </span>
                            </div>
                        </a>
                    <?php }
                }

                // This is for kulfi
                if (isset($_GET["cat"]) && $_GET["cat"] == "kulfi") { ?>

                    <script>
                        $(document).ready(function() {
                            $('#kulfi_btn').css({
                                fontWeight: '600',
                                textDecoration: 'underline'
                            });
                        });
                    </script>

                    <?php
                    $getData = $conn->prepare("SELECT * FROM shopping_items WHERE category='kulfi'");
                    $getData->execute();
                    $getData = $getData->fetchAll();

                    foreach ($getData as $row) { ?>
                        <a href='http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php?item_code=<?php echo $row[' item_code'];  ?>' id='box'>

                            <img src='http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row['item_img'];  ?>' />

                            <div id='product_details'>
                                <span id="company"><?php echo $row['company'];  ?></span>
                                <span id="name"><?php echo $row['product'];  ?></span>
                                <span id="price">
                                    <span>Price: </span><?php echo $row['price'];  ?> (<?php echo $row['weight'];  ?>)
                                </span>
                            </div>
                        </a>
                    <?php }
                }


                // This is for candy
                if (isset($_GET["cat"]) && $_GET["cat"] == "candy") { ?>

                    <script>
                        $(document).ready(function() {
                            $('#candy_btn').css({
                                fontWeight: '600',
                                textDecoration: 'underline'
                            });
                        });
                    </script>

                    <?php
                    $getData = $conn->prepare("SELECT * FROM shopping_items WHERE category='candy'");
                    $getData->execute();
                    $getData = $getData->fetchAll();

                    foreach ($getData as $row) { ?>
                        <a href='http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php?item_code=<?php echo $row[' item_code'];  ?>' id='box'>

                            <img src='http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row['item_img'];  ?>' />

                            <div id='product_details'>
                                <span id="company"><?php echo $row['company'];  ?></span>
                                <span id="name"><?php echo $row['product'];  ?></span>
                                <span id="price">
                                    <span>Price: </span><?php echo $row['price'];  ?> (<?php echo $row['weight'];  ?>)
                                </span>
                            </div>
                        </a>
                    <?php }
                }


                // This is for Family Pack
                if (isset($_GET["cat"]) && $_GET["cat"] == "family_pack") { ?>

                    <script>
                        $(document).ready(function() {
                            $('#family_pack_btn').css({
                                fontWeight: '600',
                                textDecoration: 'underline'
                            });
                        });
                    </script>


                    <?php
                    $getData = $conn->prepare("SELECT * FROM shopping_items WHERE category='family pack'");
                    $getData->execute();
                    $getData = $getData->fetchAll();

                    foreach ($getData as $row) { ?>
                        <a href='http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php?item_code=<?php echo $row[' item_code'];  ?>' id='box'>

                            <img src='http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row['item_img'];  ?>' />

                            <div id='product_details'>
                                <span id="company"><?php echo $row['company'];  ?></span>
                                <span id="name"><?php echo $row['product'];  ?></span>
                                <span id="price">
                                    <span>Price: </span><?php echo $row['price'];  ?> (<?php echo $row['weight'];  ?>)
                                </span>
                            </div>
                        </a>
                <?php }
                } ?>
            </div>
        </div>

        <div id="hide_category"></div>
    </main>

    <footer>
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/footer/footer.php"); ?>
    </footer>
</body>

</html>