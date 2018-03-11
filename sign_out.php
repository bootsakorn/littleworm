<?php
  session_start();
  $_SESSION["email"] = "";
  $_SESSION["password"] = "";
  $_SESSION["position"] = "";
  session_unset();
  session_destroy(); 
  header("location: index.php");
  exit(0);
 ?>
