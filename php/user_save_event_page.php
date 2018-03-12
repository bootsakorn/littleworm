<!DOCTYPE html>
<html>
  <head>
    <title>user save event</title>
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
      include "get_user_events.php";
      $page = new Page();
      $page->header();

      $table_id = "'events_table'";
    ?>

      <!-- do not use navbar -->
        </div>
      </nav>

      <div class="content">
        <h1 style="text-align:center">กิจกรรมที่สมัคร</h1>

        <table id='.$table_id.' style="width:65%">
          <tr>
            <th width="53%" onclick="sortTable(0, '.$table_id.')">ชื่อกิจกรรม</th>
            <th width="25%" onclick="sortTable(0, '.$table_id.')">วัน เวลา</th>
            <th width="22%" onclick="sortTable(0, '.$table_id.')">สถานะ</th>
          </tr>

          <?php
            $email = $_SESSION["email"];
            for ($i=0; $i<count($event_name_arr); $i++) {
              echo '
              <tr>
                <td><a href="#">' .$event_name_arr[$i]. '</a></td>
                <td>' .$event_time_arr[$i]. 'น.</td>
                <td>' .$event_status_arr[$i]. '</td>
              </tr>
              ';
            }
          ?>
        </table>
      </div>
      
  </body>
</html>
