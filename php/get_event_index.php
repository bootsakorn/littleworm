<?php
$connection = new PDO(
 'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
 'root',
 '');
 $arr_img_event = array([], [], [], [], [], []);
 $arr_name_event = array([], [], [], [], [], []);
 $arr_abs_event = array([], [], [], [], [], []);
 $index_event = 0;
 foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Technology" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit LIMIT 4;') as $row) {
    $arr_img_event[0][$index_event] = $row['pathImage'];
    $arr_name_event[0][$index_event] = $row['name'];
    $arr_abs_event[0][$index_event] = $row['detail'];
    $index_event++;
 }
 $index_event = 0;

 foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Education" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit LIMIT 4;') as $row) {
    $arr_img_event[1][$index_event] = $row['pathImage'];
    $arr_name_event[1][$index_event] = $row['name'];
    $arr_abs_event[1][$index_event] = $row['detail'];
    $index_event++;
 }
 $index_event = 0;

 foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Financial" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit LIMIT 4;') as $row) {
    $arr_img_event[2][$index_event] = $row['pathImage'];
    $arr_name_event[2][$index_event] = $row['name'];
    $arr_abs_event[2][$index_event] = $row['detail'];
    $index_event++;
 }
 $index_event = 0;

 foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Health" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit LIMIT 4;') as $row) {
    $arr_img_event[3][$index_event] = $row['pathImage'];
    $arr_name_event[3][$index_event] = $row['name'];
    $arr_abs_event[3][$index_event] = $row['detail'];
    $index_event++;
 }
 $index_event = 0;

 foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Social" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit LIMIT 4;') as $row) {
    $arr_img_event[4][$index_event] = $row['pathImage'];
    $arr_name_event[4][$index_event] = $row['name'];
    $arr_abs_event[4][$index_event] = $row['detail'];
    $index_event++;
 }
 $index_event = 0;

 foreach($connection->query('SELECT event.id, event.name,event_image.pathImage, event.detail FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.TYPE="Hobbies" GROUP BY event.id ORDER BY event.date_start, event.datetime_submit LIMIT 4;') as $row) {
    $arr_img_event[5][$index_event] = $row['pathImage'];
    $arr_name_event[5][$index_event] = $row['name'];
    $arr_abs_event[5][$index_event] = $row['detail'];
    $index_event++;
 }
 $index_event = 0;

 $connection = null;
?>
