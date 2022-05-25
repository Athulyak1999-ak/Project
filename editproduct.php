<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Edit product</title>
    <link rel="stylesheet" href="assets/style.css" />

</head>

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
        $p_description = mysqli_real_escape_string($con, $p_description);


        $p_image = $_FILES["p_image"]["name"];
        move_uploaded_file($_FILES["p_image"]["tmp_name"], "admin/pic/" . $_FILES["p_image"]["name"]);
        $query    = "INSERT into `products` (`p_name`,`price`,`cat_d`,`image`,`description`)
                     VALUES ( '$p_name', '$p_price','$cat', '$p_image','$p_description')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo '<script>alert("Product added successfully")</script>';
            header('Location:dashboard.php');
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='add.php'>add product</a> again.</p>
                  </div>";
        }
    } else {
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
                        <input type="number" class="login-input" min="1" name="p_price" placeholder="price" required />
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
                    <td><label class="form-control-label">Product quantity</label></td>
                    <td>
                        <input type="number" class="login-input" name="p_description" min='1' required />
                    </td>
                </tr>

                <tr>
                    <td><label class="form-control-label">Product quantity</label></td>
                    <td>
                        <input type="number" class="login-input" name="p_description" min='1' required />
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="ADD" class="login-button">
                    </td>
                </tr>

            </table>

        </form>
    <?php
    }
    ?>
    </div>

</body>

</html>