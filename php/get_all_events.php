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

  foreach ($connection->query('SELECT event.name, event.date_start, event.start_time FROM event WHERE event.organizer_email = "'.$email.'"') as $row) {
    $event_name_arr[$row_count] = $row['name'];
    $event_date_arr[$row_count] = $row['date_start'];
    $event_time_arr[$row_count] = $row['start_time'];

    $row_count ++;
  }


  // implement query for get data to table
  // $statement = $connection->query('SELECT name, date, time FROM event WHERE organizer_name = (SELECT company_name FROM organizer WHERE email = ' .$email. ')');
  //
  // while ($row = $statement->fetch(PDO::FETCH_BOTH)) {
  //
  //   $event_name_arr[$row_count] = $row['name'];
  //   $event_date_arr[$row_count] = $row['date'];
  //   $event_time_arr[$row_count] = $row['time'];
  //
  //   $row_count ++;
  // }

  $connection = null;
?>
