<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/links.php"); ?>

    <style>
        <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/contact_us/drop_query.css"); ?>
    </style>
</head>

<script>
    <?php include("C:/xampp/htdocs/php/mysql/icecream_website/user/contact_us/drop_query.js"); ?>
</script>

<!-- //! This contact page is only for index.php -->
<div id="contact_page">
    <h1 id="heading">We hear YOU</h1>

    <div id="contact">
        <div id="company_details">
            <img src="http://localhost/php/mysql/icecream_website/user/contact_us/ice-cream.jpg" alt="">
            <div id="details">
                <span id="title">CORPORATE OFFICE</span>
                <span id="reach_us">Reach out to US</span>
                <span id="address">Coldee pvt. ltd. IOC road, Chandkheda, Ahmedabad Gujarat India 382424</span>
                <span id="number"><i class="fa-solid fa-phone-volume"></i>&emsp;022-9078-7856</span>
                <span id="email"><i class="fa-solid fa-envelope"></i>&emsp;dainikmakwana31@gmail.com</span>
            </div>
        </div>

        <div id="contact_form">
            <h1>Drop your queries</h1>

            <form action="http://localhost/php/mysql/icecream_website/user/contact_us/insert_query.php" method="post">
                <input type="text" name="name" placeholder="Name" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="text" name="phone" minlength="10" maxlength="10" placeholder="Phone" required />
                <input type="text" name="state" placeholder="State" required />
                <input type="text" name="city" placeholder="City" required />
                <input type="text" name="occupation" placeholder="Occupation" required />
                <textarea name="message" placeholder="Message" rows="3" required></textarea>
                <input type="submit" name="" value="Send" />
            </form>
        </div>
    </div>
</div>

</html>