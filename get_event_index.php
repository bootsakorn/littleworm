<?php
$connection = new PDO(
 'mysql:host=localhost:3306;dbname=little_worm;charset=utf8mb4',
 'root',
 '');
 $arr_img_event = array([], [], [], [], [], []);
 $arr_name_event = array([], [], [], [], [], []);
 $arr_abs_event = array([], [], [], [], [], []);
 $index_event = 0;
 foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Technology" ORDER BY event.date, event.time,event_image.id LIMIT 4;') as $row) {
    $arr_img_event[0][$index_event] = $row['image'];
    $arr_name_event[0][$index_event] = $row['name'];
    $arr_abs_event[0][$index_event] = $row['abstract'];
    $index_event++;
 }
 $index_event = 0;

 foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Education" ORDER BY event.date, event.time,event_image.id LIMIT 4;') as $row) {
    $arr_img_event[1][$index_event] = $row['image'];
    $arr_name_event[1][$index_event] = $row['name'];
    $arr_abs_event[1][$index_event] = $row['abstract'];
    $index_event++;
 }
 $index_event = 0;

 foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Financial" ORDER BY event.date, event.time,event_image.id LIMIT 4;') as $row) {
    $arr_img_event[2][$index_event] = $row['image'];
    $arr_name_event[2][$index_event] = $row['name'];
    $arr_abs_event[2][$index_event] = $row['abstract'];
    $index_event++;
 }
 $index_event = 0;

 foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Health" ORDER BY event.date, event.time,event_image.id LIMIT 4;') as $row) {
    $arr_img_event[3][$index_event] = $row['image'];
    $arr_name_event[3][$index_event] = $row['name'];
    $arr_abs_event[3][$index_event] = $row['abstract'];
    $index_event++;
 }
 $index_event = 0;

 foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Social" ORDER BY event.date, event.time,event_image.id LIMIT 4;') as $row) {
    $arr_img_event[4][$index_event] = $row['image'];
    $arr_name_event[4][$index_event] = $row['name'];
    $arr_abs_event[4][$index_event] = $row['abstract'];
    $index_event++;
 }
 $index_event = 0;

 foreach($connection->query('SELECT event.id, event.name,event_image.image, event.abstract FROM `event`JOIN`event_image` WHERE event.id=event_image.event_id AND event.type="Hobbies" ORDER BY event.date, event.time,event_image.id LIMIT 4;') as $row) {
    $arr_img_event[5][$index_event] = $row['image'];
    $arr_name_event[5][$index_event] = $row['name'];
    $arr_abs_event[5][$index_event] = $row['abstract'];
    $index_event++;
 }
 $index_event = 0;

 $connection = null;
?>
