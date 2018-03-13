<?php
$connection = new PDO(
 'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
 'root',
 '');
 $arr_id_event = array();
 $arr_img_event = array();
 $arr_name_event = array();
 $arr_abs_event = array();
 $filter_place = array();
 $filter_organizer = array();
 $index_event = 0;
 $index_place = 0;
 $index_organizer = 0;
 $type_e = $_GET['type'];
 if (empty($_GET["place"]) && empty($_GET["organizer_name"]) && empty($_GET["date"])){
   $_GET["filter"] = "";
 }
 if (!empty($_GET["filter"])) {
   $filter_type = $_GET["filter"];
   if ($filter_type == "place"){
     $filter_by = $_GET["place"];
   } else if ($filter_type == "organizer_name"){
     foreach($connection->query('SELECT DISTINCT `email` FROM `organizer` WHERE `company_name`="'.$_GET["organizer_name"].'"') as $row) {
       $filter_type = "organizer_email";
       $filter_by = $row["email"];
          }
   } else if ($filter_type == "date"){
     $filter_type = "date_start";
     $filter_by = $_GET["date"];
   }
   if ($type_e == "Technology"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Technology" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }

    if ($type_e == "Education"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Education" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
    if ($type_e == "Financial"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Financial" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
    if ($type_e == "Health"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Health" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
    if ($type_e == "Social"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Social" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
    if ($type_e == "Hobbies"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Hobbies" AND event.'.$filter_type.'="'.$filter_by.'" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
 }else {
   if ($type_e == "Technology"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Technology" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
    if ($type_e == "Education"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Education" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
    if ($type_e == "Financial"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Financial" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
    if ($type_e == "Health"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Health" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
    if ($type_e == "Social"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Social" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
    if ($type_e == "Hobbies"){
     foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Hobbies" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit') as $row) {
        $arr_id_event[$index_event] = $row['id'];
        $arr_img_event[$index_event] = $row['pathImage'];
        $arr_name_event[$index_event] = $row['name'];
        $arr_abs_event[$index_event] = $row['detail'];
        $index_event++;
     }
   }
 }
   foreach($connection->query('SELECT DISTINCT place FROM `event`') as $row) {
      $filter_place[$index_place] = $row['place'];
      $index_place++;
    }
    foreach($connection->query('SELECT DISTINCT organizer.company_name FROM `organizer`') as $row) {
       $filter_organizer[$index_organizer] = $row['company_name'];
       $index_organizer++;
     }
  $connection = null;
?>
