<?php
//index.php
include "assets/db_check/dbcon.php";
include 'dashboard.php';
$query = "SELECT * FROM tbl_milkvalue";
$result = mysqli_query($con, $query);
$chart_data = '';
while ($row = mysqli_fetch_array($result)) {
    $chart_data .= "{ sell_date:'" . $row["sell_date"] . "', crt_milkrate:" . $row["crt_milkrate"] . "}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

</head>
<style>
    #rightbox {
        float: right;
        background: white;
        width: auto;
        height: auto;
    }

    h3 {

        text-align: right;
    }
</style>

<body>
    <br /><br />
    <div class="container" style="width:900px;">

        <h3>MilkRate Changing </h3>
        <br /><br />
        <div id="rightbox">
            <div id="chart"></div>
        </div>
    </div>
</body>

</html>

<script>
    Morris.Bar({
        element: 'chart',
        data: [<?php echo $chart_data; ?>],
        xkey: 'sell_date',
        ykeys: ['crt_milkrate'],
        labels: ['crt_milkrate'],
        hideHover: 'auto',
        stacked: true
    });
</script>