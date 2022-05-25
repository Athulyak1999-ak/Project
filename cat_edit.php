<?php
include 'assets/db_check/dbcon.php';
$cid = $_POST['cid'];
$newcat = $_POST['categoryname'];
if (isset($_POST['Edit'])) {

    $result1 = mysqli_query($con, "update `category` set `cat_name` = '$newcat' where cat_d =$cid ");
    if ($result1) {
        header("Location: category_view.php");
        die();
    }
} else
if (isset($_POST['Delete'])) {

    $result = mysqli_query($con, "DELETE FROM `category` WHERE cat_d =$cid ");
    if ($result) {

        header("Location: category_view.php");
        die();
    }
}
