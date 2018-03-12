<!DOCTYPE html>
 <?php


  function showData(){
    $openDB = new Database();
    $conn = $openDB->connect();
    $statement = $conn->query('SELECT * FROM image WHERE id<>1');
    $var=1;
    while($row = $statement->fetch(PDO::FETCH_BOTH)) {
     if($var%2 != 0){
      echo '<!-- Page content -->
      <div class="w3-content" style="max-width:900px">
      <div class="w3-row w3-padding-64" id="frame">
      <div class="w3-col m6 w3-padding-large w3-hide-small">
      <img src="'.$row['image'].'" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="100%" height="100%">
       </div>
      <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">'.$row['name'].'</h1><br>
      <h1 class="w3-center">'.$row['student_id'].'</h1>
      </div>
      </div>
      <hr>';
        $var=2;
      }else{
        echo '<div class="w3-row w3-padding-64" id="about">
       <div class="w3-col l6 w3-padding-large">
        <h1 class="w3-center">'.$row['name'].'</h1><br>
        <h1 class="w3-center">'.$row['student_id'].'</h1>
      </div>

        <div class="w3-col l6 w3-padding-large">
        <img src="'.$row['image'].'" class="w3-round w3-image w3-opacity-min" alt="Menu" width="100%" height="100%">
        </div>
        </div>
      <hr>';

        $var=1;
      }

  }

  }


  ?>



<html>
<head>
  <title>ABOUT ME</title>
<meta charset="UTF-8">
  <meta http-equiv=Content-Type content="text/html; charset=tis-620">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>index</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/index_style.css">
  <link rel="stylesheet" type="text/css" href="../css/frame.css">


</head>


<body>

<?php
      include "center.php";
      include "connectDB.php";
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
      showData();
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

</body>
</html>
