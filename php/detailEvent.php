<<<<<<< HEAD
<!DOCTYPE html>
 <?php
  session_start();
  $id_event = $_SESSION['id_event'];
  $user =  $_SESSION['email'];
  ?>



<html>
<head>
  <title>event</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
  <meta name="viewport" content="initial-scale=1.0">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK3RgqSLy1toc4lkh2JVFQ5ipuRB106vU&callback=initMap" async defer></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/index_style.css">
  <link rel="stylesheet" type="text/css" href="../css/detailEvent.css">
  <link rel="stylesheet" type="text/css" href="../css/frame.css">


</head>


<body>

<?php
      include "center.php";
      include "connectDB.php";
      include "comment.php";
      $page = new Page();
      $page->header();
      ?>
      <div class="collapse navbar-collapse ">
				<form name="form2" method="post" action="event_page.php">
	      <ul class="nav navbar-nav " id="type_event">
	        <li class="active"><a href="index.php">Home</a></li>
					<li><a href="event_page.php?type=Technology">Technology</a></li>
	        <li><a href="event_page.php?type=Education">Education</a></li>
	        <li><a href="event_page.php?type=Financial">Financial</a></li>
	        <li><a href="event_page.php?type=Health">Health</a></li>
	        <li><a href="event_page.php?type=Social">Social</a></li>
	        <li><a href="event_page.php?type=Hobbies">Hobbies</a></li>
	      </ul>
				</form>
	      <ul id="login" class="nav navbar-nav navbar-right">
	        <li><a href="sign_in.php"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
	        <li><a href="registerSelect.php"><span class="glyphicon glyphicon-plus-sign"></span> Register</a></li>
	      </ul>
				<ul id="profile" class="nav navbar-nav navbar-right">
					<li><a id = "username"></a></li>
					<li class="dropdown">
					  <a class="glyphicon glyphicon-menu-hamburger" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="caret"></span>
					  </a>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					    <li class="dropdown-menu-item"><a href="#">ประวัติส่วนตัว</a></li>
							<li id="adt" class="dropdown-menu-item"><a href="#">บันทึกการเข้าร่วมกิจกรรม</a></li>
							<li id="org1" class="dropdown-menu-item"><a href="#">บันทึกการจัดกิจกรรม</a></li>
							<li id="org2" class="dropdown-menu-item"><a href="#">สร้างกิจกรรม</a></li>
							<li id="adm" class="dropdown-menu-item"><a href="#">จัดการระบบ</a></li>
					    <li class="dropdown-menu-item"><a href="#">เปลี่ยนรหัสผ่าน</a></li>
					    <li role="separator" class="divider"></li>
					    <li class="dropdown-menu-item"><a href="sign_out.php" id="sign_out">ออกจากระบบ</a></li>
					  </ul>
					</li>
	      </ul>
	    </div>
	  </div>
	</nav>
      <?php
      $openDB = new Database();
      $con = $openDB->connect();
      $statement = $con->query("SELECT * FROM event WHERE id = $id_event");
       while($row = $statement->fetch(PDO::FETCH_BOTH)) {
          $name = $row['name'];
          $date_start = $row['date_start'];
          $max = $row['max'];
          $type = $row['TYPE'];
          $vdo = $row['vdo'];
          $organizer_email = $row['organizer_email'];
          $price = $row['price'];
          $precon = $row['precondition'];
          $start_time = $row['start_time'];
          $start_time = substr($start_time,0,5);
          $end_time = $row['end_time'];
          $end_time = substr($end_time,0,5);
          $submit = $row['datetime_submit'];
          $detail = $row['detail'];
          $evaluation = $row['evaluation'];
          $seat = $row['seat'];
          $status = $row['status'];
          $date_time = substr($submit,8,2)."-".substr($submit,5,2)."-".substr($submit,0,4)." เวลา: ".substr($submit,11,5)." น.";
          $date = substr($submit,8,2)."-".substr($submit,5,2)."-".substr($submit,0,4);
        }



        $statement = $con->query("SELECT * FROM googlemap WHERE id = '$id_event'");
        while($row = $statement->fetch(PDO::FETCH_BOTH)) {
          $place = $row['place_Name'];
          $location = $row['place_Location'];
          $lat = $row['place_Lat'];
          $lng = $row['place_Lng'];
        }


        $statement = $con->query("SELECT position FROM user WHERE email = '$user'");
        while($row = $statement->fetch(PDO::FETCH_BOTH)) {
          $posi = $row['position'];
        }


        if(isset($_POST['submitcm'])){
            $user = $_POST['userid'];
            $eventid = $_POST['eventid'];
            $mes = $_POST['ment'];

             try {
              $sql = "INSERT INTO comment(eventid, user, message) VALUES('$eventid', '$user', '$mes')";
                $con->exec($sql);
                }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
                }

          }

          if(isset($_POST['cancle'])){

            try {
        $sql = "UPDATE event SET status='Event Cancle' WHERE id='$id_event'";
          $con->exec($sql);
          }catch(PDOException $e){
          echo "Connection failed: " . $e->getMessage();
          }
                    }


           if(isset($_POST['join'])){
            $check = 1;
             $statement = $con->query("SELECT user_email FROM attend_event_schedule WHERE user_email = '$user'");
            while($row = $statement->fetch(PDO::FETCH_BOTH)) {
              $c = $row['user_email'];
              $check = 0;
            }
            if( $check == 1){
         try {
              $sql = "INSERT INTO attend_event_schedule(event_id, user_email, attend_status, precondition_status, receipt_status) VALUES('$id_event', '$user', 'no','no','no')";
                $con->exec($sql);
                }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
                }
                try {
                $sql = "UPDATE event SET seat = seat + 1 WHERE id='$id_event'";
                  $con->exec($sql);
                  }catch(PDOException $e){
                  echo "Connection failed: " . $e->getMessage();
                  }
                    header("Refresh:0; url=detailEvent.php");
                    }
          }


       ?>




 <?php
         $arr_img = array();
         $index_img = 0;
         foreach($con->query("SELECT pathImage FROM event_image WHERE event_id = '$id_event'") as $row) {
           $arr_img[$index_img] = $row['pathImage'];
           $index_img++;
      }
      $index_img = $index_img - 2;

    echo'<div class="block_content">';
      echo '<div id="frame"><h4 align = "right">สร้างเมื่อ: '.$date_time.'</h3>
      <div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
      for ($m=1; $m < $index_img; $m++){
        echo ' <li data-target="#myCarousel" data-slide-to="'.$m.'"></li>
        ';
      }

    echo '
    </ol>
    ';

       for ($m=0; $m < count($arr_img); $m++) {
          if ($m == 0){
            echo '<div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="'.$arr_img[$m].'" style="width:100%;">
              </div>';
          } else {
            echo '<div class="item">
              <img src="'.$arr_img[$m].'" style="width:100%;">
            </div>';
          }
        }

     echo '</div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div> ';

  echo '<center><u><h1 id = "head"><b>'.$name.'</br></h1></u><br><br>';
  if($posi == "ORGANIZER"){
  echo '<div>
        <form action="#" method="POST">
        <input type="submit" name="cancle" value="cancle event"class="comment-btn">
        </form>

        <form action="#" method="POST">
        <input type="submit" name="manage" value="จัดการผู้เข้าร่วม"class="comment-btn">
        </form>

         <form action="evaluation.php" method="POST">
        <input type="submit" name="evaluation" value="ประเมินผู้เข้าร่วม"class="comment-btn">
        </form>


  </div>';

  }


  if($posi== "USER"){
  echo '<div>
        <form action="detailEvent.php" method="POST">
        <input type="submit" name="join" value="เข้าร่วม"class="comment-btn">
        </form>

        <form action="mange.php" method="POST">
        <input type="submit" name="manage" value="แจ้งดอนเงิน"class="comment-btn">
        </form>

         <form action="evaluation.php" method="POST">
        <input type="submit" name="evaluation" value="ส่งเอกสารเพิ่มเติม"class="comment-btn">
        </form>


  </div>';

  }

  if($vdo != ""){
 echo "<center><video controls>
  <source src='".$vdo."' type='video/mp4'>
  </video></center>";
  }

 echo '<h3><strong>วันที่จัดงาน : </strong>'.$date.'</h3>
  <h3><strong>ตั้งแต่เวลา : </strong>'.$start_time.' น. - '.$end_time.' น.</h3>
  <h3><strong>ราคา : </strong>'.$price.'</h3>
 <h3><strong>หมวดหมู่ : </strong>'.$type.'</h3>
  <h3><strong>จำนวนที่รับ : </strong>'.$max.'</h3>
  <h3><strong>จำนวนผู้เข้าร่วม : </strong>'.$seat.'</h3>
  <h3><strong>สถานะ : </strong>'.$status.'</h3></center></center>

