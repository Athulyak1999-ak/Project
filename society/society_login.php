<?php
session_start();
if (isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'admin') {
        header("location: ../dashboard.php");
    } else if ($_SESSION['role'] == 'customer') {
        header("location: ../shop.php");
    } else if ($_SESSION['role'] == 'seller') {
        header("location: ../seller.php");
    }
}

?>
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



    <link rel="stylesheet" href="society_style.css">
    <link rel="stylesheet" href="../assets/css/login.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("select").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".box").hide();
                    }
                });
            }).change();
        });
        window.history.forward();
    </script>


</head>

<body>

    <nav class="w3-bar w3-black">
        <ul>
            <li>
                <h2 style="color: white;">Dairy System</h2>
            </li>

            <li><a class="active" href="../index.php">Home</a></li>
            <li><a href="societyregister.php">Register</a></li>


    </nav>



    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div id="frm1">
            <!-- ***** Main Banner Area End ***** -->
            <section class="section-log">

                <div class="log-box2">
                    <form action="./s_login_check.php" method="post" enctype="multipart/form-data">
                        <div class="imgcontainer">

                            <img src="../assets/images/logicon.png" alt="Avatar" class="avatar">
                        </div>

                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_GET['error'] ?>
                            </div>
                        <?php } ?>

                        <label for="username">User name</label>
                        <input autofocus autocomplete="off" type="text" name="username" id="username" placeholder="Enter your email id">
                        <br>
                        <label for="password">Password</label>
                        <input class="inp2" autofocus autocomplete="off" type="password" name="password" id="password" placeholder="Enter password">
                        <br>


                        <br>

                        <button type="submit" name="sublog">Login</button>
                        <br>
                        <!-- <a href="#" class="fp">Forgot Password?</a><br> -->
                        <p id="tt">Not yet a memeber? <a href="societyregister.php">Register</a></p>

                    </form>


                </div>
            </section>

        </div>

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

</body>

</html>