<?php
include 'assets/db_check/dbcon.php';
$quantity = $_POST['quantity'];
$amount = $_POST['amount'];
$cid = $_POST['cid'];
if (isset($_POST['edit'])) {



    $total = $amount * $quantity;
    $result = mysqli_query($con, "update tbl_cart set cart_quantity = $quantity,total_amount=$total where cart_id =$cid ");
    if ($result) {

        header("Location: cart.php");
        die();
    }
} else if (isset($_POST['delete'])) {



    $result = mysqli_query($con, "DELETE FROM `tbl_cart` WHERE cart_id =$cid ");
    if ($result) {

        header("Location: cart.php");
        die();
    }
}
