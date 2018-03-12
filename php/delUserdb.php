<!DOCTYPE html>
<html>
<head>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">

</head>
<body>

<?php
$q = ($_GET['q']);
$t = ($_GET['t']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "little_worm";

$con = mysqli_connect($servername,$username,$password,$dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
if($t == "user"){
  $sql = "DELETE FROM user WHERE email ='$q'";

}else if($t == "event"){
  $sql = "DELETE FROM event WHERE id ='$q'";
}
mysqli_query($con,$sql);

mysqli_close($con);
?>

</body>
</html>
