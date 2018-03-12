<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
      $q = $_REQUEST["q"];
      if($q == "1"){
        echo '
        <li><a href="#">Technology</a></li>
        <li><a href="#">Education</a></li>
        <li><a href="#">Financial</a></li>
        <li><a href="#">Health</a></li>
        <li><a href="#">Social</a></li>
        <li><a href="#">Hobbies</a></li>
        ';
      }else if($q == "2"){

        for ($i=1; $i <=31 ; $i++) {
            echo "<li><a href='#'>$i</a></li>";
        }

      }else if($q == "3"){
        echo '
          <li><a href="#">January</a></li>
          <li><a href="#">February</a></li>
          <li><a href="#">March</a></li>
          <li><a href="#">April</a></li>
          <li><a href="#">May</a></li>
          <li><a href="#">June</a></li>
          <li><a href="#">July</a></li>
          <li><a href="#">August</a></li>
          <li><a href="#">September</a></li>
          <li><a href="#">October</a></li>
          <li><a href="#">November</a></li>
          <li><a href="#">December</a></li>
      ';
      }else if($q == "4"){
        echo '
          <li><a href="#">2018</a></li>
      ';
      }else if($q == "5"){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "little_worm";

        $con = mysqli_connect($servername,$username,$password,$dbname);
        mysqli_set_charset($objCon, "utf8");
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

        mysqli_select_db($con,"ajax_demo");
        $sql =   "SELECT  organizer_email FROM event";
        $result = mysqli_query($con,$sql);

        while($row = mysqli_fetch_array($result)) {
          $result_1 = mysqli_query($con,"SELECT DISTINCT organizer.company_name FROM `event` JOIN `organizer` WHERE organizer.email='".$row['organizer_email']."'");
          while($row_1 = mysqli_fetch_array($result_1)) {
            $or_name = $row_1['company_name'];
          }

            echo '<li id="fil"><a href="#">'.$or_name.'</a></li>';

        }

        mysqli_close($con);

      }else if($q == "6"){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "little_worm";

        $con = mysqli_connect($servername,$username,$password,$dbname);
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

        mysqli_select_db($con,"ajax_demo");
        $sql =   "SELECT  place FROM event";
        $result = mysqli_query($con,$sql);

        while($row = mysqli_fetch_array($result)) {

            echo '<li><a href="#">'.$row["place"].'</a></li>';

        }

        mysqli_close($con);
      }

     ?>
     <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
     <script type="text/javascript">
     // $("li a").on("click", function(e){
     //    alert($(this).text());
     //    // console.log($(this).text())
     //
     // });


       // $('.form-check-input').change(function() {
       //   if($(this).val() == "Type"){
       //     xmlhttp.open("GET","filterDropdown.php?q="+"1",true);
       //     xmlhttp.send();
       //   }
     </script>
  </body>
</html>
