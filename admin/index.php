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

    <?php include ("C:/xampp/htdocs/php/mysql/icecream_website/admin/links.php"); ?>

</head>


<body class="sb-nav-fixed">
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/header/header.php"); ?>

    <div id="layoutSidenav">
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/sidenav/sidenav.php"); ?>
        
        
        <div id="layoutSidenav_content">
            
            <main></main>
            
            
            <?php include("C:/xampp/htdocs/php/mysql/icecream_website/admin/footer/footer.php"); ?>
        </div>
    </div>
</body>

</html>