<?php
session_start();
include "../assets/db_check/dbcon.php";
$id = $_SESSION['id'];
$payment_status = "Completed";
$added_on = date('Y-m-d h:i:s');
mysqli_query($con, "Update tbl_register set `Amount` = 0 ,`Payment Status` = '$payment_status' , `Added On` = '$added_on' where `id` = '$id'");
