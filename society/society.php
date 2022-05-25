<?php
include "../assets/db_check/dbcon.php";
include 's_dashboard.php';
if (!isset($_SESSION['role'])) {
    header("location: society_login.php");
}

if (isset($_POST["submit"])) {
    $s_id = $_SESSION['userId'];
    $email =  stripslashes($_REQUEST['email']);
    //escapes special characters in a string
    $email = mysqli_real_escape_string($con, $email);
    $sell_milk =  stripslashes($_REQUEST['s_milk']);
    //escapes special characters in a string
    $sell_milk  = mysqli_real_escape_string($con, $sell_milk);
    $cut_milkrate =  stripslashes($_REQUEST['c_milk']);
    //escapes special characters in a string
    $cut_milkrate  = mysqli_real_escape_string($con, $cut_milkrate);
    $fat_rate =  stripslashes($_REQUEST['f_rate']);
    //escapes special characters in a string
    $fat_rate  = mysqli_real_escape_string($con, $fat_rate);
    $totalamount =  stripslashes($_REQUEST['t_price']);
    //escapes special characters in a string
    $totalamount  = mysqli_real_escape_string($con, $totalamount);

    // echo ($email . "+" . $sell_milk . "+" . $cut_milkrate . "+" . $fat_rate . "+" . $totalamount . "+" . $s_id);


    $checkSellerMail = "SELECT * FROM `tbl_register` WHERE `email`='$email' AND `role`='seller'";
    $checkSellerMailResult = mysqli_query($con, $checkSellerMail);

    if (mysqli_num_rows($checkSellerMailResult) >= 1) {
        $query    = "INSERT into `tbl_milkvalue` (`s_email`,`sellmilk`,`crt_milkrate`,`fatrerate`,`totalamount`,`society_id`)
            VALUES ( '$email', $sell_milk,$cut_milkrate,$fat_rate, $totalamount,$s_id)";

        $result   = mysqli_query($con, $query);
        if ($result) {
            $updateAmount = "UPDATE `tbl_register` SET `Amount`=Amount+$totalamount WHERE `email`='$email'";
            mysqli_query($con, $updateAmount);
            echo '<script>alert("MilkRate added successfully")</script>';
            // header('Location:adminproduct_view.php');
        } else {
            echo '<script>alert("Some Date is missing")</script>';
        }
    } else {
        echo "<script>alert('No matching mail found..!!')</script>";
    }
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
            position: relative
        }

        .img {
            height: 50px;
            width: 50px;
        }
    </style><br><br><br><br><br>
    <div>
        <form class="form" action="#" method="post" enctype="multipart/form-data">
            <h1 class="login-title">ADD MILK RATE</h1>
            <table>
                <tr>
                    <td><label class="form-control-label">Seller Email</label></td>
                    <td>
                        <input type="text" class="login-input" name="email" placeholder="seller email" required />
                    </td>
                </tr>

                <tr>
                    <td><label class="form-control-label">Sell Milk</label></td>
                    <td>
                        <input type="number" class="login-input" min="1" max="1000" name="s_milk" id="s_milk" placeholder="Milk in Liter" required />
                    </td>
                </tr>
                <tr>
                    <td><label class="form-control-label">Current Milk Rate</label></td>
                    <td>
                        <input type="number" class="login-input" min="1" max="1000" name="c_milk" id="c_milk" placeholder=" Milk Current Price" required readonly />
                    </td>
                </tr>
                <tr>
                    <td><label class="form-control-label">Fat Rate</label></td>
                    <td>
                        <input type="number" class="login-input" name="f_rate" id="f_rate" placeholder=" Fat Rate" required readonly />
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="button" value="Fat Calculator" onClick="priceCalculate()" class="login-button">
                    </td>
                </tr>
                <tr>
                    <td><label class="form-control-label">Total Amount</label></td>
                    <td>
                        <input type="number" class="login-input" name="t_price" id="t_price" placeholder="Total amount" required readonly />

                    </td>

                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="SUBMIT" class="login-button">
                    </td>
                </tr>

            </table>

        </form>
        <script>
            function priceCalculate() {
                var fatRate = Math.floor(Math.random() * 10) + 1;
                var currentmilkrate = Math.floor(Math.random() * (50 - 30 + 1) + 30)

                document.getElementById('f_rate').value = fatRate;
                document.getElementById('c_milk').value = currentmilkrate;

                var sellmilk = document.getElementById('s_milk').value;
                var total = (sellmilk * currentmilkrate * fatRate) / 4;
                //   alert(total);
                document.getElementById('t_price').value = total;
            }
        </script>
    </div>
</body>

</html>