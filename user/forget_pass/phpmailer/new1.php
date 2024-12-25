<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

session_start();
$_SESSION['str'] = time();
echo "Start Time = " . $_SESSION['str'];



?>

<body>
    <form action="new3.php" method="post">
        <input type="submit" value="Submit" name="sub" />
    </form>
</body>

</html>