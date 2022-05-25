<?php
session_start();
include "assets/db_check/dbcon.php";
if (isset($_POST["submit"])) {
    $email = $_SESSION['username'];
    // echo $email;
    $id = $_SESSION['userId'];
    // echo $id;
    $customer_name  = $_POST["c_name"];
    //echo $customer_name;
    $customer_addres = $_POST["c_addres"];
    //echo $customer_addres;
    $customer_address = $_POST["c_address"];
    //echo $customer_address;
    $city = $_POST["city"];
    $district = $_POST["district"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];
    $phone = $_POST["phone"];
    $totalsum = $_SESSION['amount'];
    mysqli_query($con, "INSERT into `tbl_order`(`c_name`,`c_address`,`c_addre`,`city`,`district`,`state`,`pincode`,`phone`,`c_email`,`user_id`,`total_amount`)
    VALUES('$customer_name','$customer_addres','$customer_address','$city','$district','$state',$pincode,$phone,'$email',$id,$totalsum)");
    //$result = mysqli_query($con, "SELECT * FROM `tbl_cart` WHERE `user_id`='$id'");
    // while ($row = mysqli_fetch_array($result)) {
    //  $pid = $row['product_id'];
    // $result1 = mysqli_query($con, "SELECT p_name FROM `products` WHERE `id`='$pid'");
    //while ($row1 = mysqli_fetch_array($result1)) {
    // $pname = $row1['p_name'];
    //  $cart_quantity = $row['cart_quantity'];
    //  $amount = $row['total_amount'];
    //  $totalsum = 0;
    //  $totalsum = $totalsum + $row['total_amount'];
    //  mysqli_query($con, "Update tbl_order set `p_name` ='$pname',`p_quantity` = $cart_quantity, `p_amount` =  $amount,  =$totalsum where `user_id` = '$id'");
    // }
    // }
    header("location: paymentgateway.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dairysystem</title>
    <link rel="stylesheet" href="orderstyle.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Dairy System</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">dairysystem@gmail.com</p>
                        <p class="text-white">+91 9074139799</p>
                    </div>
                </div>
                <a href="cart.php" class="buttonpur" style="vertical-align:middle"><span class="spanpur">Go Back</span></a>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h4 class="heading">Invoice No.: 001</h4>
                    <p class="sub-heading" id="dash_date">Order Date: </p>
                    <script>
                        var today = new Date();
                        var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
                        document.getElementById("dash_date").innerHTML = "Order Date : " + date;
                    </script>
                    <p class="sub-heading">Email Address:
                        <?php

                        if ($_SESSION['username'])
                            $ch =  $_SESSION['username'];
                        echo "<p class=welcome>" . $_SESSION['username'] . "</p>"; ?>
                    </p>

                </div>

            </div>
        </div>
        <div class="body-section">
            <h3 class="heading">Delivery Details</h3>
            <br>
            <form method="POST">
                <table>
                    <tr>
                        <td><label class="w3-text-black"><b> Customer Name</b></label></td>
                        <td>
                            <input type="text" class="w3-input w3-border" name="c_name" placeholder="Customer name" required />
                        </td>
                    </tr>
                    <tr>
                        <td><label class="w3-text-black"><b> Customer Address 1</b></label></td>
                        <td>
                            <input type="text" class="w3-input w3-border" name="c_addres" placeholder="Customer Address 1" required />
                        </td>
                    </tr>
                    <tr>
                        <td><label class="w3-text-black"><b> Customer Address 2</b></label></td>
                        <td>
                            <input type="text" class="w3-input w3-border" name="c_address" placeholder="Customer Address 2" required />
                        </td>
                    </tr>
                    <tr>
                        <td><label class="w3-text-black"><b> City</b></label></td>
                        <td>
                            <input type="text" class="w3-input w3-border" name="city" placeholder="City" required />
                        </td>
                    </tr>
                    <tr>
                        <td><label class="w3-text-black"><b> District</b></label></td>
                        <td>
                            <input type="text" class="w3-input w3-border" name="district" placeholder="district" required />
                        </td>
                    </tr>
                    <tr>
                        <td><label class="w3-text-black"> <b>State</b></label></td>
                        <td>
                            <input type="text" class="w3-input w3-border" name="state" placeholder="State" required />
                        </td>
                    </tr>
                    <tr>
                        <td><label class="w3-text-black"><b> Pincode</b></label></td>
                        <td>
                            <input type="text" class="w3-input w3-border" name="pincode" placeholder="pincode" required />
                        </td>
                    </tr>
                    <tr>
                        <td><label class="w3-text-black"><b>Phone</b> </label></td>
                        <td>
                            <input type="text" class="w3-input w3-border" name="phone" placeholder="phone" required />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="SUBMIT" class="w3-btn w3-blue">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
</body>

</html>