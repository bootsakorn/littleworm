<!DOCTYPE html>
<?php session_start(); ?>
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
    <div class="collapse navbar-collapse ">
      <form name="form2" method="post" action="event_page.php">
      <ul class="nav navbar-nav " id="type_event">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="event_page.php?type=Technology">Technology</a></li>
        <li><a href="event_page.php?type=Education">Education</a></li>
        <li><a href="event_page.php?type=Financial">Financial</a></li>
        <li><a href="event_page.php?type=Health">Health</a></li>
        <li><a href="event_page.php?type=Social">Social</a></li>
        <li><a href="event_page.php?type=Hobbies">Hobbies</a></li>
      </ul>
      </form>
      <ul id="login" class="nav navbar-nav navbar-right">
        <li><a href="sign_in.php"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
        <li><a href="registerSelect.php"><span class="glyphicon glyphicon-plus-sign"></span> Register</a></li>
      </ul>
      <ul id="profile" class="nav navbar-nav navbar-right">
        <li><a id = "username"></a></li>
        <li class="dropdown">
          <a class="glyphicon glyphicon-menu-hamburger" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li class="dropdown-menu-item"><a href="#">ประวัติส่วนตัว</a></li>
            <li id="adt" class="dropdown-menu-item"><a href="user_save_event_page.php">บันทึกการเข้าร่วมกิจกรรม</a></li>
            <li id="org1" class="dropdown-menu-item"><a href="organ_save_event_page.php">บันทึกการจัดกิจกรรม</a></li>
            <li id="org2" class="dropdown-menu-item"><a href="createEvent.php">สร้างกิจกรรม</a></li>
            <li id="adm" class="dropdown-menu-item"><a href="userAdmin.php">จัดการระบบ</a></li>
            <li class="dropdown-menu-item"><a href="password_change.php">เปลี่ยนรหัสผ่าน</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-menu-item"><a href="sign_out.php" id="sign_out">ออกจากระบบ</a></li>
          </ul>
        </li>
      </ul>
    </div>
    </div>
    </nav>


      <div class="content">
        <h1 style="text-align:center">กิจกรรมทั้งหมด</h1>

        <table id='.$table_id.' style="width:65%">
          <tr>
            <th width="48%" onclick="sortTable(0, '.$table_id.')">ชื่อกิจกรรม</th>
            <th width="30%" onclick="sortTable(1, '.$table_id.')">วัน เวลา</th>
            <th width="22%" onclick="sortTable(2, '.$table_id.')">สถานะ</th>
          </tr>

        <?php
          // set current date and time to check event status
          date_default_timezone_set('Asia/Bangkok');
          $current_time = date('Y-m-d H:i:s');

          for ($i=0; $i<count($event_name_arr) ; $i++) {
            echo '
              <tr>
                <td><a href="before_detail.php?id='.$event_id_arr[$i].'">' .$event_name_arr[$i]. '</a></td>
                <td>' .$event_date_arr[$i]. ' ' .$event_time_arr[$i]. ' น.</td>
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
      <?php $page->footer();
      if (empty($_SESSION["email"])){
        echo '<script>
        $("#login").show();
        $("#profile").hide();
         </script>';
        }

      else {
          echo '<script>
            $("#username").html("'.$_SESSION["email"].'");
            $("#login").hide();
            $("#profile").show();
            </script>';
            if ($_SESSION['position'] == 'ADMIN'){
              echo '<script>
                $("#username").html("'.$_SESSION["email"].'");
                 $("#login").hide();
                 $("#profile").show();
                 $("#adt").hide();
                 $("#org1").hide();
                 $("#org2").hide();
                 $("#adm").show();
               </script>';
            } elseif ($_SESSION['position'] == 'USER') {

               echo '<script>
               $("#username").html("'.$_SESSION["email"].'");
               $("#login").hide();
               $("#profile").show();
               $("#adt").show();
               $("#org1").hide();
               $("#org2").hide();
               $("#adm").hide();</script>';
            } elseif ($_SESSION['position'] == 'ORGANIZER') {
               echo '<script>$("#username").html("'.$_SESSION["email"].'");
               $("#login").hide();
               $("#profile").show();
               $("#adt").hide();
               $("#org1").show();
               $("#org2").show();
               $("#adm").hide();</script>';
            }
        }
      ?>

  </body>
</html>
