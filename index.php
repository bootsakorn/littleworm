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
	        <li class="active"><a href="#">Home</a></li>
	        <li><a href="#">Technology</a></li>
	        <li><a href="#">Education</a></li>
	        <li><a href="#">Financial</a></li>
	        <li><a href="#">Health</a></li>
	        <li><a href="#">Social</a></li>
	        <li><a href="#">Hobbies</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
	        <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Register</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>';
	for ($j=0; $j < 6; $j++) {
		echo '<div class="content">
			<span class="topic"> ';
		echo $topic[$j] . " ";
		echo '<a href="#">&lt;read more...&gt;</a></span>
			<hr class="hr1">
			<div class="row">
				<div>';
		for ($i=0; $i < 4; $i++) {
			echo '  <span class="thumbnail">
					      	<img src="...">
					      	<div class="caption">
					        	<p>Thumbnail label</p>
					        	<p>...</p>
					        	<p><a href="#" class="btn btn-default" role="button">Button</a></p>
					      	</div>
					    </span>';
			}
			echo '			  	</div>
						</div>
					</div>';
	}




	?>
	<div class="content">
		<span class="topic"> Technology
		<a href="#">&lt;read more...&gt;</a></span>
		<hr class="hr1">
		<div class="row">
			<div class="col-sm-4 col-md-3">
			    <div class="thumbnail">
			      	<img src="...">
			      	<div class="caption">
			        	<p>Thumbnail label</p>
			        	<p>...</p>
			        	<p><a href="#" class="btn btn-default" role="button">Button</a></p>
			      	</div>
			    </div>
		  	</div>
		</div>
	</div>

</body>
</html>
