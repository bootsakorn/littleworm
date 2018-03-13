<?php
  // connect database
  $connection = new PDO(
  'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
  'root',
  '');

  $email = $_SESSION["email"];
  $row_count = 0;
  $event_name_arr = array();
  $event_date_arr = array();
  $event_time_arr = array();
  $event_status_arr = array();
  $event_id_arr =array();

  foreach ($connection->query('SELECT event.id, name, event.date_start, event.start_time, attend_status FROM attend_event_schedule JOIN event WHERE (attend_event_schedule.event_id = event.id AND attend_event_schedule.user_email = "' .$email. '")') as $row) {
    $event_name_arr[$row_count] = $row['name'];
    $event_date_arr[$row_count] = $row['date_start'];
    $event_time_arr[$row_count] = $row['start_time'];
    $event_status_arr[$row_count] = $row['attend_status'];
    $event_id_arr[$row_count] = $row['id'];
    $row_count ++;
  }

  $connection = null;
?>
