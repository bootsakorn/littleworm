<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/event_page_style.css">
</head>
<body>
    <?php
	    include "center.php";
	    $page = new Page();
	    $page->header();
      include "get_event_page.php";
		?>
	    <div class="collapse navbar-collapse ">
	      <ul class="nav navbar-nav" id="type_event">
	        <li class="active"><a href="index.php">Home</a></li>
					<li><a href="event_page.php?type=Technology">Technology</a></li>
	        <li><a href="event_page.php?type=Education">Education</a></li>
	        <li><a href="event_page.php?type=Financial">Financial</a></li>
	        <li><a href="event_page.php?type=Health">Health</a></li>
	        <li><a href="event_page.php?type=Social">Social</a></li>
	        <li><a href="event_page.php?type=Hobbies">Hobbies</a></li>
	      </ul>
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
		echo '<div class="block_content">';
			echo '<div class="container"><div class="content">
      <div class="topic">' . $type_e . '</div>';
			echo '<form  method="get" action="event_page.php">
						<select class="filter" name="filter">
						<option selected="select" value="em" disabled="disabled">กรุณาเลือก...</option>
						<option value="place">สถานที่</option>
						<option value="organizer_name">ผู้จัด</option>
						<option value="date">วันจัด</option>
					</select>
					<select class="filter" id="place" name="place">
						<option selected="select" value="em" disabled="disabled">กรุณาเลือก...</option>';
						for ($x=0; $x < count($filter_place); $x++) {
							echo '<option value="'. urldecode($filter_place[$x]).'">'. urldecode($filter_place[$x]).'</option>';
						}
					echo '</select>
					<select class="filter" id="organizer" name="organizer_name">
						<option selected="select" value="em" disabled="disabled">กรุณาเลือก...</option>';
						for ($x=0; $x < count($filter_organizer); $x++) {
							echo '<option value="'. urldecode($filter_organizer[$x]).'">'. urldecode($filter_organizer[$x]).'</option>';
						}
					echo '</select>
					<input class="date" id="date" type="date" name="date">
					<input id="ty" type="text" name="type" value="' . $type_e . '">
					<input class="sub" type="submit" value="ยืนยัน" href="event_page.php?type=' . $type_e . '">
				</form>';

			echo '<div class="row">';
			for ($i=0; $i < count($arr_img_event); $i++) {
				echo '<span class="thumbnail"><a href="#"><img src="';
        echo  $arr_img_event[$i];
        echo '"><div class="caption"><a class="name_event" href="#">'.$arr_name_event[$i];
        echo'</a><p class="abs_event">'. substr($arr_abs_event[$i],0,90);
				if (strlen($arr_abs_event[$i])>90){
					echo "...";
				}

				echo '</p><p><center><a href="before_detail.php?id='.$arr_id_event[$i].'" class="btn btn-default" role="button">Read</a></center></p></div></a>
						    </span>';
				}
				echo '</div></div></div>';
				echo "</div>";
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

	<script>
	$("#ty").hide();
	$(function() {
		$("#place").hide();
		$("#organizer").hide();
		$("#date").hide();
	});
	$(function() {
		$(".filter").change(function() {
			if($(this).val() == "place"){
				$("#place").show();
				$("#organizer").hide();
				$("#date").hide();
			} else if ($(this).val() == "organizer_name"){
				$("#place").hide();
				$("#organizer").show();
				$("#date").hide();
			} else if ($(this).val() == "date"){
				$("#place").hide();
				$("#organizer").hide();
				$("#date").show();
			}
		});
	});
	</script>




</body>
</html>
