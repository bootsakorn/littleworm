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
    <?php
      if ($_POST['type'] == "user") {
        echo "<title>User Register</title>";
        echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
              $( function() {
                // $( "#b_day" ).datepicker({ dateFormat: "yy-mm-dd" });
                $( "#b_day" ).datepicker({ dateFormat: "dd/mm/yy" });
              } );
            </script>';
      }else {
        echo "<title>Organizer Register</title>";
      }
    ?>

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
    <?php
      include "connectDB.php";
      if(isset($_POST['submit'])){
        if ($_POST['type'] == "user"){
          // echo "user";
          $email = $_POST['email'];
          $password = $_POST['password'];
          $confirm_password = $_POST['confirm_password'];
          $f_name = $_POST['f_name'];
          $l_name = $_POST['l_name'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $b_day_raw = $_POST['b_day'];
          $b_day = substr($b_day_raw,0,4)."-".substr($b_day_raw,5,2)."-".substr($b_day_raw,8,2);

           if (check_email($email) == $email){
             $cause = 'Email : '.$email.'ได้ถูกใช้งานไปแล้ว';
             wrong_input_user($cause);
           }elseif ($password != $confirm_password) {
             $cause = 'Password ไม่ตรงกับ Confirm Password';
             wrong_input_user($cause);
           }else {
             $type = strtolower(pathinfo($_FILES['profile_pic']['name'],PATHINFO_EXTENSION));
             $image_path = "img_profile/";
             $upload_path = $image_path.uniqid().".".$type;
             if($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
               $cause = 'ไม่ใช่ไฟล์รูปภาพ';
               wrong_input_user($cause);
               exit();
             }else{
               $suc = move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_path);
             }
             $secret = password_hash($password, PASSWORD_DEFAULT);
             $user_data = array($email, $secret, "USER", 0);
             insert_to_db_user($user_data);
             $attendant_data = array($email, $f_name, $l_name, $phone, $b_day, $address, $upload_path);
             insert_to_db_attendant($attendant_data);
             register_complete();
           }

        }
        else if ($_POST['type'] == "organizer") {
          // echo "organizer";
          $email = $_POST['email'];
          $password = $_POST['password'];
          $confirm_password = $_POST['confirm_password'];
          $com_name = $_POST['com_name'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $web = $_POST['web'];

           if (check_email($email) == $email){
             $cause = 'Email : '.$email.'ได้ถูกใช้งานไปแล้ว';
             wrong_input_organizer($cause);
           }elseif ($password != $confirm_password) {
             $cause = 'Password ไม่ตรงกับ Confirm Password';
             wrong_input_organizer($cause);
           }else {
             $type = strtolower(pathinfo($_FILES['profile_pic']['name'],PATHINFO_EXTENSION));
             $image_path = "img_profile/";
             $upload_path = $image_path.uniqid().".".$type;
             if($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
               $cause = 'ไม่ใช่ไฟล์รูปภาพ';
               wrong_input_organizer($cause);
               exit();
             }else{
               $suc = move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_path);
             }
             $secret = password_hash($password, PASSWORD_DEFAULT);
             $user_data = array($email, $secret, "ORGANIZER", 0);
             insert_to_db_user($user_data);
             $organizer_data = array($email, $com_name, $address, $phone, $upload_path, $web);
             insert_to_db_organizer($organizer_data);
             register_complete();
           }
        }
      }
      function check_email($email)
      {
        $database = new Database();
        $connection = $database->connect();
        $stmt = $connection->prepare("SELECT email FROM user WHERE email = '$email'");
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
          return $row[0];
        }
      }

      function insert_to_db_user($param)
      {
        $database = new Database();
        $connection = $database->connect();
        $statement = $connection->prepare('INSERT INTO user VALUES (?, ?, ?, ?)');
        $statement->execute($param);
      }

      function insert_to_db_attendant($param)
      {
        $database = new Database();
        $connection = $database->connect();
        $statement = $connection->prepare('INSERT INTO attendant VALUES (?, ?, ?, ?, ?, ?, ?)');
        $statement->execute($param);
      }

      function insert_to_db_organizer($param)
      {
        $database = new Database();
        $connection = $database->connect();
        $statement = $connection->prepare('INSERT INTO organizer VALUES (?, ?, ?, ?, ?, ?)');
        $statement->execute($param);
      }
      function wrong_input_user($cause)
      {
        echo '<div class="regisHead">
          <h1>Register</h1>
          <p>user</p>
        </div>
        <div class="regisBody">
          <form class=".form-horizontal" action="register_handle.php" method="post" id="usrform" enctype="multipart/form-data">
            <input type="hidden" name="type" value="user">

            <div class="form-group row">
              <span class="label label-danger col-sm-5">'.$cause.'</span>
              <div class="col-sm-7"></div>
            </div>

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
        </div>';
      }
      function wrong_input_organizer($cause)
      {
        echo '<div class="regisHead">
              <h1>Register</h1>
              <p>Organizer</p>
            </div>
            <div class="regisBody">
              <form class=".form-horizontal" action="register_handle.php" method="post" id="usrform" enctype="multipart/form-data">
                <input type="hidden" name="type" value="organizer">
                <div class="form-group row">
                  <span class="label label-danger col-sm-5">'.$cause.'</span>
                  <div class="col-sm-7"></div>
                </div>
                <div class="form-group row">
                  <label for="email" class="control-label col-sm-2">Email :</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email" required>
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
                  <label for="com_name" class="control-label col-sm-4">Company Name :</label>
                  <div class="col-sm-8">
                    <input type="text" name="com_name" class="form-control" id="com_name" required>
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
                  <label for="web" class="control-label col-sm-2">Website :</label>
                  <div class="col-sm-10">
                    <input type="text" name="web" class="form-control" id="web" required>
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
              </form>
            </div>';
      }
      function register_complete()
      {
        echo '<center><h2 class="fin">การสมัครเสร็จสมบูรณ์</h2></center>';
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
