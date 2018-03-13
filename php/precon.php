<!DOCTYPE html>
<html>
<head>
	<title>Pre Condition Upload</title>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/receipt_style.css">
</head>
<body>
	<?php
	session_start();
  include "center.php";
	$page = new Page();
	$topic = array("Technology", "Education", "Financial", "Health", "Social", "Hobbies");
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
					<li class="dropdown-menu-item"><a href="profile.php">ประวัติส่วนตัว</a></li>
					<li id="adt" class="dropdown-menu-item"><a href="user_save_event_page.php">บันทึกการเข้าร่วมกิจกรรม</a></li>
					<li id="org1" class="dropdown-menu-item"><a href="organ_save_event_page.php">บันทึกการจัดกิจกรรม</a></li>
					<li id="org2" class="dropdown-menu-item"><a href="createEvent.php">สร้างกิจกรรม</a></li>
					<li id="adm" class="dropdown-menu-item"><a href="userAdmin.php">จัดการระบบ</a></li>
					<li class="dropdown-menu-item"><a href="password_change.php">เปลี่ยนรหัสผ่าน</a></li>
					<li role="separator" class="divider"></li>
					<li class="dropdown-menu-item"><a href="sign_out.php" id="sign_out">ออกจากระบบ</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>
</nav>

  <div class="container">
    <h1><center>อัพโหลดหลักฐาน Pre Condition</center></h1>
    <form action="precon_submit.php" enctype="multipart/form-data" method="post">
      <div class="form-group">
				<?php
        echo '<input type="hidden" id="event" name="event" value="'.$_POST["id_event"].'">';
				?>
      </div>
      <div class="form-group">
        <label for="slip">Upload Precondition</label>
        <center><input type="file" class="form-control-file" id="precon" name="precon"></center>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-info btn-lg" name="submit">
      </div>
    </form>
  </div>

  <?php $page->footer();
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
		}?>
</body>
</html>
