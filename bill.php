<?php
session_start();
include "assets/db_check/dbcon.php";
$userId = $_SESSION['userId'];
//$email = $_SESSION['username'];
$order = "SELECT * FROM `tbl_order` WHERE `user_id`='$userId'";
$orderCheck = mysqli_query($con, $order);

while ($row = mysqli_fetch_assoc($orderCheck)) {
    $name = $row['c_name'];
    //echo ($name);
    $orderaddress = $row['c_address'];
    //echo ($orderaddress);
    $orderaddr = $row['c_addre'];
    // echo ($orderaddr);
    $city = $row['city'];
    //echo ($city);
    $district = $row['district'];
    $state = $row['state'];
    $pincode = $row['pincode'];
    $phone = $row['phone'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy System</title>
    <style>
        body {
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin-right: auto;
            margin-left: auto;
            margin-top: 1%;
        }

        .brand-section {
            background-color: #0d1033;
            padding: 10px 40px;
        }

        .logo {
            width: 50%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }

        .col-6-1 {
            flex: 0 0 auto;
            margin-top: -10%;
            margin-left: 35%;
        }

        .text-white {
            color: #fff;
        }

        .company-details {
            float: right;
            text-align: right;
        }

        .body-section {
            padding: 16px;
            border: 1px solid gray;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }

        .sub-heading {
            color: #262626;
            margin-bottom: 05px;
        }

        table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr {
            border: 1px solid #111;
            background-color: #f2f2f2;
        }

        table td {
            vertical-align: middle !important;
            text-align: center;
        }

        table th,
        table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }

        .table-bordered {
            box-shadow: 0px 0px 5px 0.5px gray;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .text-right {
            text-align: end;
        }

        .w-20 {
            width: 20%;
        }

        .float-right {
            float: right;
        }

        .prnt {
            display: inline-block;
            border-radius: 20px;
            border: 1px solid #4B5251;
            color: #4B5251;
            text-align: center;
            font-size: 18px;
            padding: 5px;
            width: 14%;
            height: 6%;
            transition: all 0.5s;
            cursor: pointer;
            margin-left: 85%;
            margin-top: -5%;
        }

        .prnt:hover {
            background-color: black;
        }
    </style>
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

                        <p class="text-white">+91 9074198799</p>
                    </div>
                </div>
                <a href="shop.php" class="buttonpur" style="vertical-align:middle"><span class="spanpur">Go Back</span></a>
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


                <p> <label class="w3-text-black"><b> Name:<?php echo $name; ?></b></label>

                </p>

                <p> <label class="w3-text-black"><b>Address 1 : <?php echo $orderaddress; ?></b></label>

                </p>
                <p>
                    <label class="w3-text-black"><b>Address 2 :<?php echo $orderaddr; ?></b></label>

                </p>
                <p>
                    <label class="w3-text-black"><b> City: <?php echo $city; ?></b></label>

                </p>
                <p>
                    <label class="w3-text-black"><b> District: <?php echo $district; ?></b></label>

                </p>
                <p>
                    <label class="w3-text-black"> <b>State: <?php echo $state; ?></b></label></td>

                </p>
                <p>
                    <label class="w3-text-black"><b> Pincode: <?php echo $pincode; ?></b></label>

                </p>
                <p>
                    <label class="w3-text-black"><b>Phone: <?php echo $phone; ?></b> </label>

                </p>

            </form>
        </div>
        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <tr>
                    <th style="padding-left:-25px;">Product</th>
                    <th style="padding-left:7px;">Quantity</th>
                    <th style="padding-left:20px;">Price</th>
                </tr>


                <tbody>
                    <?php
                    $sno = 1;
                    $total = 0;

                    $result = mysqli_query($con, "SELECT * FROM `tbl_cart` WHERE `user_id`='$userId'");
                    while ($row = mysqli_fetch_array($result)) {
                        $pid = $row['product_id'];
                        $pname = '';
                        $result1 = mysqli_query($con, "SELECT p_name FROM `products` WHERE `id`='$pid'");
                        while ($row1 = mysqli_fetch_array($result1)) {
                            $pname = $row1['p_name'];
                        }
                        echo "<tr>
    <td style=padding-left:25px;>" . $pname . "</td>
    <td style=padding-left:25px; >" . $row['cart_quantity'] . "</td>
    <td style=padding-left:25px;>" . $row['total_amount'] . "</td>
    </tr><br>";
                        $total += $row['total_amount'];
                        $sno++;
                    }

                    $tax = 0;

                    echo "<tr>
      
      </b></tr>";
                    $grand_total = $tax + $total;
                    echo "<tr>
        <td></td>
        <td><b> Grand Total </td>
        <td> $grand_total</td></b></tr>";
                    ?>

            </table>
            <br>
            <h3 class="heading" style="margin-left:5%;">Payment Status: Paid</h3>
            <h3 class="heading" style="margin-left:2%;">Payment Mode: Online Payment</h3>
            <div id="print_section">

            </div>
            <input type="button" class="prnt" onclick="printbill('print_section')" value="Download">
        </div>


    </div>
    <script>
        function printbill(section_id) {
            window.print();
            window.location.href = "shop.php";
        }
    </script>

</body>

</html>