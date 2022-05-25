<?php
include "assets/db_check/dbcon.php";
include 'dashboard.php';


?>
<!doctype html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/datatables/datatables.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/style.css">

    <title>User View</title>
    <style>
        .userdiv {
            margin-left: 290px;

        }
    </style>
</head>

<body>
    <div class="userdiv">
        <table class="table table-hover table-dark" id="product_table" align="center">

            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Gender</th>



                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from `tbl_register`where role='seller' ";
                $result = mysqli_query($con, $sql);

                if ($result) {

                    while ($row = mysqli_fetch_assoc($result)) {

                        $name = $row['name'];
                        $email = $row['email'];
                        $address = $row['address'];
                        $gender = $row['gender'];


                        echo ' <tr>
	
	
	<td>' . $name . '</td>
	<td>' . $email . '</td>
	<td>' . $address . '</td>
	<td>' . $gender . '</td>

	
	
</tr>';
                    }
                }
                ?>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#product_table').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    });
</script>