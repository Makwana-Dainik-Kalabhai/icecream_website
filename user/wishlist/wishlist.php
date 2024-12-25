<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>

    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>
</head>

<style>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/wishlist/wishlist.css"); ?>
</style>

<script>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/wishlist/wishlist.js"); ?>
</script>

<body>
    <header>
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/header/header.php"); ?>
    </header>

    <main>
        <?php
        if ($wishlist_items != 0) { ?>

            <div id='wishlist'>
                <div id='wishlist_header'>

                    <?php
                    if (isset($wishlist_items) && $wishlist_items != 0) { ?>
                        <h1>My Wishlist(<?php echo $wishlist_items; ?>)</h1>

                    <?php } ?>

                </div>


                <?php
                // Database
                include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");


                // Select wishlist items
                $select = $conn->prepare("SELECT * FROM `wishlist` WHERE email='" . $_SESSION["email"] . "'");
                $select->execute();
                $select = $select->fetchAll();

                foreach ($select as $row) { ?>

                    <div id='wishlist_items'>

                        <div id='items'>
                            <a href='http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php?item_code=<?php echo $row[' item_code']; ?>' id='box'>
                                <div id='item_img'>
                                    <img src='http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row['item_img']; ?>' />
                                </div>

                                <div id='item_details'>
                                    <h2 id='name'><?php echo $row["product"]; ?></h2>
                                    <h3 id='price'>&#8377; <?php echo $row["price"]; ?></h3>
                                    <p id='description'><?php echo $row["description"]; ?></p>
                                </div>
                            </a>
                            <a href='remove_item.php?remove_item_code=<?php echo $row['item_code']; ?>' id='remove_item'><i class='fa-solid fa-trash'></i></a>
                        </div>

                    <?php } ?>
                    </div>
            </div>
        <?php }


        if ($wishlist_items == 0) { ?>

            <div id='empty'>
                <h1>Your wishlist is empty, so add your favourites</h1>
                <a href='http://localhost/php/mysql/icecream_website/user/shop/shop.php'>Add your choice</a>
            </div>
        <?php } ?>
    </main>
</body>

</html>