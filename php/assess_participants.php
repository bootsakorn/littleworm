<!DOCTYPE html>
<html>
  <head>
    <title>assess participants</title>
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
      include "get_participants_assess.php";
      $page = new Page();
      $page->header();

      $table_id = "'participants_table'";
      $event_name = "หนอนน้อยโกโก";
    ?>

      <!-- do not use navbar -->
        </div>
      </nav>

      <div class="content">
        <div class="topics" style="text-align:center">
          <h1>ผู้เข้าร่วม</h1>
          <h2>กิจกรรม <?php echo $event_name; ?> </h2>
        </div>

        <form action="set_assessment_status.php" method="POST">
          <table id='.$table_id.' style="width:50%">
            <tr>
              <th width="10%" onclick="sortTable(0, '.$table_id.')">ลำดับ</th>
              <th width="65%" onclick="sortTable(0, '.$table_id.')">รายชื่อผู้เข้าร่วมกิจกรรม</th>
              <th width="25%">ประเมิน</th>
            </tr>

              <!-- get data from database to html table -->
              <?php
                for ($i=0; $i<count($first_name_arr); $i++) {

                  echo '
                  <input class="hd" type="text" name="fname' .$i. '" value="'.$first_name_arr[$i].'">
                  <input class="hd" type="text" name="lname' .$i. '" value="'.$last_name_arr[$i].'">
                  <input class="hd" type="text" name="num" value='.count($first_name_arr).'>
                  <tr>
                    <td>' .($i+1). '</td>
                    <td>' .$first_name_arr[$i]. ' ' .$last_name_arr[$i]. '</td>
                    <td>
                      <label method="POST">
                        <input type="radio" name="result' .$i. '" value="pass">ผ่าน&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="result' .$i. '" value="notPass">ไม่ผ่าน
                      </label>
                    </td>
                  </tr>
                  ';
                }
              ?>
          </table>

          <div style="text-align:center; margin-bottom:20px" class="button">
            <input type="submit" class="btn" id="submit" style="margin-bottom:20px " value="Submit" name="submit">
          </div>
        </form>
      </div>
      <script> $(".hd").hide();</script>


  </body>
</html>
