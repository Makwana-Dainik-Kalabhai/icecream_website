<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coldee</title>

  <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>

  <title>iceCream</title>

  <style>
    <?php include("index.css"); ?>
  </style>
</head>

<script>
  <?php
  include("index.js");
  ?>
</script>

<body>
  <header>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/header/header.php"); ?>
  </header>

  <main>
    <?php
    if (isset($_SESSION["task"])) { ?>

      <div id='task'>
        <li><?php echo $_SESSION["task"]; ?></li>
      </div>

    <?php unset($_SESSION["task"]);
    } ?>


    <!-- // !Page-1 -->
    <!-- Image Slider below nav2 -->
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/imgslider/imgSlider.php"); ?>

    <!-- // !Page-2 -->
    <!-- Test Now -->
    <div id="shopping_page">
      <div id="shopping_items">
        <h1>Try the <sub>Best Now....</sub></h1>

        <div id="items">
          <?php
          include("C:/xampp/htdocs/php/mysql/icecream_website/user/db_conn/connection.php");

          $select = $conn->prepare("SELECT * FROM shopping_items");
          $select->execute();
          $select = $select->fetchAll();


          foreach ($select as $row) { ?>

            <div id="box">
              <a href="http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php?item_code=<?php echo $row['item_code']; ?>">
                <img src="http://localhost/php/mysql/icecream_website/user/shop/shopping_items/<?php echo $row['item_img']; ?>" alt="">

                <div id="product_details">
                  <span id="name"><?php echo $row['product']; ?></span>
                  <span id="price">&#8377;<?php echo $row['price']; ?> (<?php echo $row['weight']; ?>)</span>
                </div>

                <div id="btn">
                  <a href="http://localhost/php/mysql/icecream_website/user/shop/product_details/product_details.php?item_code=<?php echo $row['item_code']; ?>" id="buy">Buy Now</a>
                </div>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>


    <!-- //! Page-3 -->
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/contact_us/drop_query.php"); ?>

  </main>

  <footer>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/footer/footer.php"); ?>
  </footer>
</body>

</html>