<!DOCTYPE html>
<html>
  <head>
    <title>organizer save event</title>
  	<meta charset="utf-8">
  	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  	<!-- jQuery library -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  	<!-- Latest compiled JavaScript -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="../css/index_style.css">
    <link rel="stylesheet" type="text/css" href="../css/table_style.css">
    <script type="text/javascript" src="../script/sort_table.js"></script>

  </head>
  <body>
    <?php
      include "center.php";
      include "get_all_events.php";
      $page = new Page();
      $page->header();

      $table_id = "'events_table'";
    ?>

      <!-- do not use navbar -->
        </div>
      </nav>

      <div class="content">
        <h1 style="text-align:center">กิจกรรมทั้งหมด</h1>

        <table id='.$table_id.' style="width:65%">
          <tr>
            <th width="53%" onclick="sortTable(0, '.$table_id.')">ชื่อกิจกรรม</th>
            <th width="25%" onclick="sortTable(1, '.$table_id.')">วัน เวลา</th>
            <th width="22%" onclick="sortTable(2, '.$table_id.')">สถานะ</th>
          </tr>

        <?php
          // set current date and time to check event status
          date_default_timezone_set('Asia/Bangkok');
          $current_time = date('Y-m-d H:i:s');

          for ($i=0; $i<count($event_name_arr) ; $i++) {
            echo '
              <tr>
                <td><a href="#">' .$event_name_arr[$i]. '</a></td>
                <td>' .$event_date_arr[$i]. ' ' .$event_time_arr[$i]. '.</td>
            ';

            // check time and date for show that this event is happened.
            if (substr($event_date_arr[$i], 0, 10) > substr($current_time, 0, 10)) {
              echo '
                <td>กิจกรรมยังไม่เกิดขึ้น</td>
              </tr>
              ';
            } else {
              if (substr($event_date_arr[$i], 11, 19) > substr($current_time, 11, 19)) {
                echo '
                  <td>กิจกรรมยังไม่เกิดขึ้น</td>
                </tr>
                ';
              }
              else {
                echo '
                  <td>กิจกรรมเกิดขึ้นแล้ว</td>
                </tr>
                ';
              }
            }
          }          
        ?>
        </table>
      </div>

  </body>
</html>
