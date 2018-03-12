<?php
  // connect database
  $connection = new PDO(
  'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
  'root',
  '');

  session_start();
  $email = $_SESSION["email"];
  $row_count = 0;
  $event_name_arr = array();
  $event_time_arr = array();
  $event_status_arr = array();


  // implement query for get data to table
  $statement = $connection->query('SELECT name, join_time, attend_status FROM attend_event_schedule JOIN event WHERE (attend_event_schedule.event_id = event.id AND attend_event_schedule.user_email = ' .$email. ')');

  while ($row = $statement->fetch(PDO::FETCH_BOTH)) {
    $event_name_arr[$row_count] = $row['name'];
    $event_time_arr[$row_count] = substr($row['join_time'], 0, 18);
    $event_status_arr[$row_count] = $row['attend_status'];

    $row_count ++;
  }

?>

<!-- this isn't complete yet. it don't have real $user_email (line 8, 9) -->