<?php
session_start();

if (isset($_GET["item_code"])) {
    $_SESSION["item_code"] = $_GET["item_code"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Info...</title>

    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>
</head>

<style>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/shop/product_details/product_details.css"); ?>
</style>

<script>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/shop/product_details/product_details.js"); ?>
</script>


<?php
include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");
?>

<body>
    <header>
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/header/header.php"); ?>
    </header>

    <main>
        <img id="background" src="bg.avif" alt="">
        <img id="hide_background" src="bg.avif" alt="">
        <?php
        if (isset($_SESSION["task"])) { ?>

            <div id='task'>
                <span><?php echo $_SESSION["task"]; ?></span>
            </div>

        <?php unset($_SESSION["task"]);
        } ?>

        <div id="product_info">
            <div id="product_img">
                <div id="img">

                    <?php

                    $select = $conn->prepare("SELECT * FROM `shopping_items` WHERE item_code='" . $_SESSION['item_code'] . "'");
                    $select->execute();
                    $select = $select->fetchAll();

                    foreach ($select as $row) { ?>

                        <!-- This is product Image -->
                        <img src='http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row['item_img']; ?>' alt=''>


                        <!-- This is like btn -->
                        <!-- If the user is not logged in, so that it redirects to the login form -->
                        <?php
                        if (!isset($_SESSION["email"])) { ?>
                            <a href='http://localhost/php/mysql/icecream_website/user/form/login_form.php' id="like_btn"><i class='fa-solid fa-heart'></i></a>

                            <?php }


                        // If the user is not logged in, so that it will insert to wishlist

                        if (isset($_SESSION["email"])) {
                            $select_item_code = $conn->prepare("SELECT * FROM `wishlist` WHERE email='" . $_SESSION["email"] . "' AND item_code='" . $_SESSION["item_code"] . "'");
                            $select_item_code->execute();
                            $select_item_code = $select_item_code->fetchAll();


                            foreach ($select_item_code as $item_code) {
                                $contain_item_code = $item_code["item_code"];
                            }

                            // If this is item is already inserted into the wishlist, so that it's color is red
                            if (isset($contain_item_code) && $contain_item_code == $_SESSION["item_code"]) { ?>
                                <a href='verify_wishlist.php' style='color: #ef000f;' id="like_btn"><i class='fa-solid fa-heart'></i></a>

                            <?php }

                            // If this is item is not inserted into the wishlist, so that it's color is black 
                            else { ?>
                                <a href='verify_wishlist.php' style='color: black;' id="like_btn"><i class='fa-solid fa-heart'></i></a>

                    <?php }
                        }

                        // This values are asign to the variables to display it in product details
                        $company = $row["company"];
                        $product = $row["product"];
                        $price = $row["price"];
                        $weight = $row["weight"];
                        $description = $row["description"];
                    }
                    ?>
                </div>
                <div id="btns">

                    <!-- Buy & Add to cart btn -->

                    <!-- If user is not logged in, so that redirect to login page -->
                    <?php
                    if (!isset($_SESSION["email"])) { ?>

                        <a href='http://localhost/php/mysql/icecream_website/user/form/login_form.php'><i class='fa-solid fa-bag-shopping'></i> Buy Now</a>
                        <a href='http://localhost/php/mysql/icecream_website/user/form/login_form.php'><i class='fa-solid fa-cart-plus'></i> Add to Cart</a>

                    <?php }

                    // If user is logged in, so that he/she can buy or add product to the cart
                    if (isset($_SESSION["email"])) { ?>

                        <a href='verify_cart.php'><i class='fa-solid fa-bag-shopping'></i> Buy Now</a>
                        <a href='verify_cart.php'><i class='fa-solid fa-cart-plus'></i> Add to Cart</a>
                    <?php } ?>
                </div>
            </div>

            <!-- Product Details -->
            <div id="product_details">
                <h1 id="company"><?php echo $company; ?></h1>
                <h2 id="product"><?php echo $product; ?></h2>

                <h4 id="price">&#8377;<?php echo $price; ?> <h5 id="weight">(<?php echo $weight; ?>)</h5></h4>
                <p id="description"><?php echo $description; ?></p>
            </div>
            <p id="hide_description"><?php echo $description; ?></p>
        </div>
    </main>
    <footer>
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/footer/footer.php"); ?>
    </footer>
</body>

</html>