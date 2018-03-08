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
	<link rel="stylesheet" type="text/css" href="index_style.css">
</head>
<body>
    <?php
	    include "center.php";
	    $page = new Page();
	    $page->header();
		?>
	    <div class="collapse navbar-collapse ">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="index.php">Home</a></li>
	        <li><a href="#">Technology</a></li>
	        <li><a href="#">Education</a></li>
	        <li><a href="#">Financial</a></li>
	        <li><a href="#">Health</a></li>
	        <li><a href="#">Social</a></li>
	        <li><a href="#">Hobbies</a></li>
	      </ul>
	      <ul id="login" class="nav navbar-nav navbar-right">
	        <li><a href="sign_in.php"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
	        <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Register</a></li>
	      </ul>
				<ul id="profile" class="nav navbar-nav navbar-right">
					<li><a id = "username"></a></li>
					<li class="dropdown">
					  <a class="glyphicon glyphicon-menu-hamburger" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="caret"></span>
					  </a>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					    <li class="dropdown-menu-item"><a href="#">ประวัติส่วนตัว</a></li>
					    <li class="dropdown-menu-item"><a href="#">บันทึกกิจกรรม</a></li>
					    <li class="dropdown-menu-item"><a href="#">เปลี่ยนรหัสผ่าน</a></li>
					    <li role="separator" class="divider"></li>
					    <li class="dropdown-menu-item"><a id="sign_out">ออกจากระบบ</a></li>
					  </ul>
					</li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<?php
		$connection = new PDO(
		 'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
		 'root',
		 '');
		 $arr_img = array();
		 $arr_name = array();
		 $arr_abstract = array();
		 $index_img = 0;
		 foreach($connection->query('SELECT event.id, event.name,event_image.image,event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
			 $arr_img[$index_img] = $row['image'];
			 $arr_name[$index_img] = $row['name'];
			 $arr_abstract[$index_img] = $row['abstract'];
			 $index_img++;
			 if ($index_img>3) {
				 break;
			 }
			}
		 $connection = null;
		echo '<center><div class="container slide">
		  <br>
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
		    </ol>';
				for ($m=0; $m < count($arr_img); $m++) {
					if ($m == 0){
						echo '<div class="carousel-inner" role="listbox">

				      <div class="item active">
				        <img src="'.$arr_img[$m].'" height= "300px">
				        <div class="carousel-caption">
				          <h3>'.$arr_name[$m].'</h3>
				          <p>'.$arr_abstract[$m].'</p>
				        </div>
				      </div>';

					} else {
						echo '<div class="item">
			        <img src="'.$arr_img[$m].'" height= "300px">
			        <div class="carousel-caption">
			          <h3>'.$arr_name[$m].'</h3>
			          <p>'.$arr_abstract[$m].'</p>
			        </div>
			      </div>';
					}
				}
		    echo '</div>

		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
		</div></center>
		<div class="block_content">';

		$topic = array("Technology", "Education", "Financial", "Health", "Social", "Hobbies");
		include "get_event_index.php";
		for ($j=0; $j < count($topic) ; $j++) {
			echo '<div class="container"><div class="content">
				<div class="topic"> ';
			echo $topic[$j] . " ";
			echo '<a href="#">...see more...</a></div>
				<br>
				<div class="row">
					<div>';
			for ($i=0; $i < count($arr_img_event[$j]); $i++) {
				echo '  <span class="thumbnail">
						      	<a href="#"><img src="'.$arr_img_event[$j][$i].'">
						      	<div class="caption">
						        	<a class="name_event" href="#">'.$arr_name_event[$j][$i].'</a>
						        	<p class="abs_event">'.substr($arr_abs_event[$j][$i],0,90);
				if (strlen($arr_abs_event[$j][$i])>90){
					echo "...";
				}
				echo '</p>
						        	<p><center><a href="#" class="btn btn-default" role="button">Join</a></center></p>
						      	</div></a>
						    </span>';
				}
				echo '			  	</div>
							</div>
						</div></div>';
					}
				echo "</div>";
				$page->footer();

			if (!empty($_POST["txtEmail"])){
				$_SESSION["email"] = $_POST["txtEmail"];
				$_SESSION["password"] = $_POST["txtPassword"];
				$connection = new PDO(
				 'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
				 'root',
				 '');
					foreach($connection->query('SELECT * FROM user') as $row) {
						if ($row['email'] == $_SESSION["email"] && $row['password'] == $_SESSION["password"]) {
							$_SESSION["password"] = $row['position'];
							if ($row['position'] == 'ADMIN'){
								echo '<script>
									$("#username").html("'.$_SESSION["email"].'");
									 $("#login").hide();
									 $("#profile").show();
								 </script>';
							}
							break;
						}
					 }
					 $connection = null;
				}
				else {
					echo '<script>
					$("#login").show();
					$("#profile").hide();
					 </script>';
				}

				echo '	<script>
						$("#sign_out").click(function () {';
								session_unset();
								session_destroy();
				echo	'$("#username").html("");
							$("#login").show();
							$("#profile").hide();
						});
					</script>';
	?>


</body>
</html>
