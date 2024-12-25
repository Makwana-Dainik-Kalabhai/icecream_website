<?php
session_start();

if (isset($_POST['sub'])) {
    if ((time() - $_SESSION['str']) > 5) {
        echo "After 5 seconds";
    } else {
        echo "Before 5 seconds";
    }
}
?>