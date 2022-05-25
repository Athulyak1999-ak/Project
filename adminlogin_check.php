<?php
session_start();
include "assets/db_check/dbcon.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if (empty($username)) {
        header("Location: adminlogin.php?error=User Name is Required");
    } else if (empty($password)) {
        header("Location: adminlogin.php?error=Password is Required");
    } else {

        $sql = "SELECT * FROM `tbl_register` WHERE email='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
            // the user name must be unique
            $row = mysqli_fetch_assoc($result);
            echo '<script>alert("session setting")</script>';

            $_SESSION['erSession'] = session_id();
            $_SESSION['username'] = $row['email'];
            $_SESSION['userId'] = $row['id'];

            $_SESSION['password'] = $row['password'];


            if ($row['password'] === $password && $row['role'] == $role) {

                if ($row['role'] == 'admin') {

                    $_SESSION['username'] = $row['email'];
                    header("Location: ./dashboard.php");
                } else {
                    header("Location: adminlogin.php?error=Incorrect category selection");
                }
            } else {
                header("Location: adminlogin.php?error=Incorrect user name or password");
            }
        }
    }
} else {
    header("Location: adminlogin.php");
}
