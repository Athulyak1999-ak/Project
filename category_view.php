<?php
include "assets/db_check/dbcon.php";
include 'dashboard.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">

  <title>Category View</title>
  <style>
    .table {
      max-width: 500px;
      margin: auto;
    }

    .addlink {
      margin-top: 200px;
      margin-left: 430px;
      position: relative;

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

    .button2 {
      background-color: #008CBA;
    }

    .button3 {
      background-color: red;
    }
  </style><br><br><br><br><br>

</head>

<body>

  <h3> <a class="addlink" href="category.php">Add category</a></h3>
  <table class="table table-hover table-dark" align="center">
    <form class="nav" action="cat_edit.php" method="POST">
      <thead>
        <tr>

          <th scope="col">Category Name</th>
          <th scope="col" colspan="2">Action</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * from `category` ";
        $result = mysqli_query($con, $sql);

        if ($result) {

          while ($row = mysqli_fetch_assoc($result)) {

            $categoryname = $row['cat_name'];
            $cat_d = $row['cat_d'];

            echo '<form class="nav" action="cat_edit.php" method="POST"> <tr>
	
	<td> <input type = "text" name = "categoryname" value="' . $categoryname . '"/></td>

<td>

<button type="submit" class="button button2 " name="Edit">Update</button></td>


<td>
<input type="hidden" name="cid" value= "' . $cat_d . '">
<button type="submit" class="button button3 " name="Delete">Delete</button>

</form>
</td>
</form>	
</tr> ';
          }
        }

        ?>

</body>

</html>