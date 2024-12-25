<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Admins</title>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/links.php"); ?>
</head>

<style>
    body {
        width: 100%;
    }
    .admin_data a {
        color: white;
        border: none;
        border-radius: 3px;
        background-color: #ef000f;
        padding: 1px 10px;
        text-decoration: none;
    }


    .admin_data input {
        outline: none;
        width: max-content;
        padding: 1px 5px;
        border: 1px solid gray;
        border-radius: 3px;
        background-color: transparent;
    }
</style>


<body>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/header/header.php"); ?>

    <div id="layoutSidenav">
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/sidenav/sidenav.php"); ?>

        <div id="layoutSidenav_content">

            <main class="admin_data m-3 p-4">
                <h1 class="text-center fs-1 mb-4">Details of Admins</h1>
                
                <?php if (isset($_SESSION["update_admin"])) { ?>

                    <div id="page_success" class="text-center fs-4 text-success mb-3">Record updated successfully, where Email ID = <?php //echo $_SESSION["update_admin"]; ?> </div>
                <?php } ?>

                <?php if (isset($_SESSION["remove_admin"])) { ?>

                    <div id="page_success">Admin removed Successfully. </div>
                <?php } ?>

                <table class="table table-striped rounded-2 shadow-sm border">
                    <thead>
                        <tr>
                            <th class="border-2">No.</th>
                            <th>Name</th>
                            <th>Email ID</th>
                            <th>Password</th>
                            <th>Phone no.</th>
                            <th>Update/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/db_conn/connection.php");

                        $select = $conn->prepare("SELECT * FROM `admin_login_data`");
                        $select->execute();
                        $select = $select->fetchAll();

                        $num = 1;

                        foreach ($select as $row) : ?>
                            <form action="edit_admin.php" method="post">
                                <tr>
                                    <td class="border-2"><?php echo $num; ?></td>
                                    <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"></td>
                                    <td><input type="hidden" name="email" value="<?php echo $row["email"]; ?>" /><?php echo $row["email"]; ?></td>
                                    <td><input type="text" name="pass" value="<?php echo $row["pass"]; ?>"></td>
                                    <td><input type="text" name="phone" value="<?php echo $row["phone"]; ?>"></td>
                                    <td>
                                        <input type="submit" value="Edit" class="bg-danger text-white border-0 px-2 p-0" />
                                        <a href="remove_admin.php?email=<?php echo $row["email"]; ?>" class="bg-danger">Remove</a>
                                    </td>
                                </tr>
                            </form>
                            
                            <?php $num++;
                        endforeach; ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</body>

</html>


<?php
if (isset($_SESSION["update_admin"]) || isset($_SESSION["remove_admin"])) {
    unset($_SESSION["update_admin"]);
    unset($_SESSION["remove_admin"]);
?>
    <script>
        setTimeout(() => {
            location.reload();
        }, 3000);
    </script>
<?php } ?>