<?php



    $strMessage = "";
  $strMessage .= "สวัสดีครับ คุณ<br>";
  require_once('../PHPMailer_v5.0.2/class.phpmailer.php');
  $mail = new PHPMailer();
  $mail-> CharSet = 'UTF-8';
  $mail->IsHTML(true);
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "ssl";
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;
  $mail->Username = "eventhubth@gmail.com";
  $mail->Password = "csku1234";
  $mail->From = "eventhubth@gmail.com";

  $mail->FromName = "EventHubs";

 $strMessage .= "<br>=================================<br>";
 $strMessage .= "EventHubs.com<br><br>";
 $strMessage .= 'Admin Anaphat';
  $mail->Body = $strMessage;
  $mail->AddAddress("bootsakorn001@gmal.com", "nut"); // to Address
  // $mail->AddAttachment("thaicreate/myfile.zip");
  // $mail->AddAttachment("thaicreate/myfile2.zip");
  //$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
  //$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
  $mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low
  $mail->Send();

 ?>
