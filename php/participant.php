<!DOCTYPE html>
<html>
  <head>
    <title>Participant Management</title>
  	<meta charset="utf-8">
  	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  	<!-- jQuery library -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  	<!-- Latest compiled JavaScript -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Athiti&amp;subset=thai" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="../css/participant_style.css">
  </head>
  <body>
    <?php
    session_start();
    include "center.php";
    $page = new Page();
    $topic = array("Technology", "Education", "Financial", "Health", "Social", "Hobbies");
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
if (isset($_SESSION['id'])){
  $id_event = $_SESSION['id'];
}
    $servername = "localhost";
    $dbname = "little_worm";
    $userName = "root";
    $password = "";

    $connection = new PDO (
      'mysql:host='.$servername.';dbname='.$dbname.';charset=utf8mb4',
      $userName,
      $password);

    $scheduleSelectStatement = $connection->query('SELECT * FROM attend_event_schedule WHERE event_id='.$id_event);
    $preconSelectStatement = $connection->query('SELECT * FROM precondition');
    $receiptSelectStatement = $connection->query('SELECT * FROM receipt');
    $qrCodeSelectStatement = $connection->query('SELECT * FROM qr_code');

    $picPaths = array();
    $receiptPaths = array();
    $qrCodes = array();

    while ($row = $preconSelectStatement->fetch(PDO::FETCH_ASSOC)) {
      $picPaths[$row["attend_event_id"]] = $row["picture_path"];
    }

    while ($row = $receiptSelectStatement->fetch(PDO::FETCH_ASSOC)) {
      $receiptPaths[$row["attend_event_id"]] = $row["picture_path"];
    }

    while ($row = $qrCodeSelectStatement->fetch(PDO::FETCH_ASSOC)) {
      $qrCodes[$row["email"]."-".$row["event_id"]] = $row["picture_path"];
    }

    $JSONPicPaths = json_encode($picPaths);
    $JSONReceiptPaths = json_encode($receiptPaths);

    echo '
    <div class="container" id="participant_div">
      <table class="table table-hover" id="participant_table">
        <h1>จัดการผู้เข้าร่วม</h1>
        <thead>
          <tr>
            <th>ลำดับ</th>
            <th>Event ID</th>
            <th>E-Mail ผู้เข้าร่วม</th>
            <th>วันที่</th>
            <th>สถานะการเข้าร่วม</th>
            <th>Pre Condition</th>
            <th>สถานะการเงิน</th>
          </tr>
        </thead>
        <tbody>';


    $ul_path = 'qrcodes/';
    while ($row = $scheduleSelectStatement->fetch(PDO::FETCH_ASSOC)) {
      if ($row['precondition_status'] == 'ผ่าน' && $row['receipt_status'] == 'ชำระแล้ว' && !array_key_exists($row['user_email'].'-'.$row['event_id'], $qrCodes)) {
        include 'phpqrcode/qrlib.php';
        $data = $row['user_email'].'-'.$row['event_id'];
        $path = $ul_path.$data.'.png';
        QRcode::png($data, $path);
        $qrCodeInsertStatement = $connection->prepare('INSERT INTO qr_code VALUES (?, ?, ?)');
        $qrCodeInsertStatement->execute([$row['user_email'], $row['event_id'], $path]);
        sendMail($row['user_email'],$path,$row['event_id']);

        $qrCodes[$data] = $path;
      }
      echo '<tr onclick="setSelectedRow(this)"><td>' . $row['id'] . '</td>' . '<td>' . $row['event_id'] . '</td>'
      . '<td>' . $row['user_email'] . '</td>' . '<td>' . explode(" ", $row['join_time'])[0] . '</td>'. '<td>' . $row['attend_status'] . '</td>'
      . '<td><button type="button" class="btn btn-link" onclick="preconOpen(' . $row['event_id'] . ')">'. $row['precondition_status']
      . '</button></td>' . '<td><button type="button" class="btn btn-link" onclick="paymentOpen(' . $row['event_id'] . ')">'. $row['receipt_status'] . '</button></td></tr>';
    }

    echo '</tbody></table></div>';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function sendMail($email,$path,$eventid)
    {
      require 'PHPMailer/src/Exception.php';
      require 'PHPMailer/src/PHPMailer.php';
      require 'PHPMailer/src/SMTP.php';


      $mail = new PHPMailer(true);
      try {
          //Server settings
          $mail->SMTPDebug = 0;
          $mail->isSMTP();
          $mail->SMTPOptions = array(
              'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
            )
          );
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'littlewormevent@gmail.com';
          $mail->Password = '1234worm';
          $mail->SMTPSecure = 'ssl';
          $mail->Port = 465;
          $mail->IsHTML(true);
          //Recipients
          $mail->setFrom('littlewormevent@gmail.com', 'Little Worm');
          $mail->addAddress($email);

          $mail->addAttachment($path);

          $mail->isHTML(true);
          $mail->Subject = 'Your QR Code of ID Event'.$eventid;
          $mail->Body    = 'QR Code ของคุณคือ';
          $mail->send();
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }

    }

    ?>

    <div class="container" id="button-div">
      <center><a href="checkin.php" class="btn btn-info btn-lg" role="button">Check-in</a></center>
    </div>

    <div class="modal" id="preconModal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Pre Condition</h2>
        </div>
        <div class="modal-body">
          <p>ประวัติ</p>
          <div class="picture-container">
            <img alt="ไม่มีประวัติของ Pre Condition" id="preconPic">
          </div>
          <div class="btn-container">
            <button type="button" class="btn btn-info btn-lg" name="acceptBtn" onclick="acceptBtn()">ผ่าน</button>
            <button type="button" class="btn btn-info btn-lg" name="declineBtn" onclick="declineBtn()">ไม่ผ่าน</button>
          </div>
        </div>
        <div class="modal-footer">
          <a id="about_me" href="">About Me</a>
      	  <p>&copy; Little Worm</p>
        </div>
      </div>
    </div>

    <div class="modal" id="paymentModal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>ประวัติการชำระเงิน</h2>
        </div>
        <div class="modal-body">
          <p>ประวัติ</p>
          <div class="picture-container">
            <img alt="ไม่มีประวัติการชำระเงิน" id="receiptPic">
          </div>
          <div class="btn-container">
            <button type="button" class="btn btn-info btn-lg" name="paidBtn" onclick="paidBtn()">ชำระแล้ว</button>
            <button type="button" class="btn btn-info btn-lg" name="unpainBtn" onclick="unpaidBtn()">ยังไม่ชำระ</button>
          </div>
        </div>
        <div class="modal-footer">
          <a id="about_me" href="">About Me</a>
      	  <p>&copy; Little Worm</p>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      var selectedRow = 0;
      var preconModal = document.getElementById("preconModal");
      var preconSpan = document.getElementsByClassName("close")[0];
      var picArray = <?php echo $JSONPicPaths; ?>;
      var picPaths = {};
      for (i = 0; i < picArray.length; i += 2) {
        picPaths[picArray[i]] = picArray[i+1];
      }

      var paymentModal = document.getElementById("paymentModal");
      var paymentSpan = document.getElementsByClassName("close")[1];
      var receiptArray = <?php echo $JSONReceiptPaths; ?>;
      var receiptPaths = {};
      for (j = 0; j < receiptArray.length; j += 2) {
        receiptPaths[receiptArray[i]] = receiptArray[i+1];
      }

      function setSelectedRow(row) {
        selectedRow = row.rowIndex;
      }

      function preconOpen(id) {
        preconModal.style.display = "block";
        document.getElementById("preconPic").setAttribute("src", picPaths[id]);
      }

      function acceptBtn() {
        var selectedId = document.getElementById("participant_table").rows[selectedRow].cells[0].innerHTML;
        var status = "ผ่าน";
        var dataString = "selectedId="+selectedId+"&status="+status;
        $.ajax({
          type: "POST",
          url: "precon_update.php",
          data: dataString,
          cache: false,
          success: function(response) {
            location.reload();
          }
        });
        preconModal.style.display = "none";
      }

      function declineBtn() {
        var selectedId = document.getElementById("participant_table").rows[selectedRow].cells[0].innerHTML;
        var status = "ไม่ผ่าน";
        var dataString = "selectedId="+selectedId+"&status="+status;
        $.ajax({
          type: "POST",
          url: "precon_update.php",
          data: dataString,
          cache: false,
          success: function(response) {
            location.reload();
          }
        });
        preconModal.style.display = "none";
      }

      preconSpan.onclick = function() {
        preconModal.style.display = "none";
      }

      function paymentOpen(id) {
        paymentModal.style.display = "block";
        document.getElementById("receiptPic").setAttribute("src", receiptPaths[id]);
      }

      function paidBtn() {
        var selectedId = document.getElementById("participant_table").rows[selectedRow].cells[0].innerHTML;
        var status = "ชำระแล้ว";
        var dataString = "selectedId="+selectedId+"&status="+status;
        $.ajax({
          type: "POST",
          url: "payment_update.php",
          data: dataString,
          cache: false,
          success: function(response) {
            location.reload();
          }
        });
        preconModal.style.display = "none";
      }

      function unpaidBtn() {
        var selectedId = document.getElementById("participant_table").rows[selectedRow].cells[0].innerHTML;
        var status = "ยังไม่ชำระ";
        var dataString = "selectedId="+selectedId+"&status="+status;
        $.ajax({
          type: "POST",
          url: "payment_update.php",
          data: dataString,
          cache: false,
          success: function(response) {
            location.reload();
          }
        });
        preconModal.style.display = "none";
      }

      paymentSpan.onclick = function() {
        paymentModal.style.display = "none";
      }

      window.onclick = function(event) {
        if (event.target == preconModal) {
          preconModal.style.display = "none";
        } else if (event.target == paymentModal) {
          paymentModal.style.display = "none";
        }
      }
    </script>

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
      }?>
  </body>
</html>
