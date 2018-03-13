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
    <title="Change Password">
  </head>
  <body>
    <?php
      include "center.php";
      session_start();
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
            <li class="dropdown-menu-item"><a href="profile.php">ประวัติส่วนตัว</a></li>
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
    <?php
      include "connectDB.php";
      if(isset($_POST['submit'])){
        $email = $_SESSION['email'];
        $password = $_POST['password'];
        $new_password = $_POST['new_password'];
        $new_confirm_password = $_POST['new_confirm_password'];
          if (check_pass($email,$password)){
            if ($new_password == $new_confirm_password){
              update_db($email,$new_password);
              complete();
            }else {
              $cause = 'Password ไม่ตรงกับ Confirm Password';
              wrong_input($cause);
            }
          }else {
            $cause = 'Password ไม่ถูกต้อง';
            wrong_input($cause);
          }
      }
      function check_pass($email,$password)
      {
        $database = new Database();
        $connection = $database->connect();
        $stmt = $connection->prepare("SELECT password FROM user WHERE email = '$email'");
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
          return password_verify($password, $row['password']);
        }
      }

      function update_db($email, $new_password)
      {
        $secret = password_hash($new_password, PASSWORD_DEFAULT);
        $param = array($secret,$email);
        $database = new Database();
        $connection = $database->connect();
        $statement = $connection->prepare('UPDATE user SET password = ? WHERE email = ?');
        $statement->execute($param);
      }


      function wrong_input($cause)
      {
        echo '<div class="regisHead">
          <h1>Change Password</h1>
        </div>
        <div class="regisBody">
          <form class=".form-horizontal" action="password_change_handle.php" method="post" id="usrform">
            <div class="form-group row">
              <span class="label label-danger col-sm-5">'.$cause.'</span>
              <div class="col-sm-7"></div>
            </div>
            <div class="form-group row">
              <label for="password" class="control-label col-sm-2">Password :</label>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="password" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="new_password" class="control-label col-sm-3">New Password :</label>
              <div class="col-sm-9">
                <input type="password" name="new_password" class="form-control" id="new_password" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="new_confirm_password" class="control-label col-sm-4">New Confirm Password :</label>
              <div class="col-sm-8">
                <input type="password" name="new_confirm_password" class="form-control" id="new_confirm_password" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
                <input type="submit" value="Submit" class="form-control btn btn-default" name="submit">
              </div>
              <div class="col-sm-4"></div>
            </div>
        </div>';
      }

      function complete()
      {
        echo '<center><h2 class="fin">การเปลี่ยนพาสเวิร์ดเสร็จสมบูรณ์</h2></center>';
      }

    ?>
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
      								 echo '<script>$("#username").html("'.$_SESSION["email"].'");
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
      								 $("#org2").hide();
      								 $("#adm").hide();</script>';
      							}
      					}
    ?>

  </body>
