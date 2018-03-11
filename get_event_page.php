<?php
$connection = new PDO(
 'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
 'root',
 '');
 $arr_img_event = array();
 $arr_name_event = array();
 $arr_abs_event = array();
 $filter_place = array();
 $filter_organizer = array();
 $index_event = 0;
 $index_place = 0;
 $index_organizer = 0;
 $type_e = $_GET['type'];
 if (empty($_GET["place"]) and empty($_GET["organizer_name"]) and empty($_GET["date"])){
   $_GET["filter"] = "";
 }
 if (!empty($_GET["filter"])) {
   $filter_type = $_GET["filter"];
   if ($filter_type == "place"){
     $filter_by = $_GET["place"];
   } else if ($filter_type == "organizer_name"){
     $filter_by = $_GET["organizer_name"];
   } else if ($filter_type == "date"){
     $filter_by = $_GET["date"];
   }
   if ($type_e == "Technology"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Technology" AND '.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
    if ($type_e == "Education"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Education" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
    if ($type_e == "Financial"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Financial" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
    if ($type_e == "Health"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Health" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
    if ($type_e == "Social"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Social" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
    if ($type_e == "Hobbies"){
     foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Hobbies" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date, event.time,event_image.id') as $row) {
        $arr_img_event[$index_event] = $row['image'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['abstract'];
        $index_event++;
     }
   }
 }else {
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
 }
   foreach($connection->query('SELECT DISTINCT place FROM `event`') as $row) {
      $filter_place[$index_place] = $row['place'];
      $index_place++;
    }
    foreach($connection->query('SELECT DISTINCT organizer_name FROM `event`') as $row) {
       $filter_organizer[$index_organizer] = $row['organizer_name'];
       $index_organizer++;
     }
  $connection = null;
?>
