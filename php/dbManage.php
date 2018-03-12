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
$q = intval($_GET['q']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "little_worm";

$con = mysqli_connect($servername,$username,$password,$dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
if ($q == "1"){
  $sql="SELECT * FROM user WHERE position='USER'";
}else if($q == "2"){
  $sql="SELECT * FROM user WHERE position='ORGANIZER'";
}else if($q == "3"){
  $sql="SELECT * FROM user";
}

$result = mysqli_query($con,$sql);

echo "
    <table class='table table-bordered table-striped'>
    <thead>
      <tr>
        <th>#</th>
        <th>User Name</th>
        <th>Reported</th>
        <th></th>
      </tr>
    </thead>


";
$count = 1;
while($row = mysqli_fetch_array($result)) {
    $id = $row["email"];
    echo "
    <tbody>
      <tr >
        <td>$count</td>";

     echo '<td>'.$row["email"].'</td>';
     echo '<td>'.$row["report_point"].'</td>';
     echo '<td><button type="button" class="btn btn-danger" onclick="clicked(this.id)" id="'.$id.'">Delete User</button></td> ';
     echo '</tr>';
    echo "</tbody>";
    $count++;
}
echo "</table>";
mysqli_close($con);
?>

</body>
</html>
