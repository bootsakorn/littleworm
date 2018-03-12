<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
print_r($_SESSION); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB8wU3BAKVo8JKUvFlWs6f2gLQEHu_siEg&sensor=false&libraries=places&language=th"></script>

        <script type="text/javascript" src="../script/scriptGoogleMap.js"></script>

          <meta charset="utf-8">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
          <link rel="stylesheet" type="text/css" href="../css/index_style.css">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" type="text/css" href="../css/frame.css">


        <style>
            #map-canvas {
                height: 400px;
                width: 600px;
                margin-top: 0.6em;
            }
        </style>
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
        echo '<div id="frame"><div class="container">
  <center><h2>สร้าง Event</h2></center>
  <form class="form-horizontal" action="saveEvent.php " enctype="multipart/form-data" method="POST" id="myform" ">
    <div class="form-group">
      <label class="control-label col-sm-2" >ชื่อ Event:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nameEvent"  name="nameEvent" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >ราคา(บาท):</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="price"  name="price" required>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" >จำนวนผู้เข้าร่วมสูงสุด:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="max"  name="max" required>
      </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" >วันที่เข้าร่วม:</label>
      <div class="col-sm-10">
        <input type="Date" class="form-control" id="evdate"  name="evdate" required>
      </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" >ตั้งแต่เวลา:</label>
      <div class="col-sm-10">
        <input type="Time" class="form-control" id="sttime"  name="sttime" required> ถึง <input type="Time" class="form-control" id="entime"  name="entime" required>

      </div>
      </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >หมวดหมู่:</label>
      <div class="col-sm-10">
      <select id="select" class="form-control" id="type" name="type">
          <option value="technology">Technology</option>
          <option value="education">Education</option>
          <option value="financial">Financial</option>
          <option value="health">Health</option>
          <option value="social">Social</option>
          <option value="hobbies">Hobbies</option>
     </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >รายละเอียด:</label>
      <div class="col-sm-10">
      <textarea class="form-control" rows="6" id="detail" name="detail" required></textarea>
      </div>
      </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >เงื่อนไขเพิ่มเติม(ถ้ามี):</label>
      <div class="col-sm-10">
      <textarea class="form-control" rows="6" id="precon" name="precon" > ไม่มี </textarea>
      </div>
      </div>

        <div class="form-group">
      <label class="control-label col-sm-2" >แบบประเมินหลังจบงาน(Google Form):</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="googleform"  name="googleform" required>
      </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" >อัพโหลดรูปภาพ(จำเป็น):</label>
      <div class="col-sm-10">
      <input multiple name="img[]" type="file" required/>
      </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" >อัพโหลดวีดีโอ:</label>
      <div class="col-sm-10">
      <input type="file" name="video" id="file" />
      </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" >เลือกสถานที่จัดงาน:</label>
      <div class="col-sm-10">
      <input id="searchTextField" type="text" required>
      <div id="map-canvas"></div>
      <input type="hidden" name="namelocation" value="" id="namelocation">
      <input type="hidden" name="location" value="" id="location">
      <input type="hidden" name="lat" value="" id="lat">
      <input type="hidden" name="lng" value="" id="lng">
      <input type="hidden" name="$organitzer" value="" id="$organitzer">
      </div>
      </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <center><button type="submit" name="submit" class="btn btn-default">Submit</button></center>
      </div>
    </div>
  </form>
</div>
</div>';
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
