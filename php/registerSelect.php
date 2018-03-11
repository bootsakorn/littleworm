<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/index_style.css">
    <link rel="stylesheet" type="text/css" href="../css/regis_select_style.css">
    <title>Register</title>

  </head>
  <body>
    <?php
      include "center.php";
      $page = new Page();
      $page->header();
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
            <li id="adt" class="dropdown-menu-item"><a href="#">บันทึกการเข้าร่วมกิจกรรม</a></li>
            <li id="org1" class="dropdown-menu-item"><a href="#">บันทึกการจัดกิจกรรม</a></li>
            <li id="org2" class="dropdown-menu-item"><a href="#">สร้างกิจกรรม</a></li>
            <li id="adm" class="dropdown-menu-item"><a href="#">จัดการระบบ</a></li>
            <li class="dropdown-menu-item"><a href="#">เปลี่ยนรหัสผ่าน</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-menu-item"><a href="sign_out.php" id="sign_out">ออกจากระบบ</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="regisBody">
      <h1>Register</h1>
      <p>โปรดเลือกประเภทที่ต้องการ</p>
      <table class="btn_table">
        <tr>
          <td>
            <form action="user_regis.php">
                <input type="submit" class="btn" name="btn_user" value="USER">
            </form>
          </td>
          <td>
            <form action="organize_regis.php">
                <input type="submit" class="btn" name="btn_organizer" value="ORGANIZER">
            </form>
          </td>
        </tr>
      </table>
    </div>
    <?php
      $page->footer();
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
               echo '$("#username").html("'.$_SESSION["email"].'");
               $("#login").hide();
               $("#profile").show();
               $("#adt").show();
               $("#org1").hide();
               $("#org2").hide();
               $("#adm").hide();';
            } elseif ($_SESSION['position'] == 'ORGANIZER') {
               echo '$("#username").html("'.$_SESSION["email"].'");
               $("#login").hide();
               $("#profile").show();
               $("#adt").hide();
               $("#org1").show();
               $("#org2").hide();
               $("#adm").hide();';
            }
        }
    ?>

  </body>
</html>
