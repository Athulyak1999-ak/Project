<?php
include "./php-connect/dbcon.php";
session_start();
if (isset($_SESSION["erSession"]) != session_id()) {
    header("Location: index.php");
    die();
} else {

?>

    

    <body>
        <header>
           
            <div class="hed1">
            <img src="assets/images/icon/logo1.jpg" />
        </div>
            <div class="hed2">
                <h1>Admin </h1>
                
            </div>
            <div class="hed3">
                <a href="logout.php"><img src="assets/images/icon/logout.png" /></a>
            </div>
        </header>

        <nav>
            <div class="navbar">
                <a class="active" href="./admin_home.php">Home</a>
                <div class="subnav">
                    <button class="subnavbtn">User register <i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        <a href="./admin.php">Add user</a>
                        <a href="./admin_reg.php">User details</a>
                    </div>
                </div>
                <div class="subnav">
                    <button class="subnavbtn">Products<i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                    <a href="./category.php">Category</a>
                    <a href="./add.php">Add item</a>
                    </div>
                </div>
                

            </div>
        </nav>

       
        
    </body>

    </html>

<?php
}
?>