<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>

    <script src="http://localhost/php/mysql/icecream_website/jquery-3.7.1.js"></script>


    <!-- Data Table Links -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>


    <!-- Bootstrap Links -->
    <link href="http://localhost/php/mysql/icecream_website/admin/css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">


    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<style>
    .product_details img {
        width: 150px;
        border-radius: 15px;
    }

    .product_details a:first-child {
        color: white;
        border: none;
        border-radius: 3px;
        padding: 1px 10px;
        text-decoration: none;
    }
</style>

<script>
    $(document).ready(() => {
        $("#product_table").DataTable();
    });
</script>


<body>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/header/header.php"); ?>

    <div id="layoutSidenav">
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/sidenav/sidenav.php"); ?>

        <div id="layoutSidenav_content">

            <main class="product_details m-3 p-4">
                <h1 class="text-center fs-1 mb-4">Details of Products</h1>
                <?php if (isset($_SESSION["remove_product"])) { ?>

                    <div id="page_success" class="text-center fs-4 text-success">Product removed Successfully.</div>
                <?php } ?>

                <table class="table table-striped rounded-2 shadow-sm border" id="product_table">
                    <thead class="fs-5">
                        <tr>
                            <th class="border-2">No.</th>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Weight</th>
                            <th>Update/Delete</th>
                        </tr>
                    </thead>
                    <tbody class="fs-5">
                        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

                        $select = $conn->prepare("SELECT * FROM `shopping_items`");
                        $select->execute();
                        $select = $select->fetchAll();

                        $num = 1;

                        foreach ($select as $row) { ?>
                            <tr>
                                <td class="border-2"><?php echo $num; ?></td>
                                <td><img src="http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row['item_img'];  ?>" /></td>
                                <td class="text-capitalize"><?php echo $row["product"]; ?></td>
                                <td>&#8377;<?php echo $row["price"]; ?></td>
                                <td><?php echo $row["weight"]; ?></td>
                                <td>
                                    <a href="remove_product.php?item_code=<?php echo $row["item_code"]; ?>" class="bg-danger">Remove</a>&ensp;
                                    <a href="product_details.php?item_code=<?php echo $row["item_code"]; ?>">View</a>
                                </td>
                            </tr>

                        <?php $num++;
                        } ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</body>

</html>


<?php
if (isset($_SESSION["remove_product"])) {
    unset($_SESSION["remove_product"]);
?>
    <script>
        setTimeout(() => {
            location.reload();
        }, 3000);
    </script>
<?php } ?>