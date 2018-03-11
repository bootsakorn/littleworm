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
	</div>
</div>
</nav>
  <center><form name="form1" method="post" action="sign_in.php">
    Login<br>
    <table border="1" style="width: 300px">
    <tr>
    <td> &nbsp;Email</td>
    <td>
    <input name="txtEmail" type="text" id="txtEmail" required>
    </td>
    </tr>
    <tr>
    <td> &nbsp;Password</td>
    <td><input name="txtPassword" type="password" id="txtPassword" required>
    </td>
    </tr>
    </table>
    <br>
    <input type="submit" name="Submit" value="Sign in">

  </form></center>
	<?php
	session_start();
	$page->footer();
	if (!empty($_POST["txtEmail"])){
		$connection = new PDO(
		 'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
		 'root',
		 '');
			foreach($connection->query('SELECT * FROM user') as $row) {
				if ($row['email'] == $_POST["txtEmail"] && $row['password'] == $_POST["txtPassword"]) {
					$_SESSION["email"] = $_POST["txtEmail"];
					$_SESSION["position"] = $row['position'];
					break;
				} else {
					$_SESSION["email"] = "";
				}

			 }
			 if ($_SESSION["email"] == ""){
				 echo '<script>alert("Email หรือ Password ไม่ถูกต้อง");</script>';

			 }else {
				 print_r($_SESSION);
			 	 header("location: index.php");
			 }
			 $connection = null;
		}
	 ?>

</body>
</html>
