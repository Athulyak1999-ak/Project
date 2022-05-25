<h1>Payment Complete</h1>
<?php
session_start();
echo '<script>alert("Payment Scuessfully completed")</script>';
echo ('
    <script>
    window.location.href="society.php";
    </script>');
?>