<?php
$connection = new PDO(
 'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
 'root',
 '');
 $arr_img_event = array();
 $arr_name_event = array();
 $arr_abs_event = array();
 $index_event = 0;
 $type_e = $_GET['id'];
   if ($type_e == "Technology"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Technology" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
    if ($type_e == "Education"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Education" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
    if ($type_e == "Financial"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Financial" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
    if ($type_e == "Health"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Health" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
    if ($type_e == "Social"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Social" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
    if ($type_e == "Hobbies"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Hobbies" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
  $connection = null;
?>
