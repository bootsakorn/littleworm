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
    <link rel="stylesheet" type="text/css" href="../css/regis_style.css">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $( function() {
        // $( "#b_day" ).datepicker({ dateFormat: "yy-mm-dd" });
        $( "#b_day" ).datepicker({ dateFormat: "dd/mm/yy" });
      } );
    </script>
    <title>User Register</title>
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
            <li id="org2" class="dropdown-menu-item"><a href="createEvent.php">สร้างกิจกรรม</a></li>
            <li id="adm" class="dropdown-menu-item"><a href="userAdmin.php">จัดการระบบ</a></li>
            <li class="dropdown-menu-item"><a href="#">เปลี่ยนรหัสผ่าน</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-menu-item"><a href="sign_out.php" id="sign_out">ออกจากระบบ</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="regisHead">
      <h1>Register</h1>
      <p>user</p>
    </div>
    <div class="regisBody">
      <form class=".form-horizontal" action="register_handle.php" method="post" id="usrform" enctype="multipart/form-data">
        <input type="hidden" name="type" value="user">
        <div class="form-group row">
          <label for="email" class="control-label col-sm-2">Email :</label>
          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="email" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="control-label col-sm-2">Password :</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="password" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="confirm_password" class="control-label col-sm-4">Confirm Password :</label>
          <div class="col-sm-8">
            <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="f_name" class="control-label col-sm-3">First Name :</label>
          <div class="col-sm-9">
            <input type="text" name="f_name" class="form-control" id="f_name" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="l_name" class="control-label col-sm-3">Last Name :</label>
          <div class="col-sm-9">
            <input type="text" name="l_name" class="form-control" id="l_name" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="control-label col-sm-2">Phone :</label>
          <div class="col-sm-10">
            <input type="text" name="phone" class="form-control" id="phone" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="address" class="control-label col-sm-2">Address :</label>
          <div class="col-sm-10">
            <textarea rows="4" cols="50" name="address" form="usrform" class="form-control" id="address" required></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="b_day" class="control-label col-sm-2">Birth Day :</label>
          <div class="col-sm-10">
            <input type="date" name="b_day" class="form-control" id="b_day" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="profile_pic" class="control-label col-sm-3">Profile Image :</label>
          <div class="col-sm-9">
            <input type="file" name="profile_pic" class="form-control" id="profile_pic" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <input type="submit" value="Submit" class="form-control btn btn-default" name="submit">
          </div>
          <div class="col-sm-4"></div>
        </div>
    </div>
    <?php
      $page->footer();
      if (empty($_SESSION["email"])){
        echo '<script>
        $("#login").hide();
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
