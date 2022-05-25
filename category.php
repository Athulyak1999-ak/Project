<!DOCTYPE html>
<?php
include 'assets/db_check/dbcon.php';
include 'dashboard.php';
?>
<html lang="en" dir="ltr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">

  <title>Category</title>
  <style>
    .fieldset {

      margin-left: 400px;
      position: relative;

    }
  </style>
</head>

<body>



  <div class='row justify-content-center'>

    <form action="#" method="POST">
      <div class='form-group'>
        <label for="catname">Category Name</label>
        <input type="text" placeholder="Enter Category Name" name='catname' data-required="true" data-type="email" data-error-message="Your Category Name is required">
      </div>
      <div class='form-group'>
        <input type="submit" class="btn btn-primary " value="SAVE" name="add-btn">
      </div>

    </form>
  </div>


</body>
<?php
/*if(isset($_POST["submit"]))
{
  
$categoryid = $_POST["catid"];
$categoryname = $_POST["catname"];
//$upl=$_FILES["img"]["name"];
//move_uploaded_file($_FILES["img"]["tmp_name"],"register/".$_FILES["img"]["name"]);
$insert="INSERT INTO `category`( `category_id`,`category_name`)VALUES('$category_id','$category_name') ";
if(mysqli_query($con,$insert))
{
  echo("<script LANGUAGE='JavaScript'>
    window.alert('Category Added Successfully')
    window.location.href='admin.php';
    </script>");

}
else
  {  echo("<script LANGUAGE='JavaScript'>
    window.alert('Something Went Wrong')
    window.location.href='categories.php';
  </script>");
}
}
?>*/

if (isset($_POST['add-btn'])) {
  $category_name = $_POST['catname'];
  $sql = "SELECT cat_name from `category`";
  $result1 = mysqli_query($con, $sql);
  $flag_isExit_category = 0;
  while ($row = mysqli_fetch_assoc($result1)) {
    if ($row['cat_name'] == $category_name) {
      $flag_isExit_category = 1;
    }
  }
  if ($flag_isExit_category == 1) {
    echo ("<script>alert('category already exists')</script>");
  } else {
    $result = "INSERT INTO `category`( `cat_name`) VALUES ('$category_name')";

    if (mysqli_query($con, $result)) {
      echo ("<script LANGUAGE='JavaScript'>
      window.alert('Category Added Successfully')
      window.location.href='category_view.php';
      </script>");
    } else {
      echo ("<script LANGUAGE='JavaScript'>
        window.alert('Something Went Wrong')
        window.location.href='categories.php';
      </script>");
    }
    header('Location:dashboard.php');
  }
}
?>

</html>