<?php
include "assets/db_check/dbcon.php";
session_start();
$sum = 0;
$bal = 0;
$email = $_SESSION['username'];
$balance = "SELECT Amount FROM `tbl_register` WHERE `email`='$email' AND `role`='seller'";
$balanceCheck = mysqli_query($con, $balance);

while ($row = mysqli_fetch_assoc($balanceCheck)) {
    $bal = $row['Amount'];
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


    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>User View</title>
</head>

<body>
    <style>
        .table {
            max-width: 1000px;
            margin: auto;
        }

        .addlink {
            margin-top: 100px;
            margin-left: 330px;
            position: relative;

        }

        .img {
            height: 50px;
            width: 50px;
        }

        .button {
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button1 {
            background-color: #4CAF50;
        }
    </style><br><br><br><br><br>
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
                        <a href="index.html" class="logo"><em> Dairy System</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="seller_home.php" class="active">Home</a></li>
                            <li><a href="#" class="active">Milk Rate</a></li>
                            <li><a href="doctors_view.php" class="active">Doctors Details</a></li>
                            <li><a class="active"><?php echo $_SESSION['username']; ?></a></li>
                            <li><a href="logout.php" class="active">Logout</a></li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <h3 align="center">Daily Sell Milk View</h3>


    <div>
        <table class="table table-hover table-dark">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Selling Milk(Liter) </th>
                <th scope="col">Current MikRate </th>
                <th scope="col">Fat Rate</th>
                <th scope="col">Amount(Per day)</th>






            </tr>
            <?php
            $email = $_SESSION['username'];
            // echo ($email);
            $sql = "select * from tbl_milkvalue where s_email = '$email'";
            $result = mysqli_query($con, $sql);

            if ($result) {


                while ($row = mysqli_fetch_assoc($result)) {
                    $date = $row['sell_date'];
                    $sellmilk = $row['sellmilk'];
                    $curtmilkrate = $row['crt_milkrate'];
                    $fatrate = $row['fatrerate'];
                    $totalamount = $row['totalamount'];
                    $sum = $sum + $totalamount;






                    echo ' <tr>
                    <td>' . $date . '</td>
                  <td>' . $sellmilk . '</td>
                  <td>' . $curtmilkrate . '</td>
                  <td>' . $fatrate . '</td>
                  <td>' . $totalamount . '</td>
                 
                 
                 
                   </tr>';
                }
            }

            ?>
            <tr>
                <td></td>

                <td></td>




                <td>
                    <label class="w3-text-black"><b> Balance: RS <?php echo $sum; ?></b> </label>

                </td>
                <td>
                    <input type="button" class="prnt" onclick="printbill('print_section')" value="Download Bill">

                </td>
                <td><button class="button button1"><span>
                            <?php
                            if ($bal == 0) {
                                echo "Payment Already done";
                            } else {
                                echo "Withdrawal Amount :", $bal;
                            }
                            ?></span></button></td>


            </tr>





        </table>
    </div>
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
    <script>
        function printbill(section_id) {
            window.print();
            window.location.href = "seller_home.php";
        }
    </script>
</body>

</html>