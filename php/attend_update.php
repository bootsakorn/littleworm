<?php
$scannedText = $_POST['data'];
$user_email = explode("-", $scannedText)[0];
$event_id = explode("-", $scannedText)[1];

$servername = "localhost";
$dbname = "little_worm";
$userName = "root";
$password = "";

$connection = new PDO (
  'mysql:host='.$servername.';dbname='.$dbname.';charset=utf8mb4',
  $userName,
  $password
);

$qrCodeSelectStatement = $connection->query('SELECT * FROM qr_code');
$paymentUpdateStatement = $connection->prepare('UPDATE attend_event_schedule SET attend_status = ? WHERE user_email= ? AND event_id = ?');

$qrCodes = array();
while ($row = $qrCodeSelectStatement->fetch(PDO::FETCH_ASSOC)) {
  $qrCodes[$row["email"]."-".$row["event_id"]] = $row["picture_path"];
  // array_push($qrCodes, $row["email"]."-".$row["event_id"], $row["picture_path"]);
}

if (array_key_exists($scannedText, $qrCodes)) {
  $paymentUpdateStatement->execute(["เข้าร่วม", $user_email, $event_id]);
  echo $scannedText;
}
// echo $scannedText;
?>
