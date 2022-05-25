<?php
session_start();
//if (!isset($_SESSION['role'])) {
// header("location: ./delivery_login.php");
//}
?>
<?php
include "../assets/db_check/dbcon.php";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>


<body>

    <div class="sidebar">
        <ul class="ul1">
            <li>
                <h2 style="color:white;">DELIVERY AGENT</h2>
            </li>
            <ul>
                <li>
                    <a class="nav-link" href="#">
                        <i class="ion ion-ios-keypad"></i>
                        <span class="nav-link-text">Order details</span>
                    </a>
                </li>
            </ul>

            <ul>


                <li><a href="../logout.php"><i class="fas fa-lock"></i>LogOut</a></li>
            </ul>
    </div>


    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>

</body>

</html>