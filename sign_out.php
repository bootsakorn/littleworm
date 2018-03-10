<?php
  session_start();
  $_SESSION["email"] = "";
  $_SESSION["password"] = "";
  $_SESSION["position"] = "";
  header("location: index.php");
  exit(0);
 ?>
