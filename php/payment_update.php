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

$paymentUpdateStatement = $connection->prepare('UPDATE attend_event_schedule SET receipt_status = ? WHERE id = ?');
$paymentUpdateStatement->execute($param);

echo $selectedId . ' ' . $status;
?>
