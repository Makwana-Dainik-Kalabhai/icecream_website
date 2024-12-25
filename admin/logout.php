<?php
session_start();

echo "<script>alert('Logout Successfully');</script>";
session_unset();
session_destroy();

echo "<script>
            var startpt = ( window.history.length - 4) * -1;
        window.history.go(startpt);
        </script>";
?>