<?php
  session_start();
  $id = $_GET['id'];
  $_SESSION["id"] = $id;
  header("location:detailEvent.php");
?>
