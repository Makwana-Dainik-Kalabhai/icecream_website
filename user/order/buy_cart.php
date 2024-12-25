<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Now</title>

    <?php include ("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>
</head>

<style>
    <?php include ("C:/xampp/htdocs/php/mysql/icecream_website/user/order/buy_cart.css"); ?>
</style>

<script>
    <?php include ("C:/xampp/htdocs/php/mysql/icecream_website/user/order/buy_cart.js"); ?>
</script>

<?php
// Database 
include ("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");
?>

<body>
    <header>
        <div id="logo">
            <img src="http://localhost/php/mysql/icecream_website/user/header/coldee.gif" alt="Company Logo">
            <h1>COLDEE</h1>
        </div>
        <div>
            <h1>Purchase<span>Order</span></h1>
        </div>
    </header>

    <main>

        <!-- Company Use Details -->
        <div id="company_user_details">
            <div id="company_details">
                <h1 class="heading">Vendor</h1>
                <div class="details">
                    <span class="name">Coldee pvt. ltd.</span>
                    <span class="address">Ahmedabad Gujarat.</span>
                </div>
            </div>
            <div id="user_details">
                <h1 class="heading">Shipping To</h1>
                <div class="details">
                    <span class="name">User Name</span>
                    <span class="address">D/302 Mangalmurti Heights near Dev Prime Chandkheda Ahmedabad</span>
                </div>
            </div>
        </div>


        <details>
            <summary>Change Address</summary>
            <div id="new_address">
                <form action="update_address.php" method="post">
                    <span>New Address...</span>
                    <textarea
                        name="new_address">D/302 Mangalmurti Heights near Dev Prime Chandkheda Ahmedabad</textarea>

                    <input type="submit" value="Change" />
                </form>
            </div>
        </details>


        <!-- Order Details -->
        <div id="order_details">
            <div>
            <input type="checkbox" name="" id="">
            <img src='http://localhost/php/mysql/icecream_website/user/shop/shopping_items/alphonso_mango.jpg'/>
            <span>Alphonso Mango</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Product name</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alphonso Mango</td>
                        <td>10</td>
                        <td>&#8377;100</td>
                        <td>&#8377;1000</td>
                    </tr>
                    <tr id="total">
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>&#8377;5000</td>
                    </tr>
                </tbody>
            </table>
        </div>



        <div id="payment_type">
            <span>Select Payment Type: </span>
            <select name="payment_type">
                <option value="Cash On Delivery">Cash On Delivery</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Google Pay">Google Pay</option>
                <option value="Paytm">Paytm</option>
                <option value="Phone Pe">Phone Pe</option>
            </select>
        </div>


        <!-- Order Payment Form -->
         <div id="payment_form">
            <form action="" method="post">
                <input type="submit" value="Order Now">
            </form>
         </div>
    </main>
</body>

</html>