<div class="container text-center">
  <div class="row">
    <div class="col-sm-6">
    <div class="well"  style="word-wrap: break-word;"">
      <u><h2><strong>เงื่อนไขเพิ่มเติม</strong></h2></u>
       <p>'.nl2br($precon).'</p>
    </div>
    </div>

    <div class="col-sm-6">
      <div class="well"  style="word-wrap: break-word;">
      <u><h2><strong>รายละเอียดงาน</strong></h2></u>
       <p>'.nl2br($detail).'</p>
      </div>
    </div>
  </div>
</div><br>
  <center><h4><strong>สถานที่จัดงาน : </strong>'.$place.' '.$location.'</h4></center>
   <center><div id="map"></div></center>
    <div class="comment">
          <hr>
          <div class="comment-detail">
            <h4 id="text_hc">Leave a Comment:</h4>
            <form role="form" method="POST" action="detailEvent.php">
              <div class="form-group">
                  <input type="hidden" name="eventid" value="'.$id_event.'">
                 <input type="hidden" name="userid" value="'.$user.'">
                  <textarea class="form" rows="4" cols=100% name="ment" required></textarea>
              </div>
              <button type="submit" name="submitcm" id="submitcm">Comment</button>
            </form>
            </center>
            <br><br>
          </div>
      </div>
 </div>
 </div>';
 showComment($con);




      $page->footer();
      if (empty($_SESSION["email"])){
        echo '<script>
        $("#login").show();
        $("#profile").hide();
         </script>';
        }

      else {
          echo '<script>
            $("#username").html("'.$_SESSION["email"].'");
            $("#login").hide();
            $("#profile").show();
            </script>';
            if ($_SESSION['position'] == 'ADMIN'){
              echo '<script>
                $("#username").html("'.$_SESSION["email"].'");
                 $("#login").hide();
                 $("#profile").show();
                 $("#adt").hide();
                 $("#org1").hide();
                 $("#org2").hide();
                 $("#adm").show();
               </script>';
            } elseif ($_SESSION['position'] == 'USER') {
               print_r($_SESSION);
               echo '<script>
               $("#username").html("'.$_SESSION["email"].'");
               $("#login").hide();
               $("#profile").show();
               $("#adt").show();
               $("#org1").hide();
               $("#org2").hide();
               $("#adm").hide();</script>';
            } elseif ($_SESSION['position'] == 'ORGANIZER') {
               echo '<script>$("#username").html("'.$_SESSION["email"].'");
               $("#login").hide();
               $("#profile").show();
               $("#adt").hide();
               $("#org1").show();
               $("#org2").show();
               $("#adm").hide();</script>';
            }
        }



