<?php
  // connect database
  $connection = new PDO(
  'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
  'root',
  '');

  $event_id = $_SESSION["id"];
  $row_count = 0;
  $first_name_arr = array();
  $last_name_arr = array();


  $statement = $connection->query('SELECT name FROM event WHERE event.id = '.$event_id);
  $row = $statement->fetch(PDO::FETCH_BOTH);
  $event_name = $row['name'];


  foreach ($connection->query('SELECT first_name, last_name FROM attendant WHERE email IN (SELECT user_email FROM attend_event_schedule WHERE event_id = "' .$event_id. '")') as $row) {
    $first_name_arr[$row_count] = $row['first_name'];
    $last_name_arr[$row_count] = $row['last_name'];

    $row_count ++;
  }

  // $statement = $connection->query('SELECT first_name, last_name FROM attendant WHERE email IN (SELECT user_email FROM attend_event_schedule WHERE event_id = ' .$event_id. ')');
  //
  // while ($row = $statement->fetch(PDO::FETCH_BOTH)) {
  //   $first_name_arr[$row_count] = $row['first_name'];
  //   $last_name_arr[$row_count] = $row['last_name'];
  //
  //   $row_count ++;
  // }

  $connection = null;
?>
