<?php
include "assets/db_check/dbcon.php";
include 'dashboard.php';


if (isset($_POST['delet'])) {
  $id = $_POST['pid'];


  $query = "DELETE FROM products WHERE id='$id' ";
  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    echo '<script>alert("Deleted successfully")</script>';
    header("Location: adminproduct_view.php");
    // die();
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

    /* Green */
    .button2 {
      background-color: #008CBA;
    }

    .button3 {
      background-color: red;
    }
  </style><br><br><br><br><br>

  <h3><a class="addlink" href="add.php">Add Products</a></h3>


  <div>
    <table class="table table-hover table-dark" align="right">
      <thead>
        <tr>
          <th scope="col">Category</th>
          <th scope="col">ProductName</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity(pack)</th>

          <th scope="col">Image</th>
          <th scope="col" colspan="2">Action</th>





        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "select products.*,category.cat_name from products,category where category.cat_d=products.cat_d order by products.id desc ";
        $result = mysqli_query($con, $sql);

        if ($result) {

          while ($row = mysqli_fetch_assoc($result)) {
            $category = $row['cat_name'];
            $name = $row['p_name'];
            $price = $row['price'];
            $quantity = $row['quantity'];

            $image = $row['image'];



            echo ' <tr>
                  <td>' . $category . '</td>
                  <td>' . $name . '</td>
                  <td>' . $price . '</td>
                  <td>' . $quantity . '</td>

                 
                  <td><img class="img" src="./admin/pic/' . $image . '" /></td>
                  <form action="edit_product.php" method="POST">
                  <input type = "text" hidden value = "' . $row['id'] . '" name = "id"></input>

                  <td>  <input id="editi" type="submit" class="button button2"name="edit" value="Edit" name="edit" /></td></form>
                  <form action="#" method="POST">
                  <input type = "text" hidden value = "' . $row['id'] . '" name = "pid"></input>
                  <td>    <input id="delete_id" type="submit" name="delet" value="delete" class="button button3 "/></td>
                  </form>
                   </tr>';
          }
        }
        ?>
  </div>
</body>

</html>