?>


 <script type="text/javascript">

      function initMap() {
        var myLatlng = new google.maps.LatLng(<?php echo $lat;?>,<?php echo $lng;?>);
      var mapOptions = {
        zoom: 17,
        center: myLatlng
      }
      var map = new google.maps.Map(document.getElementById("map"), mapOptions);

      var marker = new google.maps.Marker({
          position: myLatlng,
      });
      marker.setMap(map);
    }
 </script>

</body>
</html>
=======
<!DOCTYPE html>
 <?php
  session_start();
  if (isset($_SESSION['id'])){
    $id_event = $_SESSION['id'];
  }
  if (isset($_SESSION['email'])){
    $user =  $_SESSION['email'];
  } else {
    $user = "";
  }



  ?>



<html>
<head>
  <title>event</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
  <meta name="viewport" content="initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/index_style.css">
  <link rel="stylesheet" type="text/css" href="../css/detailEvent.css">
  <link rel="stylesheet" type="text/css" href="../css/frame.css">


</head>


<body>

<?php
      include "center.php";
      include "connectDB.php";
      include "comment.php";
      $page = new Page();
      $page->header();
      ?>
      <div class="collapse navbar-collapse ">
        <form name="form2" method="post" action="event_page.php">
        <ul class="nav navbar-nav " id="type_event">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="event_page.php?type=Technology">Technology</a></li>
          <li><a href="event_page.php?type=Education">Education</a></li>
          <li><a href="event_page.php?type=Financial">Financial</a></li>
          <li><a href="event_page.php?type=Health">Health</a></li>
          <li><a href="event_page.php?type=Social">Social</a></li>
          <li><a href="event_page.php?type=Hobbies">Hobbies</a></li>
        </ul>
        </form>
        <ul id="login" class="nav navbar-nav navbar-right">
          <li><a href="sign_in.php"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
          <li><a href="registerSelect.php"><span class="glyphicon glyphicon-plus-sign"></span> Register</a></li>
        </ul>
        <ul id="profile" class="nav navbar-nav navbar-right">
          <li><a id = "username"></a></li>
          <li class="dropdown">
            <a class="glyphicon glyphicon-menu-hamburger" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li class="dropdown-menu-item"><a href="#">ประวัติส่วนตัว</a></li>
              <li id="adt" class="dropdown-menu-item"><a href="#">บันทึกการเข้าร่วมกิจกรรม</a></li>
              <li id="org1" class="dropdown-menu-item"><a href="#">บันทึกการจัดกิจกรรม</a></li>
              <li id="org2" class="dropdown-menu-item"><a href="createEvent.php">สร้างกิจกรรม</a></li>
              <li id="adm" class="dropdown-menu-item"><a href="userAdmin.php">จัดการระบบ</a></li>
              <li class="dropdown-menu-item"><a href="#">เปลี่ยนรหัสผ่าน</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-menu-item"><a href="sign_out.php" id="sign_out">ออกจากระบบ</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
      $openDB = new Database();
      $con = $openDB->connect();
      $statement = $con->query("SELECT * FROM event WHERE id = $id_event");
       while($row = $statement->fetch(PDO::FETCH_BOTH)) {
          $name = $row['name'];
          $date_start = $row['date_start'];
          $max = $row['max'];
          $type = $row['TYPE'];
          $vdo = $row['vdo'];
          $organizer_email = $row['organizer_email'];
          $price = $row['price'];
          $precon = $row['precondition'];
          $start_time = $row['start_time'];
          $start_time = substr($start_time,0,5);
          $end_time = $row['end_time'];
          $end_time = substr($end_time,0,5);
          $submit = $row['datetime_submit'];
          $detail = $row['detail'];
          $evaluation = $row['evaluation'];
          $seat = $row['seat'];
          $status = $row['status'];
          $date_time = substr($submit,8,2)."-".substr($submit,5,2)."-".substr($submit,0,4)." เวลา: ".substr($submit,11,5)." น.";
          $date = substr($submit,8,2)."-".substr($submit,5,2)."-".substr($submit,0,4);
        }



        $statement = $con->query("SELECT * FROM googlemap WHERE id = '$id_event'");
        while($row = $statement->fetch(PDO::FETCH_BOTH)) {
          $place = $row['place_Name'];
          $location = $row['place_Location'];
          $lat = $row['place_Lat'];
          $lng = $row['place_Lng'];
        }

        if(!$user == ""){
          $statement = $con->query("SELECT position FROM user WHERE email = '$user'");
          while($row = $statement->fetch(PDO::FETCH_BOTH)) {
            $posi = $row['position'];
          }
        } else {
          $posi = "";
        }






        if(isset($_POST['submitcm'])){
            $user = $_POST['userid'];
            $eventid = $_POST['eventid'];
            $mes = $_POST['ment'];
            if ($user == ""){
              $user = "Annonymous";
            }
             try {
              $sql = "INSERT INTO comment(eventid, user, message) VALUES('$eventid', '$user', '$mes')";
                $con->exec($sql);
                }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
                }

          }

          if(isset($_POST['cancle'])){

            try {
        $sql = "UPDATE event SET status='Event Cancle' WHERE id='$id_event'";
          $con->exec($sql);
          }catch(PDOException $e){
          echo "Connection failed: " . $e->getMessage();
          }
                    }


           if(isset($_POST['join'])){
            $check = 1;
             $statement = $con->query("SELECT user_email FROM attend_event_schedule WHERE user_email = '$user'");
            while($row = $statement->fetch(PDO::FETCH_BOTH)) {
              $c = $row['user_email'];
              $check = 0;
            }
            if( $check == 1){
         try {
              $sql = "INSERT INTO attend_event_schedule(event_id, user_email, attend_status, precondition_status, receipt_status) VALUES('$id_event', '$user', 'no','no','no')";
                $con->exec($sql);
                }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
                }
                try {
                $sql = "UPDATE event SET seat = seat + 1 WHERE id='$id_event'";
                  $con->exec($sql);
                  }catch(PDOException $e){
                  echo "Connection failed: " . $e->getMessage();
                  }
                    header("Refresh:0; url=detailEvent.php");
                    }
          }


       ?>




 <?php
         $arr_img = array();
         $index_img = 0;
         foreach($con->query("SELECT pathImage FROM event_image WHERE event_id = '$id_event'") as $row) {
           $arr_img[$index_img] = $row['pathImage'];
           $index_img++;
      }
      $index_img = $index_img - 2;

    echo'<div class="block_content">';
      echo '<div id="frame"><h4 align = "right">สร้างเมื่อ: '.$date_time.'</h3>
      <div class="container">
  <center><div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
      for ($m=1; $m < $index_img; $m++){
        echo ' <li data-target="#myCarousel" data-slide-to="'.$m.'"></li>
        ';
      }

    echo '
    </ol>
    ';

       for ($m=0; $m < count($arr_img); $m++) {
          if ($m == 0){
            echo '<div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="'.$arr_img[$m].'" style="width:100%;">
              </div>';
          } else {
            echo '<div class="item">
              <img src="'.$arr_img[$m].'" style="width:100%;">
            </div>';
          }
        }

     echo '</div><center>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
        </a>
      </div>
    </div> ';

  echo '<center><u><h1 id = "head"><b>'.$name.'</br></h1></u><br><br>';
  if($posi == "ORGANIZER"){
  echo '<div>
        <form action="detailEvent.php" method="POST">
        <input type="submit" name="cancle" value="cancle event"class="comment-btn">
        </form>

        <form action="mange.php" method="POST">
        <input type="submit" name="manage" value="จัดการผู้เข้าร่วม"class="comment-btn">
        </form>

         <form action="evaluation.php" method="POST">
        <input type="submit" name="evaluation" value="ประเมินผู้เข้าร่วม"class="comment-btn">
        </form>


  </div>';

  }


  if($posi== "USER"){
  echo '<div>
        <form action="detailEvent.php" method="POST">
        <input type="submit" name="join" value="เข้าร่วม"class="comment-btn">
        </form>

        <form action="mange.php" method="POST">
        <input type="submit" name="manage" value="แจ้งโอนเงิน"class="comment-btn">
        </form>

         <form action="evaluation.php" method="POST">
        <input type="submit" name="evaluation" value="ส่งเอกสารเพิ่มเติม"class="comment-btn">
        </form>


  </div>';

  }

  if($vdo != ""){
 echo "<center><video controls>
  <source src='".$vdo."' type='video/mp4'>
  </video></center>";
  }

 echo '<h3><strong>วันที่จัดงาน : </strong>'.$date.'</h3>
  <h3><strong>ตั้งแต่เวลา : </strong>'.$start_time.' น. - '.$end_time.' น.</h3>
  <h3><strong>ราคา : </strong>'.$price.'</h3>
 <h3><strong>หมวดหมู่ : </strong>'.$type.'</h3>
  <h3><strong>จำนวนที่รับ : </strong>'.$max.'</h3>
  <h3><strong>จำนวนผู้เข้าร่วม : </strong>'.$seat.'</h3>
  <h3><strong>สถานะ : </strong>'.$status.'</h3></center></center>

