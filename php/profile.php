
<?php session_start(); ?>
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
    <title>User Profile</title>

    <style>
      .profileHead{
        text-align: center;
      }
      .profileBody{
        margin-left: 25%;
        margin-right: 25%;
      }
    </style>
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
      $data = data_query($email);
      if ($data['position'] == "USER"){
        echo '
        <div class="profileHead">
          <h1>User Profile</h1>
        </div>
        <div class="profileBody">
          <div class="row form-group">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <img src="'.$data['profile_pic_path'].'" alt="profile" width="100%" height="100%" class="img-rounded">
            </div>
            <div class="col-sm-4"></div>
          </div>
          <div class="form-group row">
            <label for="email" class="control-label col-sm-2">Email :</label>
            <div class="col-sm-10">
              <input type="text" name="email" class="form-control" id="email" value="'.$data['email'].'" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="f_name" class="control-label col-sm-3">First Name :</label>
            <div class="col-sm-9">
              <input type="text" name="f_name" class="form-control" id="f_name" value="'.$data['first_name'].'" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="l_name" class="control-label col-sm-3">Last Name :</label>
            <div class="col-sm-9">
              <input type="text" name="l_name" class="form-control" id="l_name" value="'.$data['last_name'].'" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="phone" class="control-label col-sm-2">Phone :</label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" value="'.$data['phone'].'" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="control-label col-sm-2">Address :</label>
            <div class="col-sm-10">
              <textarea rows="4" cols="50" name="address" form="usrform" class="form-control" id="address" readonly>'.$data['address'].'</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="b_day" class="control-label col-sm-2">Birth Day :</label>
            <div class="col-sm-10">
              <input type="text" name="b_day" class="form-control" id="b_day" value="'.$data['birth_date'].'" readonly>
            </div>
          </div>
        </div>';
        echoButton();
      }else {
        echo '<div class="profileHead">
          <h1>Organizer Profile</h1>
        </div>
        <div class="profileBody">
          <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <img src="'.$data['profile_pic_path'].'" alt="profile" width="100%" height="100%" class="img-rounded">
            </div>
            <div class="col-sm-4"></div>
          </div>
          <div class="form-group row">
            <label for="email" class="control-label col-sm-2">Email :</label>
            <div class="col-sm-10">
              <input type="text" name="email" class="form-control" id="email" value="'.$data['email'].'" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="com_name" class="control-label col-sm-3">Company Name :</label>
            <div class="col-sm-9">
              <input type="text" name="com_name" class="form-control" id="com_name" value="'.$data['company_name'].'" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="phone" class="control-label col-sm-2">Phone :</label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" value="'.$data['phone'].'" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="control-label col-sm-2">Address :</label>
            <div class="col-sm-10">
              <textarea rows="4" cols="50" name="address" form="usrform" class="form-control" id="address" readonly>'.$data['address'].'</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="web" class="control-label col-sm-2">Website :</label>
            <div class="col-sm-10">
              <input type="text" name="web" class="form-control" id="web" value="'.$data['website'].'" readonly>
            </div>
          </div>
        </div>';
        echoButton();
      }

    // }

    function data_query($email)
    {
      $database = new Database();
      $connection = $database->connect();
      $stmt = $connection->prepare("SELECT position FROM user WHERE email = '$email'");
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_BOTH);
      $positon = $row['position'];
      if ($positon == 'USER'){
        $stmt = $connection->prepare("SELECT * FROM attendant WHERE email = '$email'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $data = array('email' => $row['email'],
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'phone' => $row['phone'],
        'birth_date' => $row['birth_date'],
        'address' => $row['address'],
        'profile_pic_path' => $row['profile_pic_path'],
        'position' => $positon);
        return $data;
      }elseif ($positon == 'ORGANIZER') {
        $stmt = $connection->prepare("SELECT * FROM organizer WHERE email = '$email'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        $data = array('email' => $row['email'],
        'company_name' => $row['company_name'],
        'address' => $row['address'],
        'phone' => $row['phone'],
        'profile_pic_path' => $row['profile_pic_path'],
        'website' => $row['website'],
        'position' => $positon);
        return $data;
      }
    }








    function echoButton()
    {
      echo '<form class=".form-horizontal" action="index.php" method="post" id="usrform">
          <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <input type="submit" value="Back Home" class="form-control btn btn-default">
            </div>
            <div class="col-sm-4"></div>
          </div>
        </form>
      </div>';
    }
     ?>

     <!-- <div class="profileHead">
       <h1>Organizer Profile</h1>
     </div>
     <div class="profileBody">
       <div class="form-group row">
         <div class="col-sm-4"></div>
         <div class="col-sm-4">
           <img src="'.$data['profile_pic_path'].'" alt="profile" width="100%" height="100%" class="img-rounded">
         </div>
         <div class="col-sm-4"></div>
       </div>
       <div class="form-group row">
         <label for="email" class="control-label col-sm-2">Email :</label>
         <div class="col-sm-10">
           <input type="text" name="email" class="form-control" id="email" value="'.$data['email'].'" readonly>
         </div>
       </div>
       <div class="form-group row">
         <label for="com_name" class="control-label col-sm-3">Company Name :</label>
         <div class="col-sm-9">
           <input type="text" name="com_name" class="form-control" id="com_name" value="'.$data['company_name'].'" readonly>
         </div>
       </div>
       <div class="form-group row">
         <label for="phone" class="control-label col-sm-2">Phone :</label>
         <div class="col-sm-10">
           <input type="text" name="phone" class="form-control" id="phone" value="'.$data['phone'].'" readonly>
         </div>
       </div>
       <div class="form-group row">
         <label for="address" class="control-label col-sm-2">Address :</label>
         <div class="col-sm-10">
           <textarea rows="4" cols="50" name="address" form="usrform" class="form-control" id="address" readonly>'.$data['address'].'</textarea>
         </div>
       </div>
       <div class="form-group row">
         <label for="web" class="control-label col-sm-2">Website :</label>
         <div class="col-sm-10">
           <input type="text" name="web" class="form-control" id="web" value="'.$data['website'].'" readonly>
         </div>
       </div>
     </div> -->

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
</html>
