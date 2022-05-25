<h1>Payment Complete</h1>
<?php
include "assets/db_check/dbcon.php";
session_start();
echo $pid = $_SESSION['pid'];
echo '<script>alert("Payment Scuessfully completed")</script>';
$query = "UPDATE `products` SET `status`= 0 WHERE `id` = '$pid'";
$res = mysqli_query($con, $query);
echo ('
    <script>
    window.location.href="bill.php";
    </script>');
?>