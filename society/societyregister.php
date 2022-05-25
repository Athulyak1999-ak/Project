<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Dairy managenent system</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="society_style.css">

    <link rel="stylesheet" href="../assets/css/login.css">

</head>

<?php

include '../assets/db_check/dbcon.php';
if (isset($_POST["sub"])) {
    $society_name = $_POST["society_name"];
    // echo $society_name;
    $email = $_POST["s_email"];
    // echo $email;
    $passw = MD5($_POST["pw"]);
    //echo $passw;
    $ph = $_POST["mobile_number"];
    //echo $ph;

    $addss = $_POST["s_address"];
    // echo $addss;
    mysqli_query($con, "INSERT INTO `tbl_society`(`society_name`, `s_email`, `s_address`, `mobile_number`,  `password`, `status`) VALUES ('$society_name','$email','$addss',$ph,'$passw','Approved')");
    header("location: society_login.php");
}
?>

<body>

    <nav class="w3-bar w3-black">
        <ul>
            <li>
                <h2 style="color: white;">Dairy System</h2>
            </li>

            <li><a class="active" href="../index.php">Home</a></li>
            <li><a href="society_login.php">Login</a></li>


    </nav>




    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div id="frm">
            <section class="section-reg">
                <div class="reg-box2">
                    <form action="#" method="post" name="form1" enctype="multipart/form-data" onSubmit="return val()">
                        <table>
                            <tr>
                                <th colspan="2">
                                    <h1>Create an new Society</h1>
                                </th>
                            </tr>
                            <tr>
                                <td><label for="na">Society Name:</label></td>
                                <td class="inpt"><input autofocus autocomplete="off" oninput="fnamecheck();" type="text" id="na" name="society_name" placeholder="Enter the society name" required></td>
                                <td> <span style="color:red; font-size:12px;" id="out_fname"></span></td>
                            </tr>
                            <tr>
                                <td><label for="mn">Mobile number:</label></td>
                                <td class="inpt"><input autofocus autocomplete="off" type="text" id="mn" name="mobile_number" oninput="mobilecheck();" placeholder="Enter your mobile number" required></td>
                                <td> <span style="color:red;font-weight:bold;font-size:12px;" id="out_mobile"></span></td>
                            </tr>
                            <tr>
                                <td><label for="em">Email id:</label></td>
                                <td class="inpt"><input autofocus autocomplete="off" type="email" id="em" name="s_email" oninput="mailcheck();" placeholder="Enter your email id" required></td>
                                <td><span style="color:red; font-size:12px;" id="out_email"></span></td>
                            </tr>
                            <tr>
                                <td><label for="a2">Address:</label></td>
                                <td class="inpt"><textarea row="20" column="20" name="s_address" id="a2" placeholder="Enter your address......" required></textarea></td>
                            </tr>


                            <tr>
                                <td><label for="pas">Password:</label></td>
                                <td class="inpt"><input autofocus autocomplete="off" type="password" id="pas" name="pw" oninput="pass1check();" placeholder="Enter your password" required></td>
                                <td><span style="color:red; font-size:12px;" id="out_pass1"></span></td>
                            </tr>
                            <tr>
                                <td><label for="cpas">Confirm Password:</label></td>
                                <td class="inpt"><input autofocus autocomplete="off" type="password" oninput="pass2check();" id="cpas" name="cpw" placeholder="Re-enter your password" required></td>
                                <td><span style="color:red; font-size:12px;" id="out_pass2"></span></td>
                            </tr>

                            </select>

                            </tr>
                            <tr>
                                <td colspan="2"><button name="sub">Register</button></td>
                            </tr>
                        </table>
                    </form>
                </div>

            </section>
        </div>
    </div>

    <!-- ***** Main Banner Area End ***** -->










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
    <script src="../assets/js/register.js"></script>
    <script src="../assets/js/register_validation.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>

</html>