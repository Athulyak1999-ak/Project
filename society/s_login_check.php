<?php
session_start();
include "../assets/db_check/dbcon.php";

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
        header("Location: ./society_login.php?error=Password is Required");
    } else {

        $sql = "SELECT * FROM `tbl_society` WHERE s_email='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) >= 1) {
            // the user name must be unique
            $row = mysqli_fetch_assoc($result);
            echo '<script>alert("session setting")</script>';

            // $_SESSION['erSession'] = session_id();
            $_SESSION['username'] = $row['s_email'];
            $_SESSION['userId'] = $row['society_id'];

            $_SESSION['password'] = $row['password'];
            $_SESSION['role'] = "society";


            if ($row['password'] === $password) {

                $_SESSION['username'] = $row['s_email'];
                header("Location: ./society.php");
            }
        } else {
            header("Location: ./society_login.php?error=Incorrect user name or password");
        }
    }
} else {
    // header("Location: ./society_login.php");
}