<div class="container text-center">
  <div class="row">
    <div class="col-sm-6">
    <div class="well"  style="word-wrap: break-word;"">
      <u><h2><strong>เงื่อนไขเพิ่มเติม</strong></h2></u>
       <p>'.nl2br($precon).'</p>
    </div>
    </div>

    <div class="col-sm-6">
      <div class="well"  style="word-wrap: break-word;">
      <u><h2><strong>รายละเอียดงาน</strong></h2></u>
       <p>'.nl2br($detail).'</p>
      </div>
    </div>
  </div>
</div><br>
  <center><h4><strong>สถานที่จัดงาน : </strong>'.$place.' '.$location.'</h4></center>
   <center><div id="map" style="width:500px; height: 500px;"></div></center>
    <div class="comment">
          <hr>
          <div class="comment-detail">
            <h4 id="text_hc">Leave a Comment:</h4>
            <form role="form" method="POST" action="detailEvent.php">
              <div class="form-group">
                  <input type="hidden" name="eventid" value="'.$id_event.'">
                 <input type="hidden" name="userid" value="'.$user.'">
                  <textarea class="form" rows="4" cols=100% name="ment" required></textarea>
              </div>
              <button type="submit" name="submitcm" id="submitcm">Comment</button>
            </form>
            </center>
            <br><br>
          </div>
      </div>
 </div>
 </div>';
 showComment($con);




      $page->footer();
      if (empty($_SESSION["email"])){
        echo '<script>
        $("#login").show();
        $("#profile").hide();
         </script>';
        }

      else {
          echo '<script>
            $("#username").html("'.$_SESSION["email"].'");
            $("#login").hide();
            $("#profile").show();
            </script>';
            if ($_SESSION['position'] == 'ADMIN'){
              echo '<script>
                $("#username").html("'.$_SESSION["email"].'");
                 $("#login").hide();
                 $("#profile").show();
                 $("#adt").hide();
                 $("#org1").hide();
                 $("#org2").hide();
                 $("#adm").show();
               </script>';
            } elseif ($_SESSION['position'] == 'USER') {
               echo '<script>$("#username").html("'.$_SESSION["email"].'");
               $("#login").hide();
               $("#profile").show();
               $("#adt").show();
               $("#org1").hide();
               $("#org2").hide();
               $("#adm").hide();
               </script>';
            } elseif ($_SESSION['position'] == 'ORGANIZER') {
               echo '<script>$("#username").html("'.$_SESSION["email"].'");
               $("#login").hide();
               $("#profile").show();
               $("#adt").hide();
               $("#org1").show();
               $("#org2").show();
               $("#adm").hide();
               </script>';

            }

        }



?>


 <script type="text/javascript">

    function initMap() {
      var myLatlng = new google.maps.LatLng(<?php echo $lat;?>,<?php echo $lng;?>);
      var mapOptions = {
        zoom: 17,
        center: myLatlng
      }
      var map = new google.maps.Map(document.getElementById("map"), mapOptions);

      var marker = new google.maps.Marker({
          position: myLatlng,
      });
      marker.setMap(map);
    }
 </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIS0z7iEm-g-vOpPixbLJlmJccmnPvUZE&callback=initMap" async defer></script>

</body>
</html>
>>>>>>> 7cb67a5019ba1129ee731f285c852d1fcac9f0e7
