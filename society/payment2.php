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
            margin-right: 30px;
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

        .button {
            border: none;
            color: white;
            padding: 7px 15px;
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
    <div>
        <div>
            <table class="table table-hover table-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email </th>
                    <th scope="col">Role</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>






                </tr>
                <?php
                $email = $_SESSION['username'];
                // echo ($email);
                $sql = "SELECT * FROM `tbl_register` WHERE `role` = 'seller' and Amount!=0";
                $result = mysqli_query($con, $sql);

                if ($result) {


                    while ($row = mysqli_fetch_assoc($result)) {
                        echo ' <tr>
                    <td>' . $row['name'] . '</td>
                  <td>' . $row['email'] . '</td>
                  <td>' . $row['role'] . '</td>
                  <td>' . $row['mobile'] . '</td>
                  <td>' . $row['Amount'] . '</td>
                  <td><a class="button button1" href="payment.php?id=' . $row['id'] . '">Pay Now</a></td>                 
                   </tr>';
                    }
                }

                ?>

            </table>
        </div>
    </div>
</body>

</html>