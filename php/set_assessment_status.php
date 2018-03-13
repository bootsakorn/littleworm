<?php
    session_start();
    $connection = new PDO(
    'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
    'root',
    '');
    $num = $_POST['num'];
    $event_id = $_SESSION["id"];

      for ($i=0; $i<$num; $i++) {

        $fname = $_POST["fname".$i];
        $lname = $_POST["lname".$i];
        $result = $_POST["result".$i];

        if ($result == "pass") {
          $quel = 'SELECT DISTINCT attendant.email FROM attendant WHERE attendant.first_name = "'.$fname.'" AND attendant.last_name="'.$lname.'"';
          foreach ($connection->query($quel) as $row) {
            $quel2 = 'UPDATE `attend_event_schedule` SET `assessment_status` = "pass"  WHERE event_id = '.$event_id.' AND user_email = "'.$row["email"].'"';
            $connection->query($quel2);
          }
        }
        else {
          if ($result == "notPass") {
            $quel = 'SELECT DISTINCT attendant.email FROM attendant WHERE attendant.first_name = "'.$fname.'" AND attendant.last_name="'.$lname.'"';
            foreach ($connection->query($quel) as $row) {
              $quel2 = 'UPDATE `attend_event_schedule` SET `assessment_status` = "notPass" WHERE event_id = '.$event_id.' AND user_email = "'.$row["email"].'"';
              $connection->query($quel2);
            }
          }
        }
      }
    $connection = null;
    header("location: assess_participants.php");
?>