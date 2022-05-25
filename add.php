<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>add product</title>
  <link rel="stylesheet" href="assets/style.css" />


</head>
<style>
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

  /* Green */
  .button2 {
    background-color: #008CBA;
  }

  .button3 {
    background-color: red;
  }
</style>

<body>
  <?php
  include 'assets/db_check/dbcon.php';
  include 'dashboard.php';

  // When form submitted, insert values into the database.
  if (isset($_POST["submit"])) {

    // removes backslashes

    $p_name = stripslashes($_REQUEST['p_name']);
    //escapes special characters in a string
    $p_name = mysqli_real_escape_string($con, $p_name);



    $p_price = stripslashes($_REQUEST['p_price']);
    $p_price = mysqli_real_escape_string($con, $p_price);
    $cat = $_POST['category'];

    $p_description = stripslashes($_REQUEST['p_description']);
    $quantity = stripslashes($_REQUEST['quantity']);
    $p_description = mysqli_real_escape_string($con, $p_description);

    $quantity = mysqli_real_escape_string($con, $quantity);


    $p_image = $_FILES["p_image"]["name"];
    $sql = "SELECT p_name from `products`";
    $result1 = mysqli_query($con, $sql);
    $flag_isExit_product = 0;
    while ($row = mysqli_fetch_assoc($result1)) {
      if ($row['p_name'] == $p_name) {
        $flag_isExit_product = 1;
      }
    }
    if ($flag_isExit_product == 1) {
      echo ("<script>alert('Product Name already exists')</script>");
    } else {
      move_uploaded_file($_FILES["p_image"]["tmp_name"], "admin/pic/" . $_FILES["p_image"]["name"]);
      $query    = "INSERT into `products` (`p_name`,`price`,`cat_d`,`quantity`,`image`,`description`)
                         VALUES ( '$p_name', '$p_price','$cat',$quantity, '$p_image','$p_description')";
      $result   = mysqli_query($con, $query);
      if ($result) {
        echo '<script>alert("Product added successfully")</script>';
        header('Location:adminproduct_view.php');
      } else {
        echo "<div class='form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='add.php'>add product</a> again.</p>
                      </div>";
      }
    }
  }
  ?>
  <form class="form" action="" method="post" enctype="multipart/form-data">
    <h1 class="login-title">ADD PRODUCT</h1>
    <table>
      <tr>
        <td><label class="form-control-label">ProductName</label></td>
        <td>
          <input type="text" class="login-input" name="p_name" placeholder="product name" required />
        </td>
      </tr>

      <tr>
        <td><label class="form-control-label">Price</label></td>
        <td>
          <input type="number" class="login-input" min="1" max='100000' name="p_price" placeholder="price" required />
        </td>
      </tr>

      <tr>
        <td><label class="form-control-label">Categories</label></td>
        <td>
          <select name='category'>
            <option value="" disabled>Select Category</option>
            <?php
            $result1 = "SELECT * from category";
            $result = $con->query($result1);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['cat_d'] . '">' . $row['cat_name'] . '</option>';
              }
            }

            ?>
          </select>
        </td>
      </tr>

      <tr>
        <td><label class="form-control-label">Image</label></td>
        <td>
          <input type="file" class="login-input" name="p_image" accept="image/png, image/gif, image/jpeg" placeholder="image" required />
        </td>
      </tr>

      <tr>
        <td><label class="form-control-label">Product Description</label></td>
        <td>
          <input type="text" class="login-input" name="p_description" placeholder="description" required />
        </td>
      </tr>
      <tr>
        <td><label class="form-control-label">Quantity</label></td>
        <td>
          <input type="text" class="login-input" name="quantity" placeholder="Quantity" required />
        </td>
      </tr>




      <tr>
        <td colspan="2">
          <input type="submit" name="submit" value="SUBMIT" class="button button2">
        </td>
      </tr>

    </table>

  </form>
  <?php


  ?>
  </div>

</body>

</html>