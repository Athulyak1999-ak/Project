<?php
session_start();
include "assets/db_check/dbcon.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = MD5(test_input($_POST['password']));
    // $role = test_input($_POST['role']);

    if (empty($username)) {
        header("Location: ./index.php?error=User Name is Required");
    } else if (empty($password)) {
        header("Location: ./login.php?error=Password is Required");
    } else {

        $sql = "SELECT * FROM `tbl_register` WHERE email='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) >= 1) {
            // the user name must be unique
            $row = mysqli_fetch_assoc($result);
            echo '<script>alert("session setting")</script>';

            $_SESSION['erSession'] = session_id();
            $_SESSION['username'] = $row['email'];
            $_SESSION['userId'] = $row['id'];
            //echo $id = $_SESSION['userId'];

            $_SESSION['password'] = $row['password'];

            echo ("/" . $row['role']) . "/";

            if ($row['password'] === $password) {

                if ($row['role'] == 'customer') {
                    $_SESSION['role'] =  $row['role'];

                    $_SESSION['username'] = $row['email'];
                    header("Location: ./shop.php");
                } else if ($row['role'] === 'admin') {
                    //  echo ("dasdsadasdsadas");
                    $_SESSION['role'] =  $row['role'];

                    $_SESSION['username'] = $row['email'];
                    header("Location: ./milkratechart.php");
                } else if ($row['role'] == 'seller') {
                    $_SESSION['role'] =  $row['role'];

                    $_SESSION['username'] = $row['email'];
                    header("Location: ./seller_home.php");
                } else {
                    header("Location: ./login.php?error=Incorrect category selection");
                }
            } else {
                header("Location: ./login.php?error=Incorrect user name or password");
            }
        } else {
            header("Location: ./login.php?error=Incorrect user name or password");
        }
    }
} else {
    header("Location: ./login.php");
}
