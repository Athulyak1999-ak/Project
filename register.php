<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="assets/css/login.css">

</head>

<?php

include 'assets/db_check/dbcon.php';
if (isset($_POST["sub"])) {
    $name = $_POST["name"];
    //echo $name;
    $email = $_POST["email"];
    //echo $email;
    $passw = MD5($_POST["pw"]);
    //echo $passw;
    $ph = $_POST["mob-no"];
    //echo $ph;
    $i = $_FILES["image"]["name"];
    //echo $i;
    $addss = $_POST["addr"];
    //echo $addss;
    $gen = $_POST["gender"];

    //echo $gen;
    $cat = $_POST['role'];
    echo ($cat);
    move_uploaded_file($_FILES["image"]["tmp_name"], "./image/uploads/" . $_FILES["image"]["name"]);
    mysqli_query($con, "INSERT INTO `tbl_register`(`name`, `email`, `address`, `mobile`, `gender`, `password`, `image`, `role`, `status`) VALUES ('$name','$email','$addss','$ph','$gen','$passw','$i','$cat','Approved')");
    header("location: login.php");
}
?>

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
                        <a href="index.php" class="logo">Dairy<em> System</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li><a href="login.php">Login</a></li>

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
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div id="frm">
            <section class="section-reg">
                <div class="reg-box2">
                    <form action="#" method="post" name="form1" enctype="multipart/form-data" onSubmit="return val()">
                        <table>
                            <tr>
                                <th colspan="2">
                                    <h1>Create an Account</h1>
                                </th>
                            </tr>
                            <tr>
                                <td><label for="na">Name:</label></td>
                                <td class="inpt"><input autofocus autocomplete="off" oninput="fnamecheck();" type="text" id="na" name="name" placeholder="Enter your name" required></td>
                                <td> <span style="color:red; font-size:12px;" id="out_fname"></span></td>
                            </tr>
                            <tr>
                                <td><label for="mn">Mobile number:</label></td>
                                <td class="inpt"><input autofocus autocomplete="off" type="text" id="mn" name="mob-no" oninput="mobilecheck();" placeholder="Enter your mobile number" required></td>
                                <td> <span style="color:red;font-weight:bold;font-size:12px;" id="out_mobile"></span></td>
                            </tr>
                            <tr>
                                <td><label for="em">Email id:</label></td>
                                <td class="inpt"><input autofocus autocomplete="off" type="email" id="em" name="email" oninput="mailcheck();" placeholder="Enter your email id" required></td>
                                <td><span style="color:red; font-size:12px;" id="out_email"></span></td>
                            </tr>
                            <tr>
                                <td><label for="a2">Address:</label></td>
                                <td class="inpt"><textarea row="20" column="20" name="addr" id="a2" placeholder="Enter your address......" required></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Gender:</label></td>
                                <td class="inpt1">
                                    <input type="radio" value="Male" name="gender" checked> Male
                                    <input type="radio" value="Female" name="gender"> Female
                                    <input type="radio" value="Other" name="gender"> Other
                                </td>
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
                            <tr>
                                <td><label for="im">Upload profile picture:</label></td>
                                <td class="inpt"><input autofocus accept="image/png, image/jpeg" autocomplete="off" type="file" id="im" name="image" required></td>
                            </tr>
                            <tr>
                                <td> <label for="se">Select Category:</label></td>
                                <td class="inpt"><select id="se" name="role" required>
                                        <option>Choose </option>
                                        <option value="customer">Customer</option>

                                        <option value="seller">Seller</option>
                                </td>

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









    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Company Name
                        - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script>
        function mobilecheck() {
            if (outphone.value.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)) {
                phone_out.innerHTML = "";
            } else {
                phone_out.innerHTML = "Please enter Valid Mobile no:";
                document.form1.mob_no.focus();
            }
        }
    </script>
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
    <script src="assets/js/register.js"></script>
    <script src="assets/js/register_validation.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>

</html>