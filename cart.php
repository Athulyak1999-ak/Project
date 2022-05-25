<?php
include "assets/db_check/dbcon.php";
session_start();
$userId = $_SESSION['userId'];

// if ($_POST['submit']) {
//     header('location:paymentgateway.php');
// }
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Dairy managenent system</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .p {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }

        h2 {
            margin-top: 100px;
        }

        table {
            background-color: #f2f2f2;
            border: 1px solid black;
            border-collapse: collapse;
            tab-size: 500px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 60px;
            width: 100%;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 200px;
            margin: auto;
            text-align: center;
            font-family: arial;
            float: left;
            margin-left: 45px;
            margin-right: 40px;
            margin-bottom: 30px;
            margin-top: 20px;
            width: 40%;

        }

        body {
            text-align: center;
            table-layout: auto;

        }

        .price {
            color: blue;
            font-size: 15px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .card button {
            border: solid;
            outline: 0;
            padding: 20px;
            color: white;
            background-color: #FF8C00;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .card button:hover {
            opacity: 0.7;
        }

        .button {
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 10px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button1 {
            background-color: #4CAF50;
        }

        /* Green */
        .button2 {
            background-color: #008CBA;
        }

        .button3 {
            background-color: red;
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">Dairy<em>Dairy System</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="shop.php" class="active">Home</a></li>
                            <li><a href="product_view.php" class="active">Products</a></li>
                            <li><a class="active"><?php echo $_SESSION['username']; ?></a></li>
                            <li><a href="logout.php" class="active">SignOut</a></li>


                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- ***** Header Area End ***** -->
    <h2 style="text-align:center">Your Cart</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Quantity(pack)</th>
                <th>Image</th>
                <th>Rate</th>

                <th>Total</th>



            </tr>
        </thead>
        <tbody>
            <?php
            $_SESSION['username'];
            $totalsum = 0;
            $result = mysqli_query($con, "SELECT * FROM `tbl_cart` WHERE `user_id`='$userId'");
            while ($row = mysqli_fetch_array($result)) {
                $totalsum = $totalsum + $row['total_amount'];
                echo "<tr>
                <form action='edit_cart.php' method='POST'>
               <td> <input type='number' name='quantity' min='1' max='20' value= '" . $row['cart_quantity'] . "'>    </td>
                <input type='hidden' name='cid' value= '" . $row['cart_id'] . "'>
               ";
                $productID = $_SESSION['pid'] = $row['product_id'];
                $fetchProduct = mysqli_query($con, "SELECT * FROM `products` where id='$productID' ");
                while ($product = mysqli_fetch_array($fetchProduct)) {            ?>
                    <td>
                        <div class="card1">
                            <img src="./admin/pic/<?php echo $product["image"]; ?>" width="50" height="50" />


                        </div>
                    </td>
                    <td>
                        <input type='text' name='amount' value='<?php echo $product["price"]; ?>' readonly>
                    </td>
                    <td><input type='text' name='total' value='<?php echo ($row["total_amount"]); ?>' readonly></td>

            <?php
                }
                echo ("<td><button type='submit' name='edit'class='button button2'>UPDATE</button></td>
                <td><button type='submit' name='delete'class='button button3'>DELETE</button></td>
                </form>
                ");
            }
            ?>
        </tbody>
    </table><?php
            $_SESSION['amount'] = $totalsum; ?>
    <?php echo "<center><h2>Grand Total: RS.$totalsum </h2></center>"; ?>

    <!-- <input type="submit" class="button button1" name="submit" value="BUY NOW" /> -->
    <button class="button button1"> <a href="order.php"> BUY NOW </a></button>


    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>

</html>