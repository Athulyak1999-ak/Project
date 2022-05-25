<?php
session_start();
if (!isset($_SESSION['role']) && ($_SESSION['role'] != 'customer')) {
  header("location: ./login.php");
}

?>
<?php
//include "header.php";
include "assets/db_check/dbcon.php";
//session_start();
if (!empty($_GET["view"])) {
  $_SESSION['viewId'] = $_GET["view"];
}
$category_id = $_SESSION['viewId'];
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
    .card1 {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: auto;
      margin: auto;
      text-align: center;
      font-family: arial;
      float: left;
      margin-left: 45px;
      margin-right: 40px;
      margin-bottom: 30px;
      margin-top: 40px;
      width: 60%;
      overflow: visible
    }

    .price {
      color: blue;
      font-size: 22px;
    }

    .but1 {
      margin-left: 0px;
      border: solid;
      outline: 0;
      color: white;
      background-color: #1A5276;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    .card button:hover {
      opacity: 0.7;
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
            <a href="index.html" class="logo">Dairy<em> System</em></a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="shop.php">Home</a></li>
              <li><a href="#" class="active">Products</a></li>
              <li><a href="cart.php"><img style="width: 30px; float: right; height:30px;" src="assets/images/cart.png" /></a></li>
              <li><a><?php echo $_SESSION['username']; ?></a></li>
              <li><a href="logout.php">SignOut</a></li>


            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <br>

  <!-- ***** Menu End ***** -->


  <!-- ***** Header Area End ***** -->



  <?php
  $result = mysqli_query($con, "SELECT * FROM `products` where cat_d='$category_id'");
  //ptint_r($result);
  while ($row = mysqli_fetch_array($result)) { ?>
    <form action="#" method="POST">
      <div class="card1">
        <img src="./admin/pic/<?php echo $row["image"]; ?>" width="200" height="200" />
        <h2><?php echo $row["p_name"]; ?></h2>
        <h4><?php echo $row["quantity"] . "(pack)"; ?></h4>
        <h5><?php echo $row["description"]; ?></h5>
        <p class="price">RS : <?php echo $row["price"]; ?></p>
        <input type="number" name="productPrice" value="<?php echo $row["price"]; ?>" hidden>


        <label for="quantity">Quantity :</label>
        <input type="number" id="quantity" name="quantity" min="1" max="20" />
        </br>
        <div>
          <button type="submit" name="cart-btn1" class="but1" value="<?php echo $row["id"]; ?>">Add to Cart</button>
        </div>
      </div>

    </form>


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


<?php
  }
  $result2 = mysqli_query($con, "SELECT * FROM `tbl_cart`");
  if (isset($_POST['cart-btn1'])) {
    extract($_POST);
    $userId = $_SESSION['userId'];
    if ($quantity < 1) {
      echo '<script>alert("Atleast One quantity!!!")</script>';
    } else {
      $totalAmount = $productPrice * $quantity;
      $productId = $_POST['cart-btn1'];
      $insertCart = "INSERT INTO `tbl_cart`( `user_id`,`product_id`, `cart_quantity`, `total_amount`) 
    VALUES ('$userId','$productId','$quantity','$totalAmount')";
      if (mysqli_query($con, $insertCart)) {
        echo '<script>window.location.href = "cart.php";</script>';
      }
    }
  }
?>