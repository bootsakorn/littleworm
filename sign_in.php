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
			$topic = array("Technology", "Education", "Financial", "Health", "Social", "Hobbies");
	    $page->header();
      echo '
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="index.php">Home</a></li>
	        <li><a href="#">Technology</a></li>
	        <li><a href="#">Education</a></li>
	        <li><a href="#">Financial</a></li>
	        <li><a href="#">Health</a></li>
	        <li><a href="#">Social</a></li>
	        <li><a href="#">Hobbies</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="sign_in.php"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
	        <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Register</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>';
			// $page->footer();
	?>
  <center><form name="form1" method="post" action="index.php">
    Login<br>
    <table border="1" style="width: 300px">
    <tr>
    <td> &nbsp;Email</td>
    <td>
    <input name="txtEmail" type="text" id="txtEmail">
    </td>
    </tr>
    <tr>
    <td> &nbsp;Password</td>
    <td><input name="txtPassword" type="password" id="txtPassword">
    </td>
    </tr>
    </table>
    <br>
    <input type="submit" name="Submit" value="Sign in">

  </form></center>




</body>
</html>
