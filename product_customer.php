<?php
include "assets/db_check/dbcon.php";
session_start();
$vari = $_SESSION['username'];

$res = mysqli_query($con, " SELECT * FROM `tbl_register` where email='$vari'");
while ($r = mysqli_fetch_array($res)) {
    $username = $r['name']; //"$username- anyname can be written", "$r['email]- database table field name" 
    $password = $r['password'];
    $phone = $r['mobile'];
    $img = $r['image'];
    $mail = $r['email'];
    $addr = $r['address'];
    $gen = $r['gender'];
    $upid = $r['id'];
}




//add to cart

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION["shopping_cart"])) {

        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");


        if (!in_array($_GET['id'], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET['id'],
                'item_name' => $_POST['hidden_name'],
                'item_qnt' => $_POST['hidden_qnt'],
                'item_amt' => $_POST['hidden_amt']

            );

            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="customer_home.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET['id'],
            'item_name' => $_POST['hidden_name'],
            'item_qnt' => $_POST['hidden_qnt'],
            'item_amt' => $_POST['hidden_amt']

        );

        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

//remove item from cart............

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="customer_home.php"</script>';
            }
        }
    }
}

//--------------logout----------

if (isset($_SESSION["erSession"]) != session_id()) {
    header("Location: home.php");
    die();
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Athulya">
        <title> Milkmilkers Website</title>
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="icon" href="./image/icon/logo.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,700;1,200;1,300;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet">

    </head>

    <body>

        <header>
            <div class="hed1">
                <img src="./image/icon/logo.png" />
            </div>
            <div class="hed2">
                <h1>Milkmilkers Website</h1>

            </div>
            <div class="hed3">
                <a href="logout.php"><img src="./image/icon/logout.png" /></a>
            </div>
        </header>
        <nav>
            <ul>
                <li><a class="active" href="./customer_home.php">Home</a></li>
                <li><a href="#section2">Products</a></li>
                <li><a href="#">Purchased Product</a></li>
                <li><a href="./customer_profile.php">Profile</a></li>
                <li><a href="#section4">Message/Suggestion</a></li>
            </ul>
        </nav>


        <!-----------------------------------------------Product view------------------------------------------------------------->

        <section class="section_cust_home1" id="section2">
            <div class="cust_head">
                <h1><a>|</a> Products</h1>
            </div>
            <div class="cust_table">
                <table>
                    <tr>

                        <th>Image</th>
                        <th>Subsidy on Food</th>
                        <th>Quantity(kg or liter)</th>
                        <th>Price</th>
                        <th>Selection</th>
                    </tr>

                    <?php

                    $result = mysqli_query($con, "SELECT * FROM `tbl_card_details` where card_type='$ct'");
                    while ($p = mysqli_fetch_array($result)) {
                        $itmid = $p['cd_id'];

                        $itmn = $p['item_name'];
                        $qnt = $p['quantity'];
                        $im = $p['image'];
                        $amt = $p['amount'];

                    ?>
                        <form method="POST" action="customer_home.php?id=<?= $p['cd_id'] ?>">
                            <tr>

                                <td><img src="./image/uploads/<?php echo $im; ?>" height="150" width="120" /></td>
                                <td>
                                    <?php echo $itmn ?>
                                    <input type="hidden" name="hidden_name" value="<?php echo $itmn ?>">
                                </td>
                                <td>
                                    <?php echo $qnt ?>
                                    <input type="hidden" name="hidden_qnt" value="<?php echo $qnt ?>">
                                </td>
                                <td>
                                    Rs.<?php echo $amt ?>/-
                                    <input type="hidden" name="hidden_amt" value="<?php echo $amt ?>">
                                </td>
                                <td>
                                    <input type="submit" name="add_to_cart" value="Add to cart" />
                                </td>
                            </tr>
                        </form>

                    <?php
                    }
                    ?>
                </table>

            </div>
        </section>

        <!-----------------------------------------------View Selected product items------------------------------------------------------------->

        <section class="section_cust_home2">
            <div class="cust_head">
                <h1><a>|</a> Selected Item</h1>
            </div>
            <div class="cust_table">
                <table border="1">
                    <tr>
                        <th>Item name</th>

                        <th>Quantity</th>

                        <th>Price</th>

                        <th>Action</th>
                    </tr>
                    <?php
                    if (!empty($_SESSION["shopping_cart"])) {
                        $total = 0;
                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?>
                            <tr>
                                <td><?php echo $values["item_name"]; ?></td>
                                <td><?php echo $values["item_qnt"]; ?></td>
                                <td><?php echo $values["item_amt"]; ?></td>
                                <td><a href="customer_home.php?action=delete&id=<?php echo $values["item_id"]; ?>">Remove</a></td>
                            </tr>
                        <?php
                            $total = $total + $values["item_amt"];
                        }
                        ?>
                        <tr>
                            <td colspan="2">Total</td>
                            <td><?php echo $total ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </section>

        <!-----------------------------------------------Sending Message's or suggestions------------------------------------------------------------->
        <?php

        if (isset($_POST["sub"])) {

            $subj = $_POST["subject"];
            $messg = $_POST["message"];
            mysqli_query($con, "INSERT INTO `tbl_customer_complaint`(`cust_id`, `cc_name`, `cc_subject`, `cc_message`, `status`) VALUES ('$upid','$username','$subj','$messg','Pending')");
            echo '<script type="text/javascript">alert("Message sended successfully")</script>';
        }

        ?>
        <section class="section_cust_home3" id="section4">
            <div class="cust_head">
                <h1><a>|</a> Message / Suggestions</h1>
            </div>
            <div class="cust_table1">
                <form action="#" method="post" enctype="multipart/form-data">
                    <table>

                        <tr>
                            <td>Subject:</td>
                            <td><input type="text" placeholder="Enter the subject" name="subject"></td>
                        </tr>
                        <tr>
                            <td>Drop Us a Line:</td>
                            <td><textarea row="20" column="20" placeholder="Drop your message..." name="message"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button name="sub">Send</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </section>


    </body>

    </html>

<?php
}
?>