<?php
   	class Page{
		function header() {
			echo '	<div>
		<img id="banner" src="banner.jpg">
	</div>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>';
		}

		function footer() {
			echo '	<footer class="container-fluid text-center">
	  <a id="about_me" href="">About Us</a>
	  <p>&copy; Little Worm</p>
	</footer>';
	}
}
?>
