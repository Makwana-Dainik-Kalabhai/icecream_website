<?php session_start();

if (isset($_GET["item_code"])) {
    $_SESSION["item_code"] = $_GET["item_code"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/links.php"); ?>

</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    #page_success {
        margin-top: 2%;
        color: green;
        text-align: center;
    }
</style>

<body>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/header/header.php"); ?>

    <div id="layoutSidenav">
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/sidenav/sidenav.php"); ?>


        <div id="layoutSidenav_content">

            <main>

                <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

                $sel_user = $conn->prepare("SELECT * FROM `shopping_items` WHERE item_code='" . $_SESSION["item_code"] . "'");
                $sel_user->execute();
                $sel_user = $sel_user->fetchAll();

                $num = 1;

                foreach ($sel_user as $row) { ?>

                    <div class="d-flex bg-light p-4" style="width:70%;margin: 2% 0 0 10%;border:2px solid;border-radius:10px;">
                        <!-- This is product image -->
                        <div style="width:60%;">
                            <img src="http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row["item_img"]; ?>" style="width:100%;border-radius:10px;" />
                        </div>

                        <!-- product details -->
                        <div class="ms-2 p-3" style="width:100%">
                            <h5 class="text-success fs-1 text-capitalize"><?php echo $row["product"]; ?></h5>
                            <p class="fs-4">&#8377;<?php echo $row["price"]; ?> (<?php echo $row["weight"]; ?>)</p>
                            <p class="fs-5 text-secondar"><?php echo $row["description"]; ?></p>

                        </div>
                    </div>

                    <div class="bg-light p-4" style="width:fit-content;margin: 4% auto;border:2px solid;border-radius:10px;">
                        <style>
                            table {
                                text-align: center;
                                background-color: white;
                                border: 1px solid;
                            }

                            table td {
                                padding: 10px 0;
                            }

                            form input {
                                border-radius: 5px;
                                margin-top: 10px;
                            }

                            form textarea {
                                width: 100%;
                                padding: 5px;
                                padding-left: 10px;
                            }

                            table input {
                                width: 80%;
                                border: 1px solid;
                                border-radius: 5px;
                                padding-left: 10px;
                            }

                            tbody input[type="file"] {
                                width: 80%;
                                border: none;
                            }

                            select {
                                border-radius: 5px;
                            }
                        </style>

                        <?php if (isset($_SESSION["update_description"])) { ?>
                            <div id="page_success" class="fs-2">Record updated successfully</div>
                        <?php } ?>
                        <form action="edit_product.php" method="post" enctype="multipart/form-data">
                            <h3 class="d-block text-danger fs-2">Update Product Details</h3>

                            <table class="w-100 my-4">
                                <thead class="fs-5">
                                    <tr class="border-1">
                                        <td class="pb-5 fs-4">Product Category:&ensp;
                                            <select class="fs-5" name="category">
                                                <option value="cone">Cone</option>
                                                <option value="candy">Candy</option>
                                                <option value="kulfi">Kulfi</option>
                                                <option value="ice-cream">Ice-cream</option>
                                                <option value="family pack">Family Pack</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Weight</th>
                                    </tr>
                                </thead>

                                <tbody class="fs-5">
                                    <tr>
                                        <td><input type="file" name="item_img" id="file" required /></td>
                                        <td><input type="text" name="product" value="<?php echo $row["product"]; ?>" required /></td>
                                        <td><input type="text" name="price" value="<?php echo $row["price"]; ?>" required /></td>
                                        <td><input type="text" name="weight" value="<?php echo $row["weight"]; ?>" required /></td>
                                    </tr>
                                </tbody>
                            </table>

                            <span class="text-danger fs-4">Product Description....</span>
                            <textarea rows="4" class="fs-5 text-secondar" name="description" required><?php echo $row["description"]; ?></textarea>
                            <input type="submit" value="Update" class="bg-danger text-white px-3 fs-5 border-0">
                        </form>
                    </div>

                <?php } ?>
            </main>


            <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/footer/footer.php"); ?>
        </div>
    </div>
</body>

</html>



<?php
if (isset($_SESSION["update_description"])) {
    unset($_SESSION["update_description"]);
?>
    <script>
        setTimeout(() => {
            location.reload();
        }, 3000);
    </script>
<?php } ?>