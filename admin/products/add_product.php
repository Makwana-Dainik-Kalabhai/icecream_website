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


<body>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/header/header.php"); ?>

    <div id="layoutSidenav">
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/sidenav/sidenav.php"); ?>

        <style>
            form {
                width: 60%;
                margin: 10px auto !important;
                padding: 1px 20px;
            }

            input[type="submit"] {
                border: none;
                border-radius: 5px;
            }
        </style>

        <div id="layoutSidenav_content">

            <form action="add.php" method="post" class="row g-4 rounded-2 shadow bg-light" enctype="multipart/form-data">

                <?php if (isset($_SESSION["form_error"])) { ?>
                    <div class="col-md-12 mb-0">
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


                <fieldset class="form-control mt-1">
                    <legend class="fs-4">Product Img</legend>
                    <hr>
                    <input type="file" name="item_img" class="fs-6 w-100" required />
                </fieldset>

                <div class="col-md-6">
                    <span class="text-danger fs-5 d-block mb-1">Product Category</span>

                    <select class="fs-6 form-control" name="category" required>
                        <option value=""><--- Select Product Category ---></option>
                        <option value="cone">Cone</option>
                        <option value="candy">Candy</option>
                        <option value="kulfi">Kulfi</option>
                        <option value="ice-cream">Ice-cream</option>
                        <option value="family pack">Family Pack</option>
                    </select>
                </div>

                <div class="col-md-6 fs-5">
                    <span class="text-danger">Item Code</span>
                    <input type="text" name="item_code" class="form-control" placeholder="Product Item Code" required />
                </div>


                <div class="col-md-6 fs-5">
                    <span class="text-danger">Company</span>
                    <input type="text" name="company" class="form-control" value="COLDEE" required />
                </div>

                <div class="col-md-6 fs-5">
                    <span class="text-danger">Name</span>
                    <input type="text" name="product" class="form-control" placeholder="Product Name" required />
                </div>


                <div class="col-md-6 fs-5">
                    <span class="text-danger">Price</span>
                    <input type="number" name="price" class="form-control" placeholder="Product Price" required />
                </div>


                <div class="col-md-6 fs-5">
                    <span class="text-danger">Weight</span>
                    <input type="text" name="weight" class="form-control" placeholder="Product Weight" required />
                </div>

                <div class="col-md-12">
                    <span class="text-danger fs-5 d-block mb-1">Description</span>
                    <textarea name="description" rows="3" class="form-control" placeholder="Product Description" required></textarea>
                </div>


                <div class="col-12 mb-3 mt-3">
                    <input type="submit" value="ADD" class="bg-danger px-4 fs-5 text-white" />
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