<?php
include "../assets/db_check/dbcon.php";
session_start();
$id = $_SESSION['id'] = $_GET['id'];
$query = "SELECT `Amount` FROM tbl_register WHERE id = '$id'";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_array($res);
$amt = $row['Amount'];
?>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function pay_now() {
            jQuery.ajax({
                type: 'post',
                url: 'payment_process.php',
                data: "amt=" + <?php echo $amt; ?>,
                success: function(result) {
                    var options = {
                        "key": "rzp_test_l5sXUjdBO8Nrdp",
                        "amount": <?php echo $amt; ?>00,
                        "currency": "INR",
                        "name": "Dairy System",
                        "description": "Payment Gateway",
                        "image": "../assets/images/head-logo.png",
                        "handler": function(response) {
                            jQuery.ajax({
                                type: 'post',
                                url: 'payment_process.php',
                                data: "payment_id=" + response.razorpay_payment_id,
                                success: function(result) {
                                    window.location.href = "thank_you.php";
                                }
                            });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            });


        }
    </script>
</head>

<body onload="pay_now()">
</body>