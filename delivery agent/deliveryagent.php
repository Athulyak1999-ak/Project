<?php
include "../assets/db_check/dbcon.php";
include 'd_dashboard.php';
if (!isset($_SESSION['role'])) {
    header("location: delivery_login.php");
}


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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>

    <title>User View</title>
</head>

<body>


    <div>
        <table id="customers" align="center">
            <form class="nav" action="#" method="POST">
                <thead>
                    <tr>

                        <th scope="col">Order id </th>
                        <th scope="col">Customer name </th>
                        <th scope="col">Customer details </th>
                        <th scope="col">Contact number </th>
                        <th scope="col">Total amount </th>
                        <th scope="col">Payment Mode</th>
                        <th scope="col">Delivery Mode</th>
                        <th scope="col" colspan="2">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * from `tbl_order` ";
                    $result = mysqli_query($con, $sql);

                    if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) {

                            $order_id = $row['odr_id'];
                            $name = $row['c_name'];
                            $address = $row['c_address'];
                            $addres = $row['c_addre'];
                            $city = $row['city'];
                            $district = $row['district'];
                            $state = $row['state'];
                            $price = $row['pincode'];
                            $phone = $row['phone'];
                            $email = $row['c_email'];
                            $phone = $row['phone'];
                            $amount = $row['total_amount'];
                            echo ' <tr>
                            <td>' . $order_id . '</td>
                            <td>' . $name . '</td>
                           
                            <td>' . $address . ',' . $addres . ',' . $city . ',' . $district . ',' . $state . ',' . $email . '</td>
                            <td>' . $phone . '</td>
                       
                            <td>' . $amount . '</td>
                            <td>Online</td> 
                            <td>Home Delivery</td>
                            <td> <input type="checkbox" name="deliverystatus" value="Delivered">
                            <label for="deliverystatus">Delivered</label><br></td>
                            <td> <input type="checkbox" name="deliverystat" value="Delivered">
                            <label for="deliverystat">Undelivered</label><br></td> </tr>';
                        }
                    }

                    ?>
</body>

</html>