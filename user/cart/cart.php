<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>

    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>
</head>

<style>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/cart/cart.css"); ?>
</style>

<script>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/cart/cart.js"); ?>
</script>

<?php
// Database
include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");
?>

<body>
    <header>
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/header/header.php"); ?>
    </header>


    <main>
        <?php

        // If Cart is not empty, then display Cart
        if ($cart_items != 0) { ?>

            <div id='cart'>
                <div id='cart_header'>
                    <h1>Product Img</h1>
                    <h1>Product Name</h1>
                    <h1>Product Price</h1>
                    <h1>Quantity</h1>
                </div>


                <?php
                $select = $conn->prepare("SELECT * FROM `cart` WHERE email='" . $_SESSION["email"] . "'");
                $select->execute();
                $select = $select->fetchAll();

                foreach ($select as $row) { ?>

                    <div id='items'>
                        <a href='http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php?item_code=<?php echo $row['item_code']; ?>' id='box'>
                            <div id='product_img'>
                                <img src='http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row["item_img"]; ?>'>
                            </div>

                            <div id='name'><?php echo $row["product"]; ?></div>
                            <div id='price'>&#8377;<?php echo $row["price"]; ?> (<?php echo $row["weight"]; ?>)</div>
                        </a>

                        <form action='update_quantity.php' method='post' id='quantity'>
                            <input type='number' name='quantity' value='<?php echo $row["quantity"]; ?>' />
                            <input type='hidden' name='item_code' value='<?php echo $row["item_code"]; ?>' />
                            <input type='submit' value='Update' />
                        </form>

                        <a href='remove_item.php?remove_item_code=<?php echo $row["item_code"]; ?>' id='remove_btn'><i class='fa-solid fa-trash'></i></a>
                    </div>
                <?php } ?>
            </div>



            <div id='bill'>
                <div id='bill_header'>
                    <h1>Total Bill Value</h1>
                </div>
                <div id='bill_values'>
                    <table>


                        <?php
                        $select = $conn->prepare("SELECT * FROM `cart` WHERE email='" . $_SESSION["email"] . "'");
                        $select->execute();
                        $select = $select->fetchAll();

                        $_SESSION["total_val"] = 0;

                        foreach ($select as $row) {
                            $_SESSION["mul_qua_price"] = $row["quantity"] * $row["price"];
                            $_SESSION["total_val"] += $_SESSION["mul_qua_price"]; ?>

                            <!-- Multiply quantity with price for every item -->
                            <tr>
                                <th><?php echo $row["product"]; ?><span> (<?php echo $row["quantity"]; ?>* &#8377;<?php echo $row["price"]; ?>)</span></th>
                                <td>&#8377;<?php echo $_SESSION["mul_qua_price"]; ?></td>
                            </tr>

                        <?php }

                        // Add Tax & Delivery charges into total value
                        $_SESSION["charges"] = ($_SESSION["total_val"] * 0.18);
                        $_SESSION["pay_val"] = ($_SESSION["total_val"] + $_SESSION["charges"] + 40); ?>

                    </table>
                </div>
                <div id='total_value'>
                    <table>
                        <tr>
                            <th>Total Value</th>
                            <td>&#8377;<?php echo $_SESSION["total_val"]; ?></td>
                        </tr>
                    </table>
                </div>
                <div id='charges'>
                    <table>
                        <tr>
                            <th>+TAX</th>
                            <td>&#8377;<?php echo $_SESSION["charges"]; ?></td>
                        </tr>
                        <tr>
                            <th>+Delivery Charges</th>
                            <td>&#8377;40</td>
                        </tr>
                    </table>
                </div>
                <div id='total_payble_value'>
                    <table>
                        <tr>
                            <th>Total Payble Value</th>
                            <td>&#8377;<?php echo $_SESSION["pay_val"]; ?></td>
                        </tr>
                    </table>
                </div>
                <div id='btns'>
                    <a href='http://localhost/php/mysql/icecream_website/user/order/buy_cart.php'><i class='fa-solid fa-bag-shopping'></i> Buy Now</a>
                    <a href='empty_cart.php'>Empty Cart</a>
                </div>
            </div>

        <?php }

        if ($cart_items == 0) { ?> <div id='empty'>
                <h1>Your Cart is empty, Add your choices</h1>
                <a href='http://localhost/php/mysql/icecream_website/user/shop/shop.php'>Add your choice</a>
            </div>
        <?php } ?>


    </main>
</body>

</html>