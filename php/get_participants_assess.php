<?php
  // connect database
  $connection = new PDO(
  'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
  'root',
  '');

  $event_id = '01';
  $row_count = 0;
  $first_name_arr = array();
  $last_name_arr = array();



  // implement query for get data to table
  $statement = $connection->query('SELECT first_name, last_name FROM attendant WHERE email IN (SELECT user_email FROM attend_event_schedule WHERE event_id = ' .$event_id. ')');

  while ($row = $statement->fetch(PDO::FETCH_BOTH)) {
    $first_name_arr[$row_count] = $row['first_name'];
    $last_name_arr[$row_count] = $row['last_name'];

    $row_count ++;
  }
?>


<!-- this isn't complete yet. it don't have real $event_id -->