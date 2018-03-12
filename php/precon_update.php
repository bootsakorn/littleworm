<?php
$selectedId = $_POST['selectedId'];
$status = $_POST['status'];
$param = array($status, $selectedId);

$servername = "localhost";
$dbname = "little_worm";
$userName = "root";
$password = "";

$connection = new PDO (
  'mysql:host='.$servername.';dbname='.$dbname.';charset=utf8mb4',
  $userName,
  $password
);

$preconUpdateStatement = $connection->prepare('UPDATE attend_event_schedule SET precondition_status = ? WHERE id = ?');
$preconUpdateStatement->execute($param);

echo $selectedId . ' ' . $status;
?>
