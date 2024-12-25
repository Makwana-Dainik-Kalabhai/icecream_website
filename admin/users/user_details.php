<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/links.php"); ?>

</head>


<style>
    main {
        height: 600px;
        overflow: auto;
    }

    ::-webkit-scrollbar {
        width: 0px;
    }
    
    #wishlist img {
        width: 150px;
    }

    #cart img {
        width: 150px;
    }

</style>


<body>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/header/header.php"); ?>

    <div id="layoutSidenav">
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/sidenav/sidenav.php"); ?>


        <div id="layoutSidenav_content">

            <main>

                <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

                $sel_user = $conn->prepare("SELECT * FROM `user_login_data` WHERE email='" . $_GET["email"] . "'");
                $sel_user->execute();
                $sel_user = $sel_user->fetchAll();

                $num = 1;

                foreach ($sel_user as $row) { ?>

                    <section class="h-100 gradient-custom-2">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center">
                                <div class="col col-lg-9 col-xl-8">
                                    <div class="card">
                                        <div class="rounded-top d-flex flex-row bg-danger-subtle">

                                            <!-- This is user Profile picture -->
                                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 160px;">
                                                <img src="http://localhost/php/mysql/icecream_website/user/profile_page/<?php echo $row["profile_img"]; ?>" alt="" class="img-fluid img-thumbnail mt-4 mb-2">
                                            </div>

                                            <!-- User Name and Email -->
                                            <div class="ms-3" style="margin-top: 130px;">
                                                <h5><?php echo $row["name"]; ?></h5>
                                                <p><?php echo $row["email"]; ?></p>
                                            </div>
                                        </div>



                                        <!-- This is user about section -->
                                        <div class="card-body p-4 text-black">
                                            <div class="mb-5  text-body">
                                                <h2 class="mb-3 text-danger">About</h2>
                                                <hr>
                                                <div class="p-4 bg-body-tertiary">
                                                    <p class="font-italic mb-1">Phone:&emsp;<?php echo $row["phone"]; ?></p>
                                                    <p class="font-italic mb-1">Address:&emsp;<?php echo $row["address"]; ?></p>
                                                    <p class="font-italic mb-0">Photographer</p>
                                                </div>
                                            </div>

                                        <?php } ?>




                                        <!-- This is user Wishlist -->
                                        <details>
                                            <summary class="fs-2 text-danger">
                                                <h2 class="d-inline text-danger fs-3">Wishlist</h2>
                                            </summary>
                                            <hr>

                                            <div id="wishlist">

                                                <table class="w-100 rounded-2 overflow-hidden">
                                                    <thead class="bg-secondary text-white text-center fs-5 border-1">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Product Name</th>
                                                            <th>Product Price</th>
                                                            <th>Product Weight</th>
                                                        </tr>
                                                    </thead>

                                                    <?php
                                                    $sel_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE email='" . $_GET['email'] . "'");
                                                    $sel_wishlist->execute();
                                                    $sel_wishlist = $sel_wishlist->fetchAll();


                                                    foreach ($sel_wishlist as $row_wishlist) {

                                                        $sel_item = $conn->prepare("SELECT * FROM `shopping_items` WHERE item_code='" . $row_wishlist['item_code'] . "'");
                                                        $sel_item->execute();
                                                        $sel_item = $sel_item->fetchAll(); ?>

                                                        <tbody class="bg-light border-1 text-center">

                                                            <?php
                                                            foreach ($sel_item as $row_item) { ?>

                                                                <tr>
                                                                    <td><img src="http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row_item["item_img"]; ?>" alt="Image not found" class="rounded-4"></td>
                                                                    <td><?php echo $row_item["product"]; ?></td>
                                                                    <td><?php echo $row_item["price"]; ?></td>
                                                                    <td><?php echo $row_item["weight"]; ?></td>
                                                            <?php }
                                                        } ?>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </details>







                                        <!-- This is user Cart -->
                                        <details>
                                            <summary class="fs-2 text-danger">
                                                <h2 class="d-inline text-danger fs-3">Cart</h2>
                                            </summary>
                                            <hr>

                                            <div id="cart">

                                                <table class="w-100 rounded-2 overflow-hidden">
                                                    <thead class="bg-secondary text-white text-center fs-5 border-1">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Product Name</th>
                                                            <th>Product Price</th>
                                                            <th>Product Weight</th>
                                                        </tr>
                                                    </thead>

                                                    <?php
                                                    $sel_cart = $conn->prepare("SELECT * FROM `cart` WHERE email='" . $_GET['email'] . "'");
                                                    $sel_cart->execute();
                                                    $sel_cart = $sel_cart->fetchAll();


                                                    foreach ($sel_cart as $row_cart) {

                                                        $sel_item = $conn->prepare("SELECT * FROM `shopping_items` WHERE item_code='" . $row_cart['item_code'] . "'");
                                                        $sel_item->execute();
                                                        $sel_item = $sel_item->fetchAll(); ?>

                                                        <tbody class="bg-light border-1 text-center">

                                                            <?php
                                                            foreach ($sel_item as $row_item) { ?>

                                                                <tr>
                                                                    <td><img src="http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row_item["item_img"]; ?>" alt="Image not found" class="rounded-4"></td>
                                                                    <td><?php echo $row_item["product"]; ?></td>
                                                                    <td><?php echo $row_item["price"]; ?></td>
                                                                    <td><?php echo $row_item["weight"]; ?></td>

                                                                    <!-- <div class="row g-2 w-100 bg-light rounded-3 my-2">
                                                        <div class="col d-flex m-3">
                                                            <img src="http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row_item["item_img"]; ?>" alt="Image not found" class="rounded-4">
                                                            <p class="fs-2 ms-4"><?php echo $row_item["product"]; ?></p>
                                                        </div>
                                                    </div> -->
                                                            <?php }
                                                        } ?>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </details>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            </main>


            <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/footer/footer.php"); ?>
        </div>
    </div>
</body>

</html>