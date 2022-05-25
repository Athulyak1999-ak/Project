<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>add product</title>
    <link rel="stylesheet" href="assets/style.css" />

</head>

<body>
    <?php
    include 'assets/db_check/dbcon.php';
    //include 'dashboard.php';
    session_start();


    if (isset($_POST["submi"])) {
        $id = $_POST["id"];
        //echo ($id);
        $p_name = $_POST['p_name'];
        $p_price = $_POST['price'];
        $category = $_POST['category'];
        $p_description = $_POST['description'];
        $p_quantity = $_POST['quantity'];

        // echo ($p_name);
        $query    = "UPDATE `products` SET `p_name`='$p_name',`price`='$p_price',`cat_d`='$category',`description`='$p_description',`quantity`='$p_quantity' WHERE id='$id'";

        $result   = mysqli_query($con, $query);
        if ($result) {
            echo '<script>alert("Product edited successfully")</script>';
            header("Location: adminproduct_view.php");
        } else {
            echo '<script>alert("Product not edited successfully")</script>';
        }
    }
    if (isset($_POST["edit"])) {
        $id = $_POST["id"];
        //  echo ($id);
        $queryingProduct = "SELECT * FROM `products` WHERE `id`=$id";
        $products = $con->query($queryingProduct);
        if ($products->num_rows > 0) {
            while ($eachProduct = $products->fetch_assoc()) {
    ?>
                <form class="form" action="#" method="POST" enctype="multipart/form-data">
                    <h1 class="login-title">EDIT PRODUCT</h1>
                    <table>
                        <tr>
                            <td><label class="form-control-label">ProductName</label></td>
                            <td>
                                <input type="text" class="login-input" name="id" value="<?php echo $eachProduct['id']; ?>" hidden />

                                <input type="text" class="login-input" name="p_name" value="<?php echo $eachProduct['p_name']; ?>" placeholder="product name" required />
                            </td>
                        </tr>

                        <tr>
                            <td><label class="form-control-label">Price</label></td>
                            <td>

                                <input type="text" class="login-input" min="1" max='100000' name="price" value="<?php echo $eachProduct['price']; ?>" placeholder="price" required />
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
                                        while ($row = $result->fetch_assoc())
                                            if ($row['cat_d'] == $eachProduct['cat_d']) {
                                                echo '<option selected  value="' . $row['cat_d'] . '">' . $row['cat_name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $row['cat_d'] . '">' . $row['cat_name'] . '</option>';
                                            }
                                    }

                                    ?>
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <td><label class="form-control-label">Product Description</label></td>
                            <td>

                                <input type="text" class="login-input" name="description" value="<?php echo $eachProduct['description']; ?>" placeholder="description" required />
                            </td>
                        </tr>
                        <tr>
                            <td><label class="form-control-label">Quantity</label></td>
                            <td>
                                <input type="text" class="login-input" name="quantity" value="<?php echo $eachProduct['quantity']; ?>" placeholder="Quantity" required />
                            </td>
                        </tr>




                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submi" value="SUBMIT" class="login-button">
                            </td>
                        </tr>

                    </table>

                </form>
    <?php
            }
        }
    }
    ?>
    <?php


    ?>
    </div>

</body>

</html>