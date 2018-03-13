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
      $email = $_SESSION["email"];
      if(isset($_POST['submit'])){
        if ($_POST['type'] == "user"){
          $f_name = $_POST['f_name'];
          $l_name = $_POST['l_name'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $b_day_raw = $_POST['b_day'];
          $b_day = substr($b_day_raw,0,4)."-".substr($b_day_raw,5,2)."-".substr($b_day_raw,8,2);
          $old_pic = $_POST['old_pic'];
          if ($_FILES['profile_pic']['name']==''){
            $attendant_data = array($f_name, $l_name, $phone, $b_day, $address, $old_pic, $email);
          }else {
            $type = strtolower(pathinfo($_FILES['profile_pic']['name'],PATHINFO_EXTENSION));
            $image_path = "../img_profile/";
            $upload_path = $image_path.uniqid().".".$type;
            if($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
              $cause = 'ไม่ใช่ไฟล์รูปภาพ';
              wrong_input_user($cause);
              exit();
            }else{
              $suc = move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_path);
            }
            $attendant_data = array($f_name, $l_name, $phone, $b_day, $address, $upload_path, $email);
          }
          update_to_db_attendant($attendant_data);
          complete();


        }
        else if ($_POST['type'] == "organizer") {
          $password = $_POST['password'];
          $confirm_password = $_POST['confirm_password'];
          $com_name = $_POST['com_name'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $web = $_POST['web'];
          $old_pic = $_POST['old_pic'];
          if ($_FILES['profile_pic']['name']==''){
            $organizer_data = array($com_name, $address, $phone, $old_pic, $web, $email);
          }else {
            $type = strtolower(pathinfo($_FILES['profile_pic']['name'],PATHINFO_EXTENSION));
            $image_path = "../img_profile/";
            $upload_path = $image_path.uniqid().".".$type;
            if($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
              $cause = 'ไม่ใช่ไฟล์รูปภาพ';
              wrong_input_organizer($cause);
              exit();
            }else{
              $suc = move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_path);
            }
            $organizer_data = array($com_name, $address, $phone, $upload_path, $web, $email);
          }
          update_to_db_organizer($organizer_data);
          complete();
        }
      }

      function update_to_db_attendant($param)
      {
        $database = new Database();
        $connection = $database->connect();
        $statement = $connection->prepare('UPDATE attendant SET first_name = ?,last_name = ?,phone = ?,birth_date = ?, address = ?,profile_pic_path = ?  WHERE email = ?');
        $statement->execute($param);
      }

      function update_to_db_organizer($param)
      {
        $database = new Database();
        $connection = $database->connect();
        $statement = $connection->prepare('UPDATE organizer SET company_name = ?, address = ?, phone = ?, profile_pic_path = ?, website = ? WHERE email = ?');
        $statement->execute($param);
      }



      function wrong_input_user($cause)
      {
        echo '
        <div class="profileHead">
          <h1>User Profile</h1>
        </div>
        <div class="profileBody">
          <form class=".form-horizontal" action="edit_profile_handle.php" method="post" id="usrform" enctype="multipart/form-data">
            <div class="form-group row">
              <span class="label label-danger col-sm-5">'.$cause.'</span>
              <div class="col-sm-7"></div>
            </div>
            <div class="row form-group">
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
                <img src="'.$old_pic.'" alt="profile" width="100%" height="100%" class="img-rounded">
              </div>
              <div class="col-sm-4"></div>
            </div>
            <div class="form-group row">
              <label for="f_name" class="control-label col-sm-3">First Name :</label>
              <div class="col-sm-9">
                <input type="text" name="f_name" class="form-control" id="f_name" value="'.$f_name.'" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="l_name" class="control-label col-sm-3">Last Name :</label>
              <div class="col-sm-9">
                <input type="text" name="l_name" class="form-control" id="l_name" value="'.$l_name.'" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="control-label col-sm-2">Phone :</label>
              <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" id="phone" value="'.$phone.'" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="address" class="control-label col-sm-2">Address :</label>
              <div class="col-sm-10">
                <textarea rows="4" cols="50" name="address" form="usrform" class="form-control" id="address" required>'.$address.'</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="b_day" class="control-label col-sm-2">Birth Day :</label>
              <div class="col-sm-10">
                <input type="date" name="b_day" class="form-control" id="b_day" value="'.$b_day.'" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="profile_pic" class="control-label col-sm-3">Profile Image :</label>
              <div class="col-sm-9">
                <input type="file" name="profile_pic" class="form-control" id="profile_pic">
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

      function wrong_input_organizer($cause)
      {
        echo '<div class="profileHead">
          <h1>Organizer Profile</h1>
        </div>
        <div class="profileBody">
        <form class=".form-horizontal" action="edit_profile_handle.php" method="post" id="usrform" enctype="multipart/form-data">
          <div class="form-group row">
            <span class="label label-danger col-sm-5">'.$cause.'</span>
            <div class="col-sm-7"></div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <img src="'.$old_pic.'" alt="profile" width="100%" height="100%" class="img-rounded">
            </div>
            <div class="col-sm-4"></div>
          </div>
          <div class="form-group row">
            <label for="com_name" class="control-label col-sm-3">Company Name :</label>
            <div class="col-sm-9">
              <input type="text" name="com_name" class="form-control" id="com_name" value="'.$com_name.'" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="phone" class="control-label col-sm-2">Phone :</label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" value="'.$phone.'" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="control-label col-sm-2">Address :</label>
            <div class="col-sm-10">
              <textarea rows="4" cols="50" name="address" form="usrform" class="form-control" id="address" required>'.$address.'</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="web" class="control-label col-sm-2">Website :</label>
            <div class="col-sm-10">
              <input type="text" name="web" class="form-control" id="web" value="'.$web.'" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="profile_pic" class="control-label col-sm-3">Profile Image :</label>
            <div class="col-sm-9">
              <input type="file" name="profile_pic" class="form-control" id="profile_pic">
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

      function complete()
      {
        echo '<center><h2 class="fin">การแก้ไขข้อมูลเสร็จสมบูรณ์</h2></center>';
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
