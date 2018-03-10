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
      include "get_event_page.php";
		?>
	    <div class="collapse navbar-collapse ">
	      <ul class="nav navbar-nav" id="type_event">
	        <li class="active"><a href="index.php">Home</a></li>
					<li><a href="event_page.php?id=Technology">Technology</a></li>
	        <li><a href="event_page.php?id=Education">Education</a></li>
	        <li><a href="event_page.php?id=Financial">Financial</a></li>
	        <li><a href="event_page.php?id=Health">Health</a></li>
	        <li><a href="event_page.php?id=Social">Social</a></li>
	        <li><a href="event_page.php?id=Hobbies">Hobbies</a></li>
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
			echo '<div class="row">';
			for ($i=0; $i < count($arr_img_event); $i++) {
				echo '  <span class="thumbnail">
						      	<a href="#"><img src="';
        echo  $arr_img_event[$i];
        echo '">
						      	<div class="caption">
						        	<a class="name_event" href="#">';
        $arr_name_event[$i];
        echo'</a>
						        	<p class="abs_event">';
        echo substr($arr_abs_event[$i],0,120);
				if (strlen($arr_abs_event[$i])>120){
					echo "...";
				}
				echo '</p>
						        	<p><center><a href="#" class="btn btn-default" role="button">Join</a></center></p>
						      	</div></a>
						    </span>';
				}
				echo '</div>
						</div></div>';
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

				}
	?>




</body>
</html>
