<?php
  // connect database
  $connection = new PDO(
  'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
  'root',
  '');

  $row_count = 0;
  $event_name_arr = array();
  $event_date_arr = array();
  $event_time_arr = array();


  // implement query for get data to table
  $statement = $connection->query('SELECT name, date, time FROM event');

  while ($row = $statement->fetch(PDO::FETCH_BOTH)) {
    
    $event_name_arr[$row_count] = $row['name'];
    $event_date_arr[$row_count] = $row['date'];
    $event_time_arr[$row_count] = $row['time'];

    $row_count ++;
  }

  $connection = null;
?>
