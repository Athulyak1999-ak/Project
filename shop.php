<?php
session_start();
if (!isset($_SESSION['role']) && ($_SESSION['role'] != 'customer')) {
  header("location: ./login.php");
}

?>

<?php
// include "header.php";
include "assets/db_check/dbcon.php";
//$query = "SELECT * FROM `category` ";
//$res1 = mysqli_query($con, $query) or die('error getting data');
//$row2 = mysqli_fetch_array($res1);
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

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;

      width: 50%;
      margin: auto;
      text-align: center;
      font-family: arial;
      float: left;
      margin-left: 5px;
      margin-right: 10px;
      margin-bottom: 10px;
      margin-top: 30px;
      opacity: 0.9;
      height: 100px;

    }

    .card h3 {
      text-transform: uppercase;
      margin-left: 5px;
      margin-right: 10px;
      margin-bottom: 10px;
      margin-top: 30px;
    }

    .img-fill {
      width: 100%;
      height: 100px;
      display: block;
      overflow: hidden;
      position: relative;
      text-align: center
    }

    .hero-text {
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
    }

    .bdimage {
      background-image: url("assets/images/Shopbackground.jpg");
      background-color: #cccccc;
      height: 400px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
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
            <a href="#" class="logo">Dairy<em> System</em></a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="#" class="active">Home</a></li>
              <li><a href="cart.php"><img style="width: 30px; float: right;" style="height:30px;" src="assets/images/cart.png" /></a></li>
              <li><a><?php echo $_SESSION['username']; ?></a></li>
              <li><a href="logout.php">SignOut</a></li>

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


  <!-- ***** Main Banner Area End ***** -->

  <div class="bdimage">
    <div class="hero-text">
      <h3>Quality Products & Quality Service Begin with Quality Thinking</h3>

    </div>
  </div>

  <?php
  $result = mysqli_query($con, "SELECT * FROM `category`");
  //ptint_r($result);
  while ($row = mysqli_fetch_array($result)) { ?>
    <div class="card">

      <h3><a href="product_view.php?view=<?php echo $row["cat_d"]; ?>"><?php echo $row['cat_name']; ?></a></h3>
    </div>
  <?php } ?>




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