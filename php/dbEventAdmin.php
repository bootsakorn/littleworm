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
$r = ($_GET['r']);


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
  $sql="SELECT id,name,organizer_name,date,place,participant_amt FROM event WHERE type ='$r' ORDER BY id";

}
else if($q == "5"){
  $sql="SELECT id,name,organizer_name,date,place,participant_amt FROM event WHERE organizer_name ='$r' ORDER BY id";
}
else if($q == "6"){
  $sql="SELECT id,name,organizer_name,date,place,participant_amt FROM event WHERE place ='$r' ORDER BY id";
}
else if($q == "0"){
  $sql="SELECT id,name,organizer_name,date,place,participant_amt FROM event ORDER BY id";
}
else if($q == "2"){
  $sql="SELECT id,name,organizer_name,date,place,participant_amt FROM event WHERE date ='$r' ORDER BY id";
}

$result = mysqli_query($con,$sql);

  echo "
      <table class='table table-bordered table-striped'>
      <thead>
        <tr>

          <th>Event Name</th>
          <th>Organizer Name</th>
          <th>Date</th>
          <th>place</th>
          <th>Quantity</th>
          <th></th>
        </tr>
      </thead>

  ";

while($row = mysqli_fetch_array($result)) {
    $i = $row["id"];
    echo $i;
    echo "
    <tbody>
      <tr >
        ";
     echo '<td>'.$row["name"].'</td>';
     echo '<td>'.$row["organizer_name"].'</td>';
     $date = substr($row["date"],8,2)."-".substr($row["date"],5,2)."-".substr($row["date"],0,4);

     echo '<td>'.$date.'</td>';
     echo '<td>'.$row["place"].'</td>';
     echo '<td>'.$row["participant_amt"].'</td>';
     echo '<td><button type="button" class="btn btn-danger"  onclick="clickedEvent(this.id)" id="'.$i.'">Delete Event</button></td>
     </tr>';
    echo "</tbody>";

}
echo "</table>";
mysqli_close($con);
?>


</body>
</html>
